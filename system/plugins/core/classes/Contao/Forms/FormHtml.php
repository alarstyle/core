<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Contao\Forms;


/**
 * Class FormHtml
 *
 * @property string $html
 *
 * @author Leo Feyer <https://github.com/leofeyer>
 */
class FormHtml extends \Contao\Editor
{

	/**
	 * Template
	 *
	 * @var string
	 */
	protected $strTemplate = 'form_html';


	/**
	 * Do not validate
	 */
	public function validate()
	{
		return;
	}


	/**
	 * Parse the template file and return it as string
	 *
	 * @param array $arrAttributes An optional attributes array
	 *
	 * @return string The template markup
	 */
	public function parse($arrAttributes=null)
	{
		if (TL_MODE == 'BE')
		{
			$this->html = htmlspecialchars($this->html);
		}

		return parent::parse($arrAttributes);
	}


	/**
	 * Generate the editor and return it as string
	 *
	 * @return string The editor markup
	 */
	public function generate()
	{
		return (TL_MODE == 'FE') ? $this->html : htmlspecialchars($this->html);
	}
}
