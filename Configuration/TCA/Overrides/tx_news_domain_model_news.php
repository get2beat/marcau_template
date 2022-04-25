<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

// Set title and icon (example below) for the news type
$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['type']['config']['items']['3'] =
    ['ohne Detail', 3,  'ext-news-type-ohnedetail'] ;

$GLOBALS['TCA']['tx_news_domain_model_news']['types']['3'] = [
    'showitem' => 'type,title,--palette--;;paletteSlug,teaser,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
                    fal_media,fal_related_files,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;paletteHidden,
                    --palette--;;paletteAccess,'
];
