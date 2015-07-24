<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Contao;


/**
 * Reads and writes articles
 *
 * @property integer $id
 * @property integer $pid
 * @property integer $sorting
 * @property integer $tstamp
 * @property string  $title
 * @property string  $alias
 * @property integer $author
 * @property string  $inColumn
 * @property string  $keywords
 * @property boolean $showTeaser
 * @property string  $teaserCssID
 * @property string  $teaser
 * @property string  $printable
 * @property string  $customTpl
 * @property boolean $protected
 * @property string  $groups
 * @property boolean $guests
 * @property string  $cssID
 * @property string  $space
 * @property boolean $published
 * @property string  $start
 * @property string  $stop
 * @property string  $classes
 *
 * @method static $this findById($id, $opt=array())
 * @method static $this findByPk($id, $opt=array())
 * @method static $this findByIdOrAlias($val, $opt=array())
 * @method static $this findOneBy($col, $val, $opt=array())
 * @method static $this findOneByPid($val, $opt=array())
 * @method static $this findOneBySorting($val, $opt=array())
 * @method static $this findOneByTstamp($val, $opt=array())
 * @method static $this findOneByTitle($val, $opt=array())
 * @method static $this findOneByAlias($val, $opt=array())
 * @method static $this findOneByAuthor($val, $opt=array())
 * @method static $this findOneByInColumn($val, $opt=array())
 * @method static $this findOneByKeywords($val, $opt=array())
 * @method static $this findOneByShowTeaser($val, $opt=array())
 * @method static $this findOneByTeaserCssID($val, $opt=array())
 * @method static $this findOneByTeaser($val, $opt=array())
 * @method static $this findOneByPrintable($val, $opt=array())
 * @method static $this findOneByCustomTpl($val, $opt=array())
 * @method static $this findOneByProtected($val, $opt=array())
 * @method static $this findOneByGroups($val, $opt=array())
 * @method static $this findOneByGuests($val, $opt=array())
 * @method static $this findOneByCssID($val, $opt=array())
 * @method static $this findOneBySpace($val, $opt=array())
 * @method static $this findOneByPublished($val, $opt=array())
 * @method static $this findOneByStart($val, $opt=array())
 * @method static $this findOneByStop($val, $opt=array())
 *
 * @method static \Model\Collection|\ArticleModel findByPid($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findBySorting($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByTstamp($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByTitle($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByAlias($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByAuthor($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByInColumn($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByKeywords($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByShowTeaser($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByTeaserCssID($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByTeaser($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByPrintable($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByCustomTpl($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByProtected($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByGroups($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByGuests($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByCssID($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findBySpace($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByPublished($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByStart($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findByStop($val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findMultipleByIds($var)
 * @method static \Model\Collection|\ArticleModel findBy($col, $val, $opt=array())
 * @method static \Model\Collection|\ArticleModel findAll($opt=array())
 *
 * @method static integer countById($id, $opt=array())
 * @method static integer countByPid($val, $opt=array())
 * @method static integer countBySorting($val, $opt=array())
 * @method static integer countByTstamp($val, $opt=array())
 * @method static integer countByTitle($val, $opt=array())
 * @method static integer countByAlias($val, $opt=array())
 * @method static integer countByAuthor($val, $opt=array())
 * @method static integer countByInColumn($val, $opt=array())
 * @method static integer countByKeywords($val, $opt=array())
 * @method static integer countByShowTeaser($val, $opt=array())
 * @method static integer countByTeaserCssID($val, $opt=array())
 * @method static integer countByTeaser($val, $opt=array())
 * @method static integer countByPrintable($val, $opt=array())
 * @method static integer countByCustomTpl($val, $opt=array())
 * @method static integer countByProtected($val, $opt=array())
 * @method static integer countByGroups($val, $opt=array())
 * @method static integer countByGuests($val, $opt=array())
 * @method static integer countByCssID($val, $opt=array())
 * @method static integer countBySpace($val, $opt=array())
 * @method static integer countByPublished($val, $opt=array())
 * @method static integer countByStart($val, $opt=array())
 * @method static integer countByStop($val, $opt=array())
 *
 * @author Leo Feyer <https://github.com/leofeyer>
 */
class ArticleModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_article';


	/**
	 * Find an article by its ID or alias and its page
	 *
	 * @param mixed   $varId      The numeric ID or alias name
	 * @param integer $intPid     The page ID
	 * @param array   $arrOptions An optional options array
	 *
	 * @return static The model or null if there is no article
	 */
	public static function findByIdOrAliasAndPid($varId, $intPid, array $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns = array("($t.id=? OR $t.alias=?)");
		$arrValues = array((is_numeric($varId) ? $varId : 0), $varId);

		if ($intPid)
		{
			$arrColumns[] = "$t.pid=?";
			$arrValues[] = $intPid;
		}

		return static::findOneBy($arrColumns, $arrValues, $arrOptions);
	}


	/**
	 * Find a published article by its ID
	 *
	 * @param integer $intId      The article ID
	 * @param array   $arrOptions An optional options array
	 *
	 * @return static The model or null if there is no published article
	 */
	public static function findPublishedById($intId, array $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns = array("$t.id=?");

		if (!BE_USER_LOGGED_IN)
		{
			$time = \Date::floorToMinute();
			$arrColumns[] = "($t.start='' OR $t.start<='$time') AND ($t.stop='' OR $t.stop>'" . ($time + 60) . "') AND $t.published='1'";
		}

		return static::findOneBy($arrColumns, $intId, $arrOptions);
	}


	/**
	 * Find all published articles by their parent ID and column
	 *
	 * @param integer $intPid     The page ID
	 * @param string  $strColumn  The column name
	 * @param array   $arrOptions An optional options array
	 *
	 * @return \Model\Collection|\ArticleModel|null A collection of models or null if there are no articles in the given column
	 */
	public static function findPublishedByPidAndColumn($intPid, $strColumn, array $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns = array("$t.pid=? AND $t.inColumn=?");
		$arrValues = array($intPid, $strColumn);

		if (!BE_USER_LOGGED_IN)
		{
			$time = \Date::floorToMinute();
			$arrColumns[] = "($t.start='' OR $t.start<='$time') AND ($t.stop='' OR $t.stop>'" . ($time + 60) . "') AND $t.published='1'";
		}

		if (!isset($arrOptions['order']))
		{
			$arrOptions['order'] = "$t.sorting";
		}

		return static::findBy($arrColumns, $arrValues, $arrOptions);
	}


	/**
	 * Find all published articles with teaser by their parent ID and column
	 *
	 * @param integer $intPid     The page ID
	 * @param string  $strColumn  The column name
	 * @param array   $arrOptions An optional options array
	 *
	 * @return \Model\Collection|\ArticleModel|null A collection of models or null if there are no articles in the given column
	 */
	public static function findPublishedWithTeaserByPidAndColumn($intPid, $strColumn, array $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns = array("$t.pid=? AND $t.inColumn=? AND $t.showTeaser=1");
		$arrValues = array($intPid, $strColumn);

		if (!BE_USER_LOGGED_IN)
		{
			$time = \Date::floorToMinute();
			$arrColumns[] = "($t.start='' OR $t.start<='$time') AND ($t.stop='' OR $t.stop>'" . ($time + 60) . "') AND $t.published='1'";
		}

		if (!isset($arrOptions['order']))
		{
			$arrOptions['order'] = "$t.sorting";
		}

		return static::findBy($arrColumns, $arrValues, $arrOptions);
	}
}
