<?php

namespace Grow\Controllers;

use Contao\BackendTemplate;
use Contao\Environment;
use Contao\Input;
use Contao\System;
use Grow\ActionData;
use Grow\ApplicationData;
use Grow\Organizer;

class Listing extends \Contao\Controllers\BackendMain
{

    public $ajaxActions = [
        'getList' => 'ajaxGetList',
        'getListItem' => 'ajaxGetListItem',
        'saveItem' => 'ajaxSaveItem',
        'deleteItem' => 'ajaxDeleteItem',
        'disableItem' => 'ajaxDisableItem'
    ];

    protected $config = [];

    protected $listTable = null;

    protected $jsFile = '/system/plugins/core/assets/js/controllers/listing.js';

    protected $listOrganizer;

    protected $mainSectionTemplate;


    public function __construct($config = null)
    {
        $this->config = $config;

        if ($this->config['list']) {
            $this->listTable = $this->config['list']['table'];
        }

        $this->listOrganizer = new Organizer($this->listTable);

        $this->mainSectionTemplate = new BackendTemplate('be_listing');

        parent::__construct();
    }


    protected function generateMainSection()
    {
        $this->Template->main = $this->mainSectionTemplate->parse();
    }


    public function ajaxGetList()
    {
        $groupId = Input::post('groupId');

        if (empty($groupId) || $groupId === 'all') {
            $where = '';
        }
        else {
            $where = ' WHERE groups LIKE \'%"' . $groupId . '"%\'';
        }

        ActionData::data('headers', $this->listOrganizer->getListHeaders());
        ActionData::data('items', $this->listOrganizer->getList(20, 0, $where));
        ActionData::data('creatable', true);
    }


    public function ajaxGetListItem()
    {
        $id = Input::post('id');

        if ($id === 'new') {
            $fields = $this->listOrganizer->blank();
        }
        else {
            $fields = $this->listOrganizer->load($id);
        }

        ActionData::data('fields', $fields);
    }


    public function ajaxSaveItem()
    {
        $id = Input::post('id');
        $fields = Input::post('fields');

        if ($id === 'new') {
            $newId = $this->listOrganizer->create($fields);
            ActionData::data('newId', $newId);
        }
        else {
            $this->listOrganizer->save($id, $fields);
        }

        if ($this->listOrganizer->hasErrors()) {
            ActionData::error($this->listOrganizer->getErrors());
        }
    }


    public function ajaxDeleteItem()
    {
        $id = Input::post('id');

        $this->listOrganizer->delete($id);

        if ($this->listOrganizer->hasErrors()) {
            ActionData::error($this->listOrganizer->getErrors());
        }
    }


    public function ajaxDisableItem()
    {
        $id = Input::post('id');

        $this->listOrganizer->disable($id);

        if ($this->listOrganizer->hasErrors()) {
            ActionData::error($this->listOrganizer->getErrors());
        }
    }

}