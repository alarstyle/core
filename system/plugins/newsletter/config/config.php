<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['content'], 4, array
(
	'newsletter' => array
	(
		'tables'     => array('tl_newsletter_channel', 'tl_newsletter', 'tl_newsletter_recipients'),
		'send'       => array('Contao\\Newsletter', 'send'),
		'import'     => array('Contao\\Newsletter', 'importRecipients'),
		'icon'       => 'system/plugins/newsletter/assets/icon.gif',
		'stylesheet' => 'system/plugins/newsletter/assets/style.css'
	)
));


/**
 * Front end modules
 */
array_insert($GLOBALS['FE_MOD'], 4, array
(
	'newsletter' => array
	(
		'subscribe'   => 'Contao\\Modules\\ModuleSubscribe',
		'unsubscribe' => 'Contao\\Modules\\ModuleUnsubscribe',
		'nl_list'     => 'Contao\\Modules\\ModuleNewsletterList',
		'nl_reader'   => 'Contao\\Modules\\ModuleNewsletterReader'
	)
));


/**
 * Register hooks
 */
$GLOBALS['TL_HOOKS']['createNewUser'][] = array('Contao\\Newsletter', 'createNewUser');
$GLOBALS['TL_HOOKS']['activateAccount'][] = array('Contao\\Newsletter', 'activateAccount');
$GLOBALS['TL_HOOKS']['getSearchablePages'][] = array('Contao\\Newsletter', 'getSearchablePages');
$GLOBALS['TL_HOOKS']['closeAccount'][] = array('Contao\\Newsletter', 'removeSubscriptions');


/**
 * Add permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'newsletters';
$GLOBALS['TL_PERMISSIONS'][] = 'newsletterp';



/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	'mod_newsletter'        => 'system/plugins/newsletter/templates/modules',
	'mod_newsletter_list'   => 'system/plugins/newsletter/templates/modules',
	'mod_newsletter_reader' => 'system/plugins/newsletter/templates/modules',
	'nl_default'            => 'system/plugins/newsletter/templates/newsletter',
));
