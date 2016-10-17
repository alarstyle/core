<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Contao\Modules;


/**
 * Front end module "HTML".
 *
 * @author Leo Feyer <https://github.com/leofeyer>
 */
class ModuleHtml extends AbstractModule
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_html';


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		$this->Template->html = (TL_MODE == 'FE') ? $this->html : htmlspecialchars($this->html);
	}
}
