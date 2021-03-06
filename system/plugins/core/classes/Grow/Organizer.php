<?php

namespace Grow;

use Contao\Controller;
use Contao\Database;
use Contao\System;
use Grow\Units\AbstractUnit;

class Organizer
{

    protected $table;


    protected $database;


    protected $errorsArr = [];


    protected $skipFields = [];


    public $listQuery;


    public function __construct($tableName)
    {
        $this->table = $tableName;
        $this->database = Database::getInstance();

        if (empty($tableName)) return;

        $connection = \Grow\Database::getConnection();
        $this->listQuery = $connection->selectQuery()->table($tableName);

        System::loadLanguageFile($tableName);
        Controller::loadDataContainer($tableName);
    }


    public function blank()
    {
        return $this->getUnitsData();
    }


    public function load($id)
    {
        $objRow = $this->database->prepare("SELECT * FROM " . $this->table . " WHERE id=?")
            ->limit(1)
            ->execute($id);

        // Redirect if there is no record with the given ID
        if ($objRow->numRows < 1) {
            //throw new \Exception('Could not load record "' . $this->strTable . '.id=' . $this->intId . '"', __METHOD__, TL_ERROR);
            throw new \Exception('No record found');
        }

        $fetchedRow = $objRow->fetchAssoc();

        $this->doLoadCallbacks($fetchedRow, $id);

        $unitsData = $this->getUnitsData($fetchedRow);

        return $unitsData;
    }


    public function create($fieldsValues)
    {
        $this->errorsArr = $this->validate($fieldsValues);

        if (!empty($this->errorsArr)) {
            return null;
        }

        $fieldsValues['tstamp'] = time();

        $tableFieldsData = $GLOBALS['TL_DCA'][$this->table]['fields'];

        foreach ($tableFieldsData as $fieldName=>$fieldData) {
            if (isset($fieldsValues[$fieldName]) || !isset($fieldData['default'])) continue;
            $fieldsValues[$fieldName] = $fieldData['default'];
        }

        $this->doSaveCallbacks($fieldsValues);

        $fieldsToSave = [];

        foreach ($fieldsValues as $field => $value) {
            if (in_array($field, $this->skipFields)) continue;
            $fieldsToSave[$field] = is_array($value) || is_object($value) ? serialize($value) : $value;
        }

        $connection = \Grow\Database::getConnection();

        $connection->insertQuery()
                ->table($this->table)
                ->data($fieldsToSave)
                ->execute();

        return $connection->insertId();
    }


    public function save($id, $fieldsValues)
    {
        $this->errorsArr = $this->validate($fieldsValues, $id);

        if (!empty($this->errorsArr)) {
            return null;
        }

        $this->doSaveCallbacks($fieldsValues, $id);

        $fieldsStr = '';
        $valuesArr = [];

        foreach ($fieldsValues as $field => $value) {
            if (in_array($field, $this->skipFields)) continue;
            if (strlen($fieldsStr) > 0) $fieldsStr .= ', ';
            $fieldsStr .= $field . '=?';
            $valuesArr[] = $value;
        }

        $valuesArr[] = $id;

        $statement = $this->database->prepare("UPDATE " . $this->table . " SET " . $fieldsStr . " WHERE id=?")
            ->execute($valuesArr);

        return $statement->affectedRows;
    }


    public function delete($id)
    {
        $this->errorsArr = [];

        if (empty($id)) {
            $this->errorsArr[] = 'ID was not set';
            return null;
        }

        $statement = $this->database->prepare("DELETE FROM " . $this->table . " WHERE id=?")
            ->execute($id);

        return $statement->affectedRows;
    }


    public function disable($id)
    {
        if (empty($id)) {
            return 'ID is not set';
        }

        return true;
    }


    public function move()
    {

    }


    public function getListHeaders()
    {
        $tableData = $GLOBALS['TL_DCA'][$this->table];
        $listFields = $tableData['list']['label']['fields_new'] ?: $tableData['list']['label']['fields'];
        $headers = [];

        foreach ($listFields as $fieldName) {
            if (!isset($tableData['fields'][$fieldName])) continue;
            $field = $tableData['fields'][$fieldName];
            $headers[] = [
                'name' => $fieldName,
                'label' => $field['label'][0] ?: ''
            ];
        }

        $headers[] = [
            'name' => 'operations',
            'label' => ''
        ];

        return $headers;
    }


    public function getSimpleList($limit = 30, $skip = 0, $where = [], $order = [], $hook = null)
    {
        $connection = \Grow\Database::getConnection();

        $query = $connection->selectQuery()->table($this->table);

        if (!empty($where)) {
            $query->startGroup();
            foreach ($where as $whereItem) {
                if (isset($whereItem[3])) {
                    $query->where($whereItem[0], $whereItem[1], $whereItem[2], $whereItem[3]);
                }
                elseif (isset($whereItem[2])) {
                    $query->where($whereItem[0], $whereItem[1], $whereItem[2]);
                }
                else {
                    $query->where($whereItem[0], $whereItem[1]);
                }
            }
            $query->endGroup();
        }

        if (!empty($order)) {
            foreach ($order as $orderItem) {
                $query->orderBy($orderItem[0], $orderItem[1]);
            }
        }

        $query
            ->limit($limit)
            ->offset($skip);

        if ($hook && is_callable($hook)) {
            call_user_func($hook, $query);
        }

        $result = $query->execute()->asArray();

//        if (!empty($where)) {
//            if (is_string($where)) {
//                $where = [$where];
//            }
//            $where = 'WHERE (' .implode(') AND (', $where) . ')';
//        }
//        else {
//            $where = '';
//        }
//
//        if ($order) {
//            $order = 'ORDER BY ' . $order;
//        }
//
//        $query = "SELECT * FROM " . $this->table . ' ' . $where . ' '. $order;
//
//        $objRowStmt = $this->database->prepare($query);
//        $objRowStmt->limit($limit, $skip);
//        $objRow = $objRowStmt->execute();
//
//        if ($objRow->numRows < 1) {
//            return [];
//        }
//
//        $result = $objRow->fetchAllAssoc();

        return $result;
    }


    public function getList($limit = 20, $skip = 0, $where = [], $order = [], $join = null, $joinOn = null)
    {
        if ($join) {
            $this->listQuery->join($join[0], $join[1], $join[2]);
        }

        if ($joinOn) {
            $this->listQuery->on($joinOn[0], $joinOn[1]);
        }

        if (!empty($where)) {
            if (is_string($where)) {
                $where = [$where];
            }
            foreach ($where as $whereItem) {
                if (!$whereItem) continue;
                $temp = explode(' ', $whereItem);
                $this->listQuery->where($temp[0], $temp[1], $temp[2]);
            }
        }

        $this->listQuery
            ->limit($limit)
            ->offset($skip);

        if ($order) {
            foreach ($order as $orderItem) {
                if (is_string($orderItem)) {
                    $orderItem = explode(' ', trim($orderItem));
                }
                $this->listQuery
                    ->orderBy($orderItem[0], strtolower($orderItem[1]));
            }
        }

        $result = $this->listQuery->execute()->asArray();

        if (count($result) < 1) {
            return [];
        }

        $list = [];
        $tableData = $GLOBALS['TL_DCA'][$this->table];
        $listFields = $tableData['list']['label']['fields_new'] ?: $tableData['list']['label']['fields'] ?: array_keys($tableData['fields']);
        $labelCallback = $tableData['list']['label']['callback'];

        $operationsData = $tableData['list']['operations'];
        $operations = [];

        if ($operationsData) {
            foreach ($operationsData as $operationName => $operationData) {
                if (!isset($operationData['icon_new'])) continue;
                $operations[] = [
                    'name' => $operationName,
                    'label' => $operationData['label'][0] ?: $operationName,
                    'icon' => $operationData['icon_new']
                ];
            }
        }

        foreach ($result as $i => $item) {
            $itemData = [
                'id' => $item->id,
                'fields' => []
            ];
            foreach ($listFields as $fieldName) {
                if (!isset($tableData['fields'][$fieldName])) continue;
                $itemData['fields'][] = $item->$fieldName ?: '';
            }
            $itemData['fields'][]['operations'] = $operations;
            if (!empty($labelCallback)) {
                if (is_array($labelCallback)) {
                    $itemData = System::importStatic($labelCallback[0])->{$labelCallback[1]}($itemData);
                } elseif (is_callable($labelCallback)) {
                    $itemData = $labelCallback($itemData);
                }
            }
            $list[] = $itemData;
        }

        return $list;
    }


    public function getListOld($limit = 20, $skip = 0, $where = [], $order= '')
    {
        if (!empty($where)) {
            if (is_string($where)) {
                $where = [$where];
            }
            $where = 'WHERE (' .implode(') AND (', $where) . ')';
        }
        else {
            $where = '';
        }

        if ($order) {
            $order = 'ORDER BY ' . $order;
        }

        $query = "SELECT * FROM " . $this->table . ' ' . $where . ' ' . $order;

        $objRowStmt = $this->database->prepare($query);

        $objRowStmt->limit($limit, $skip);

        $objRow = $objRowStmt->execute();

        if ($objRow->numRows < 1) {
            return [];
        }

        $result = $objRow->fetchAllAssoc();

        $list = [];
        $tableData = $GLOBALS['TL_DCA'][$this->table];
        $listFields = $tableData['list']['label']['fields_new'] ?: $tableData['list']['label']['fields'] ?: array_keys($tableData['fields']);
        $labelCallback = $tableData['list']['label']['callback'];

        $operationsData = $tableData['list']['operations'];
        $operations = [];

        if ($operationsData) {
            foreach ($operationsData as $operationName => $operationData) {
                if (!isset($operationData['icon_new'])) continue;
                $operations[] = [
                    'name' => $operationName,
                    'label' => $operationData['label'][0] ?: $operationName,
                    'icon' => $operationData['icon_new']
                ];
            }
        }

        foreach ($result as $i => $item) {
            $itemData = [
                'id' => $item['id'],
                'fields' => []
            ];
            foreach ($listFields as $fieldName) {
                if (!isset($tableData['fields'][$fieldName])) continue;
                $itemData['fields'][] = $item[$fieldName] ?: '';
            }
            $itemData['fields'][]['operations'] = $operations;
            if (!empty($labelCallback)) {
                if (is_array($labelCallback)) {
                    $itemData = System::importStatic($labelCallback[0])->{$labelCallback[1]}($itemData);
                } elseif (is_callable($labelCallback)) {
                    $itemData = $labelCallback($itemData);
                }
            }
            $list[] = $itemData;
        }

        return $list;
    }


    public function getUnitsData($row = null)
    {
        $tableData = $GLOBALS['TL_DCA'][$this->table];

        $palette = $tableData['palettes']['defaultNew'] ?: $tableData['palettes']['default'];
        $sidebarPalette = $tableData['palettes']['sidebar'];

        $fieldsNames = $this->getFieldsNamesFromPalette($palette);
        $sidebarFieldsNames = $this->getFieldsNamesFromPalette($sidebarPalette);

        $fields = $this->getUnitsDataForFields($row, $fieldsNames);
        $sidebar = $this->getUnitsDataForFields($row, $sidebarFieldsNames);

        return [
            'main' => $fields,
            'sidebar' => $sidebar
        ];
    }


    public function validate(&$fieldsValues, $id = null)
    {
        $errors = [];
        $fieldsData = $GLOBALS['TL_DCA'][$this->table]['fields'];

        $this->doValidateCallbacks($fieldsValues, $id);

        foreach ($fieldsValues as $field => $value) {

            $unitClass = $this->getUnitClass($fieldsData[$field]['inputTypeNew'] ?: $fieldsData[$field]['inputType']);

            if (empty($unitClass)) {
                continue;
            }

            /** @var AbstractUnit $unit */
            $unit = new $unitClass($this->table, $field);
            $processedValue = $unit->validate($value, $id);

            if ($unit->hasErrors()) {
                $errors[$field] = $unit->getErrors();
            } else {
                $fieldsValues[$field] = $processedValue;
            }

            if ($unit->skipSubmit()) {
                $this->skipFields[] = $field;
            }
        }

        return $errors;
    }


    /**
     * Return true if has errors
     *
     * @return boolean True if there are errors
     */
    public function hasErrors()
    {
        return !empty($this->errorsArr);
    }


    /**
     * Return the errors array
     *
     * @return array An array of error messages
     */
    public function getErrors()
    {
        return $this->errorsArr;
    }


    public function updateForm($id, $fieldsValues)
    {
        $updateFormCallback = $GLOBALS['TL_DCA'][$this->table]['config']['updateFormCallback'];

        if (!$updateFormCallback || !is_callable($updateFormCallback)) return [];

        try
        {
            return call_user_func_array($updateFormCallback, [$id, $fieldsValues]);
        }
        catch (\Exception $e)
        {

        }

        return [];
    }


    protected function getUnitClass($unitName)
    {
        $class = $GLOBALS['UNITS'][$unitName];
        return class_exists($class) ? $class : null;
    }


    protected  function getFieldsNamesFromPalette($palette, $fields = null)
    {
        $fields = $fields ?: $GLOBALS['TL_DCA'][$this->table]['fields'];
        $boxes = trimsplit(';', $palette);
        $fieldsNames = [];

        foreach ($boxes as $k => $v) {
            $boxes[$k] = trimsplit(',', $v);

            foreach ($boxes[$k] as $kk => $vv) {
                if (preg_match('/^\{.*\}$/', $vv)) {
                    continue;
                } elseif ($fields[$vv]['exclude1']) {
                    continue;
                } elseif (!preg_match('/^\[.*\]$/', $vv) && !is_array($fields[$vv])) {
                    continue;
                }

                $fieldsNames[] = $vv;
            }
        }

        return $fieldsNames;
    }


    protected function getUnitsDataForFields($row, $fieldsNames, $fieldsData = null)
    {
        $fieldsData = $fieldsData?: $GLOBALS['TL_DCA'][$this->table]['fields'];

        $fields = [];

        foreach ($fieldsNames as $fieldName) {

            if (strpos($fieldName, '[') === 0) {
                $fieldName = str_replace(['[', ']'], '', $fieldName);
                $fields[$fieldName] = [
                    'component' => 'section-title',
                    'label' => $GLOBALS['TL_LANG'][$this->table][$fieldName] ?: $fieldName
                ];
                continue;
            }

            $fieldData = $fieldsData[$fieldName];

            if (empty($fieldData['inputTypeNew'] ?: $fieldData['inputType'])) continue;

            $unitClass = $this->getUnitClass($fieldData['inputTypeNew'] ?: $fieldData['inputType']);

            if (empty($unitClass)) continue;

            /** @var AbstractUnit $unit */
            $unit = new $unitClass($this->table, $fieldName, $fieldData);

            $fields[$fieldName] = $unit->getUnitData(!empty($row) ? $row[$fieldName] : null);
        }

        return $fields;
    }


    protected function doLoadCallbacks(&$fieldsValues, $id = null)
    {
        $tableFieldsData = $GLOBALS['TL_DCA'][$this->table]['fields'];


        foreach($tableFieldsData as $fieldName=>$fieldData) {
            if (!is_array($fieldData['load_callback_new'])) continue;
            foreach ($fieldData['load_callback_new'] as $callback)
            {
                try
                {
                    if (is_callable($callback))
                    {
                        $fieldsValues[$fieldName] = call_user_func_array($callback, [$fieldsValues[$fieldName], $id, &$fieldsValues]);
                    }
                }
                catch (\Exception $e)
                {
//                    $objEditor->class = 'error';
//                    $objEditor->addError($e->getMessage());
                }
            }
        }
    }


    protected function doValidateCallbacks(&$fieldsValues, $id = null)
    {
        $tableFieldsData = $GLOBALS['TL_DCA'][$this->table]['fields'];

        foreach($fieldsValues as $fieldName=>$fieldValue) {
            if (!is_array($tableFieldsData[$fieldName]['validateCallback'])) continue;
            foreach ($tableFieldsData[$fieldName]['validateCallback'] as $callback)
            {
                try
                {
                    if (is_callable($callback))
                    {
                        $fieldValue = call_user_func_array($callback, [$fieldValue, $id, &$fieldsValues]);
                    }
                }
                catch (\Exception $e)
                {
//                    $objEditor->class = 'error';
//                    $objEditor->addError($e->getMessage());
                }
            }
        }
    }


    protected function doSaveCallbacks(&$fieldsValues, $id = null)
    {
        $tableFieldsData = $GLOBALS['TL_DCA'][$this->table]['fields'];

        foreach($fieldsValues as $fieldName=>$fieldValue) {
            if (!is_array($tableFieldsData[$fieldName]['save_callback_new'])) continue;
            foreach ($tableFieldsData[$fieldName]['save_callback_new'] as $callback)
            {
                try
                {
                    if (is_callable($callback))
                    {
                        $fieldValue = call_user_func_array($callback, [$fieldValue, $id, &$fieldsValues]);
                    }
                }
                catch (\Exception $e)
                {
//                    $objEditor->class = 'error';
//                    $objEditor->addError($e->getMessage());
                }
            }
        }
    }


}