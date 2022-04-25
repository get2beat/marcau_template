<?php


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);

$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'marcau_modul',
    '--div--',
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'marcau_modul',
    'Configuration/TypoScript/',
    'marcau_modul'
);


$GLOBALS['TCA']['tt_content']['palettes'] += [
    'paletteTitel' => [
        'showitem' => 'header, tx_modul_showtitle, tx_modul_h1,',
    ],
    'paletteButton' => [
        'label' => 'Button unterhalb vom Text',
        'showitem' => 'tx_modul_link, tx_modul_link_title,',
    ],
    'paletteBild' => [
        'showitem' => 'tx_modul_bildposition, tx_modul_bilddimension,',
    ],
];





