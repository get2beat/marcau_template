<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_modul_slides');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_modul_accordions');


$GLOBALS['TBE_STYLES']['skins']['marcau_template']['stylesheetDirectories'];
$GLOBALS['TBE_STYLES']['skins']['marcau_template']['stylesheetDirectories'][] = 'EXT:marcau_template/Resources/Public/Css/';
