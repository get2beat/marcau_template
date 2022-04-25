<?php
defined('TYPO3_MODE') || die();

call_user_func(function () {

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['modul_header'] = 'tx_modul_header';

    $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
        'Überschrift',
        'modul_header',
        'tx_modul_header',
    ];


    $tempTypes = [
        'modul_header' => [
            'columnsOverrides' => [
                'bodytext' => [
                    'config' => [
                        'enableRichtext' => 1,
                    ],
                ],
            ],
            'showitem' => '--div--;Allgemein,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
        header,tx_modul_h1,tx_modul_textposition,tx_modul_backgroundcolor,--div--;
        LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,--palette--;;language,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,--palette--;;hidden,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,--div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,categories,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended',
        ],

    ];
    $GLOBALS['TCA']['tt_content']['types'] += $tempTypes;



});





