<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Contao',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Controllers
	'Contao\BackendConfirm'            => 'system/plugins/core/controllers/BackendConfirm.php',
	'Contao\BackendFile'               => 'system/plugins/core/controllers/BackendFile.php',
	'Contao\BackendHelp'               => 'system/plugins/core/controllers/BackendHelp.php',
	'Contao\BackendLogin'              => 'system/plugins/core/controllers/BackendLogin.php',
	'Contao\BackendInstall'            => 'system/plugins/core/controllers/BackendInstall.php',
	'Contao\BackendMain'               => 'system/plugins/core/controllers/BackendMain.php',
	'Contao\BackendPage'               => 'system/plugins/core/controllers/BackendPage.php',
	'Contao\BackendPassword'           => 'system/plugins/core/controllers/BackendPassword.php',
	'Contao\BackendPopup'              => 'system/plugins/core/controllers/BackendPopup.php',
	'Contao\BackendPreview'            => 'system/plugins/core/controllers/BackendPreview.php',
	'Contao\BackendSwitch'             => 'system/plugins/core/controllers/BackendSwitch.php',
	'Contao\FrontendCron'              => 'system/plugins/core/controllers/FrontendCron.php',
	'Contao\FrontendIndex'             => 'system/plugins/core/controllers/FrontendIndex.php',
	'Contao\FrontendShare'             => 'system/plugins/core/controllers/FrontendShare.php',

	// Drivers
//	'Contao\Drivers\DC_File'                   => 'system/plugins/core/drivers/DC_File.php',
//	'Contao\Drivers\DC_Folder'                 => 'system/plugins/core/drivers/DC_Folder.php',
//	'Contao\Drivers\DC_Table'                  => 'system/plugins/core/drivers/DC_Table.php',

	// Elements
	'Contao\ContentAlias'              => 'system/plugins/core/elements/ContentAlias.php',
	'Contao\ContentCode'               => 'system/plugins/core/elements/ContentCode.php',
	'Contao\ContentDownload'           => 'system/plugins/core/elements/ContentDownload.php',
	'Contao\ContentDownloads'          => 'system/plugins/core/elements/ContentDownloads.php',
	'Contao\ContentElement'            => 'system/plugins/core/elements/ContentElement.php',
	'Contao\ContentGallery'            => 'system/plugins/core/elements/ContentGallery.php',
	'Contao\ContentHeadline'           => 'system/plugins/core/elements/ContentHeadline.php',
	'Contao\ContentHtml'               => 'system/plugins/core/elements/ContentHtml.php',
	'Contao\ContentHyperlink'          => 'system/plugins/core/elements/ContentHyperlink.php',
	'Contao\ContentImage'              => 'system/plugins/core/elements/ContentImage.php',
	'Contao\ContentList'               => 'system/plugins/core/elements/ContentList.php',
	'Contao\ContentMarkdown'           => 'system/plugins/core/elements/ContentMarkdown.php',
	'Contao\ContentMedia'              => 'system/plugins/core/elements/ContentMedia.php',
	'Contao\ContentModule'             => 'system/plugins/core/elements/ContentModule.php',
	'Contao\ContentSliderStart'        => 'system/plugins/core/elements/ContentSliderStart.php',
	'Contao\ContentSliderStop'         => 'system/plugins/core/elements/ContentSliderStop.php',
	'Contao\ContentTable'              => 'system/plugins/core/elements/ContentTable.php',
	'Contao\ContentText'               => 'system/plugins/core/elements/ContentText.php',
	'Contao\ContentToplink'            => 'system/plugins/core/elements/ContentToplink.php',
	'Contao\ContentYouTube'            => 'system/plugins/core/elements/ContentYouTube.php',

	// Forms
	'Contao\Form'                      => 'system/plugins/core/forms/Form.php',
	'Contao\FormCaptcha'               => 'system/plugins/core/forms/FormCaptcha.php',
	'Contao\FormCheckBox'              => 'system/plugins/core/forms/FormCheckBox.php',
	'Contao\FormExplanation'           => 'system/plugins/core/forms/FormExplanation.php',
	'Contao\FormFieldset'              => 'system/plugins/core/forms/FormFieldset.php',
	'Contao\FormFileUpload'            => 'system/plugins/core/forms/FormFileUpload.php',
	'Contao\FormHeadline'              => 'system/plugins/core/forms/FormHeadline.php',
	'Contao\FormHidden'                => 'system/plugins/core/forms/FormHidden.php',
	'Contao\FormHtml'                  => 'system/plugins/core/forms/FormHtml.php',
	'Contao\FormPassword'              => 'system/plugins/core/forms/FormPassword.php',
	'Contao\FormRadioButton'           => 'system/plugins/core/forms/FormRadioButton.php',
	'Contao\FormSelectMenu'            => 'system/plugins/core/forms/FormSelectMenu.php',
	'Contao\FormSubmit'                => 'system/plugins/core/forms/FormSubmit.php',
	'Contao\FormTextArea'              => 'system/plugins/core/forms/FormTextArea.php',
	'Contao\FormTextField'             => 'system/plugins/core/forms/FormTextField.php',

	// Library
	'Contao\Automator'                 => 'system/plugins/core/library/Contao/Automator.php',
	'Contao\BaseTemplate'              => 'system/plugins/core/library/Contao/BaseTemplate.php',
	'Contao\Cache'                     => 'system/plugins/core/library/Contao/Cache.php',
	'Contao\ClassLoader'               => 'system/plugins/core/library/Contao/ClassLoader.php',
	'Contao\Combiner'                  => 'system/plugins/core/library/Contao/Combiner.php',
	'Contao\Config'                    => 'system/plugins/core/library/Contao/Config.php',
	'Contao\Controller'                => 'system/plugins/core/library/Contao/Controller.php',
	'Contao\Database\Installer'        => 'system/plugins/core/library/Contao/Database/Installer.php',
	'Contao\Database\Mysql\Result'     => 'system/plugins/core/library/Contao/Database/Mysql/Result.php',
	'Contao\Database\Mysql\Statement'  => 'system/plugins/core/library/Contao/Database/Mysql/Statement.php',
	'Contao\Database\Mysql'            => 'system/plugins/core/library/Contao/Database/Mysql.php',
	'Contao\Database\Mysqli\Result'    => 'system/plugins/core/library/Contao/Database/Mysqli/Result.php',
	'Contao\Database\Mysqli\Statement' => 'system/plugins/core/library/Contao/Database/Mysqli/Statement.php',
	'Contao\Database\Mysqli'           => 'system/plugins/core/library/Contao/Database/Mysqli.php',
	'Contao\Database\Result'           => 'system/plugins/core/library/Contao/Database/Result.php',
	'Contao\Database\Statement'        => 'system/plugins/core/library/Contao/Database/Statement.php',
	'Contao\Database\Updater'          => 'system/plugins/core/library/Contao/Database/Updater.php',
	'Contao\Database'                  => 'system/plugins/core/library/Contao/Database.php',
	'Contao\Date'                      => 'system/plugins/core/library/Contao/Date.php',
	'Contao\Dbafs'                     => 'system/plugins/core/library/Contao/Dbafs.php',
	'Contao\DcaExtractor'              => 'system/plugins/core/library/Contao/DcaExtractor.php',
	'Contao\DcaLoader'                 => 'system/plugins/core/library/Contao/DcaLoader.php',
	'Contao\DiffRenderer'              => 'system/plugins/core/library/Contao/DiffRenderer.php',
	'Contao\Email'                     => 'system/plugins/core/library/Contao/Email.php',
	'Contao\Encryption'                => 'system/plugins/core/library/Contao/Encryption.php',
	'Contao\Environment'               => 'system/plugins/core/library/Contao/Environment.php',
	'Contao\Feed'                      => 'system/plugins/core/library/Contao/Feed.php',
	'Contao\FeedItem'                  => 'system/plugins/core/library/Contao/FeedItem.php',
	'Contao\File'                      => 'system/plugins/core/library/Contao/File.php',
	'Contao\Files\Ftp'                 => 'system/plugins/core/library/Contao/Files/Ftp.php',
	'Contao\Files\Php'                 => 'system/plugins/core/library/Contao/Files/Php.php',
	'Contao\Files'                     => 'system/plugins/core/library/Contao/Files.php',
	'Contao\Filter\SqlFiles'           => 'system/plugins/core/library/Contao/Filter/SqlFiles.php',
	'Contao\Filter\SyncExclude'        => 'system/plugins/core/library/Contao/Filter/SyncExclude.php',
	'Contao\Folder'                    => 'system/plugins/core/library/Contao/Folder.php',
	'Contao\GdImage'                   => 'system/plugins/core/library/Contao/GdImage.php',
	'Contao\Idna'                      => 'system/plugins/core/library/Contao/Idna.php',
	'Contao\Image'                     => 'system/plugins/core/library/Contao/Image.php',
	'Contao\Input'                     => 'system/plugins/core/library/Contao/Input.php',
	'Contao\InsertTags'                => 'system/plugins/core/library/Contao/InsertTags.php',
	'Contao\Message'                   => 'system/plugins/core/library/Contao/Message.php',
	'Contao\Model\Collection'          => 'system/plugins/core/library/Contao/Model/Collection.php',
	'Contao\Model\QueryBuilder'        => 'system/plugins/core/library/Contao/Model/QueryBuilder.php',
	'Contao\Model\Registry'            => 'system/plugins/core/library/Contao/Model/Registry.php',
	'Contao\Model'                     => 'system/plugins/core/library/Contao/Model.php',
	'Contao\PluginLoader'              => 'system/plugins/core/library/Contao/PluginLoader.php',
	'Contao\Pagination'                => 'system/plugins/core/library/Contao/Pagination.php',
	'Contao\Picture'                   => 'system/plugins/core/library/Contao/Picture.php',
	'Contao\Request'                   => 'system/plugins/core/library/Contao/Request.php',
	'Contao\RequestToken'              => 'system/plugins/core/library/Contao/RequestToken.php',
	'Contao\Search'                    => 'system/plugins/core/library/Contao/Search.php',
	'Contao\Session'                   => 'system/plugins/core/library/Contao/Session.php',
	'Contao\SortedIterator'            => 'system/plugins/core/library/Contao/SortedIterator.php',
	'Contao\String'                    => 'system/plugins/core/library/Contao/String.php',
	'Contao\StringUtil'                => 'system/plugins/core/library/Contao/StringUtil.php',
	'Contao\System'                    => 'system/plugins/core/library/Contao/System.php',
	'Contao\Template'                  => 'system/plugins/core/library/Contao/Template.php',
	'Contao\TemplateLoader'            => 'system/plugins/core/library/Contao/TemplateLoader.php',
	'Contao\User'                      => 'system/plugins/core/library/Contao/User.php',
	'Contao\Validator'                 => 'system/plugins/core/library/Contao/Validator.php',
	'Contao\Editor'                    => 'system/plugins/core/library/Contao/Editor.php',
	'Contao\ZipReader'                 => 'system/plugins/core/library/Contao/ZipReader.php',
	'Contao\ZipWriter'                 => 'system/plugins/core/library/Contao/ZipWriter.php',

	// Models
	'Contao\ArticleModel'              => 'system/plugins/core/models/ArticleModel.php',
	'Contao\ContentModel'              => 'system/plugins/core/models/ContentModel.php',
	'Contao\FilesModel'                => 'system/plugins/core/models/FilesModel.php',
	'Contao\FormFieldModel'            => 'system/plugins/core/models/FormFieldModel.php',
	'Contao\FormModel'                 => 'system/plugins/core/models/FormModel.php',
	'Contao\ImageSizeItemModel'        => 'system/plugins/core/models/ImageSizeItemModel.php',
	'Contao\ImageSizeModel'            => 'system/plugins/core/models/ImageSizeModel.php',
	'Contao\LayoutModel'               => 'system/plugins/core/models/LayoutModel.php',
	'Contao\MemberGroupModel'          => 'system/plugins/core/models/MemberGroupModel.php',
	'Contao\MemberModel'               => 'system/plugins/core/models/MemberModel.php',
	'Contao\ModuleModel'               => 'system/plugins/core/models/ModuleModel.php',
	'Contao\PageModel'                 => 'system/plugins/core/models/PageModel.php',
	'Contao\SessionModel'              => 'system/plugins/core/models/SessionModel.php',
	'Contao\StyleModel'                => 'system/plugins/core/models/StyleModel.php',
	'Contao\StyleSheetModel'           => 'system/plugins/core/models/StyleSheetModel.php',
	'Contao\ThemeModel'                => 'system/plugins/core/models/ThemeModel.php',
	'Contao\UserGroupModel'            => 'system/plugins/core/models/UserGroupModel.php',
	'Contao\UserModel'                 => 'system/plugins/core/models/UserModel.php',

	// Modules
	'Contao\Module'                    => 'system/plugins/core/modules/Module.php',
	'Contao\ModuleArticle'             => 'system/plugins/core/modules/ModuleArticle.php',
	'Contao\ModuleArticleList'         => 'system/plugins/core/modules/ModuleArticleList.php',
	'Contao\ModuleArticlenav'          => 'system/plugins/core/modules/ModuleArticlenav.php',
	'Contao\ModuleBooknav'             => 'system/plugins/core/modules/ModuleBooknav.php',
	'Contao\ModuleBreadcrumb'          => 'system/plugins/core/modules/ModuleBreadcrumb.php',
	'Contao\ModuleChangePassword'      => 'system/plugins/core/modules/ModuleChangePassword.php',
	'Contao\ModuleCloseAccount'        => 'system/plugins/core/modules/ModuleCloseAccount.php',
	'Contao\ModuleCustomnav'           => 'system/plugins/core/modules/ModuleCustomnav.php',
	'Contao\ModuleFlash'               => 'system/plugins/core/modules/ModuleFlash.php',
	'Contao\ModuleHtml'                => 'system/plugins/core/modules/ModuleHtml.php',
	'Contao\ModuleLogin'               => 'system/plugins/core/modules/ModuleLogin.php',
	'Contao\ModuleLogout'              => 'system/plugins/core/modules/ModuleLogout.php',
	'Contao\ModuleMaintenance'         => 'system/plugins/core/modules/ModuleMaintenance.php',
	'Contao\ModuleNavigation'          => 'system/plugins/core/modules/ModuleNavigation.php',
	'Contao\ModulePassword'            => 'system/plugins/core/modules/ModulePassword.php',
	'Contao\ModulePersonalData'        => 'system/plugins/core/modules/ModulePersonalData.php',
	'Contao\ModuleQuicklink'           => 'system/plugins/core/modules/ModuleQuicklink.php',
	'Contao\ModuleQuicknav'            => 'system/plugins/core/modules/ModuleQuicknav.php',
	'Contao\ModuleRegistration'        => 'system/plugins/core/modules/ModuleRegistration.php',
	'Contao\ModuleRssReader'           => 'system/plugins/core/modules/ModuleRssReader.php',
	'Contao\ModuleSearch'              => 'system/plugins/core/modules/ModuleSearch.php',
	'Contao\ModuleSitemap'             => 'system/plugins/core/modules/ModuleSitemap.php',
	'Contao\ModuleUser'                => 'system/plugins/core/modules/ModuleUser.php',

	// Pages
	'Contao\PageError403'              => 'system/plugins/core/pages/PageError403.php',
	'Contao\PageError404'              => 'system/plugins/core/pages/PageError404.php',
	'Contao\PageForward'               => 'system/plugins/core/pages/PageForward.php',
	'Contao\PageRedirect'              => 'system/plugins/core/pages/PageRedirect.php',
	'Contao\PageRegular'               => 'system/plugins/core/pages/PageRegular.php',
	'Contao\PageRoot'                  => 'system/plugins/core/pages/PageRoot.php',

	// Editors
	'Contao\CheckBox'                  => 'system/plugins/core/editors/CheckBox.php',
	'Contao\CheckBoxWizard'            => 'system/plugins/core/editors/CheckBoxWizard.php',
	'Contao\ChmodTable'                => 'system/plugins/core/editors/ChmodTable.php',
	'Contao\FileSelector'              => 'system/plugins/core/editors/FileSelector.php',
	'Contao\FileTree'                  => 'system/plugins/core/editors/FileTree.php',
	'Contao\ImageSize'                 => 'system/plugins/core/editors/ImageSize.php',
	'Contao\InputUnit'                 => 'system/plugins/core/editors/InputUnit.php',
	'Contao\KeyValueWizard'            => 'system/plugins/core/editors/KeyValueWizard.php',
	'Contao\ListWizard'                => 'system/plugins/core/editors/ListWizard.php',
	'Contao\MetaWizard'                => 'system/plugins/core/editors/MetaWizard.php',
	'Contao\ModuleWizard'              => 'system/plugins/core/editors/ModuleWizard.php',
	'Contao\OptionWizard'              => 'system/plugins/core/editors/OptionWizard.php',
	'Contao\PageSelector'              => 'system/plugins/core/editors/PageSelector.php',
	'Contao\PageTree'                  => 'system/plugins/core/editors/PageTree.php',
	'Contao\Password'                  => 'system/plugins/core/editors/Password.php',
	'Contao\RadioButton'               => 'system/plugins/core/editors/RadioButton.php',
	'Contao\RadioTable'                => 'system/plugins/core/editors/RadioTable.php',
	'Contao\SelectMenu'                => 'system/plugins/core/editors/SelectMenu.php',
	'Contao\TableWizard'               => 'system/plugins/core/editors/TableWizard.php',
	'Contao\TextArea'                  => 'system/plugins/core/editors/TextArea.php',
	'Contao\TextField'                 => 'system/plugins/core/editors/TextField.php',
	'Contao\TextStore'                 => 'system/plugins/core/editors/TextStore.php',
	'Contao\TimePeriod'                => 'system/plugins/core/editors/TimePeriod.php',
	'Contao\TrblField'                 => 'system/plugins/core/editors/TrblField.php',
	'Contao\Upload'                    => 'system/plugins/core/editors/Upload.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'analytics_google'    => 'system/plugins/core/templates/analytics',
	'analytics_piwik'     => 'system/plugins/core/templates/analytics',
	'be_changelog'        => 'system/plugins/core/templates/backend',
	'be_confirm'          => 'system/plugins/core/templates/backend',
	'be_diff'             => 'system/plugins/core/templates/backend',
	'be_error'            => 'system/plugins/core/templates/backend',
	'be_forbidden'        => 'system/plugins/core/templates/backend',
	'be_help'             => 'system/plugins/core/templates/backend',
	'be_incomplete'       => 'system/plugins/core/templates/backend',
	'be_install'          => 'system/plugins/core/templates/backend',
	'be_login'            => 'system/plugins/core/templates/backend',
	'be_main'             => 'system/plugins/core/templates/backend',
	'be_maintenance'      => 'system/plugins/core/templates/backend',
	'be_navigation'       => 'system/plugins/core/templates/backend',
	'be_no_active'        => 'system/plugins/core/templates/backend',
	'be_no_forward'       => 'system/plugins/core/templates/backend',
	'be_no_layout'        => 'system/plugins/core/templates/backend',
	'be_no_page'          => 'system/plugins/core/templates/backend',
	'be_no_root'          => 'system/plugins/core/templates/backend',
	'be_pagination'       => 'system/plugins/core/templates/backend',
	'be_password'         => 'system/plugins/core/templates/backend',
	'be_picker'           => 'system/plugins/core/templates/backend',
	'be_popup'            => 'system/plugins/core/templates/backend',
	'be_preview'          => 'system/plugins/core/templates/backend',
	'be_purge_data'       => 'system/plugins/core/templates/backend',
	'be_rebuild_index'    => 'system/plugins/core/templates/backend',
	'be_referer'          => 'system/plugins/core/templates/backend',
	'be_switch'           => 'system/plugins/core/templates/backend',
	'be_unavailable'      => 'system/plugins/core/templates/backend',
	'be_welcome'          => 'system/plugins/core/templates/backend',
	'be_wildcard'         => 'system/plugins/core/templates/backend',
	'block_searchable'    => 'system/plugins/core/templates/block',
	'block_section'       => 'system/plugins/core/templates/block',
	'block_sections'      => 'system/plugins/core/templates/block',
	'block_unsearchable'  => 'system/plugins/core/templates/block',
	'be_editor_base'      => 'system/plugins/core/templates/editors',
	'be_editor_chk'       => 'system/plugins/core/templates/editors',
	'be_editor_pw'        => 'system/plugins/core/templates/editors',
	'be_editor_rdo'       => 'system/plugins/core/templates/editors',
	'ce_code'             => 'system/plugins/core/templates/elements',
	'ce_download'         => 'system/plugins/core/templates/elements',
	'ce_downloads'        => 'system/plugins/core/templates/elements',
	'ce_headline'         => 'system/plugins/core/templates/elements',
	'ce_html'             => 'system/plugins/core/templates/elements',
	'ce_hyperlink'        => 'system/plugins/core/templates/elements',
	'ce_hyperlink_image'  => 'system/plugins/core/templates/elements',
	'ce_image'            => 'system/plugins/core/templates/elements',
	'ce_list'             => 'system/plugins/core/templates/elements',
	'ce_markdown'         => 'system/plugins/core/templates/elements',
	'ce_table'            => 'system/plugins/core/templates/elements',
	'ce_text'             => 'system/plugins/core/templates/elements',
	'form'                => 'system/plugins/core/templates/forms',
	'form_captcha'        => 'system/plugins/core/templates/forms',
	'form_checkbox'       => 'system/plugins/core/templates/forms',
	'form_explanation'    => 'system/plugins/core/templates/forms',
	'form_fieldset'       => 'system/plugins/core/templates/forms',
	'form_headline'       => 'system/plugins/core/templates/forms',
	'form_hidden'         => 'system/plugins/core/templates/forms',
	'form_html'           => 'system/plugins/core/templates/forms',
	'form_message'        => 'system/plugins/core/templates/forms',
	'form_password'       => 'system/plugins/core/templates/forms',
	'form_radio'          => 'system/plugins/core/templates/forms',
	'form_row'            => 'system/plugins/core/templates/forms',
	'form_row_double'     => 'system/plugins/core/templates/forms',
	'form_select'         => 'system/plugins/core/templates/forms',
	'form_submit'         => 'system/plugins/core/templates/forms',
	'form_textarea'       => 'system/plugins/core/templates/forms',
	'form_textfield'      => 'system/plugins/core/templates/forms',
	'form_upload'         => 'system/plugins/core/templates/forms',
	'form_widget'         => 'system/plugins/core/templates/forms',
	'form_xml'            => 'system/plugins/core/templates/forms',
	'fe_page'             => 'system/plugins/core/templates/frontend',
	'gallery_default'     => 'system/plugins/core/templates/gallery',
	'mail_default'        => 'system/plugins/core/templates/mail',
	'member_default'      => 'system/plugins/core/templates/member',
	'member_grouped'      => 'system/plugins/core/templates/member',
	'mod_article'         => 'system/plugins/core/templates/modules',
	'mod_article_list'    => 'system/plugins/core/templates/modules',
	'mod_article_nav'     => 'system/plugins/core/templates/modules',
	'mod_article_plain'   => 'system/plugins/core/templates/modules',
	'mod_article_teaser'  => 'system/plugins/core/templates/modules',
	'mod_booknav'         => 'system/plugins/core/templates/modules',
	'mod_breadcrumb'      => 'system/plugins/core/templates/modules',
	'mod_change_password' => 'system/plugins/core/templates/modules',
	'mod_flash'           => 'system/plugins/core/templates/modules',
	'mod_html'            => 'system/plugins/core/templates/modules',
	'mod_login_1cl'       => 'system/plugins/core/templates/modules',
	'mod_login_2cl'       => 'system/plugins/core/templates/modules',
	'mod_logout_1cl'      => 'system/plugins/core/templates/modules',
	'mod_logout_2cl'      => 'system/plugins/core/templates/modules',
	'mod_message'         => 'system/plugins/core/templates/modules',
	'mod_navigation'      => 'system/plugins/core/templates/modules',
	'mod_password'        => 'system/plugins/core/templates/modules',
	'mod_quicklink'       => 'system/plugins/core/templates/modules',
	'mod_quicknav'        => 'system/plugins/core/templates/modules',
	'mod_search'          => 'system/plugins/core/templates/modules',
	'mod_search_advanced' => 'system/plugins/core/templates/modules',
	'mod_search_simple'   => 'system/plugins/core/templates/modules',
	'mod_sitemap'         => 'system/plugins/core/templates/modules',
	'nav_default'         => 'system/plugins/core/templates/navigation',
	'pagination'          => 'system/plugins/core/templates/pagination',
	'picture_default'     => 'system/plugins/core/templates/picture',
	'rss_default'         => 'system/plugins/core/templates/rss',
	'rss_items_only'      => 'system/plugins/core/templates/rss',
	'search_default'      => 'system/plugins/core/templates/search',
));
