<?php
defined('TYPO3_MODE') || die();

/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['marcaurte'] = 'EXT:marcau_template/Configuration/RTE/MarcauRTE.yaml';


/***************
 * PageTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:marcau_template/Configuration/TsConfig/Page/All.tsconfig">');

call_user_func(function () {

    // Register content element icons
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'tx_modul_text',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:marcau_template/Resources/Public/Icons/Content/m-text.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_bildtext',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:marcau_template/Resources/Public/Icons/Content/m-bildtext.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_galerieslider',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:marcau_template/Resources/Public/Icons/Content/m-galerieslider.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_galeriekarussell',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:marcau_template/Resources/Public/Icons/Content/m-galeriekarussell.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_accordion',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:marcau_template/Resources/Public/Icons/Content/m-accordion.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_trennlinie',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:marcau_template/Resources/Public/Icons/Content/m-trennlinie.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_header',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:marcau_template/Resources/Public/Icons/Content/m-header.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_topslider',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:marcau_template/Resources/Public/Icons/Content/m-topslider.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'ext-news-type-ohnedetail',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:marcau_template/Resources/Public/Icons/Content/bild.svg',
        ]
    );



    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:marcau_template/Configuration/TsConfig/Page/NewContentElementWizard.tsconfig">'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:marcau_template/Configuration/TsConfig/Page/BackendPreview.tsconfig">'
    );
// Add backend preview hook
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['marcau_template'] =
        Marcau\MarcauTemplate\Hooks\PageLayoutViewDrawItem::class;

});
