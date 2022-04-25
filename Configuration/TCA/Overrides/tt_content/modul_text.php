<?php
defined('TYPO3_MODE') || die();

call_user_func(function () {

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['modul_text'] = 'tx_modul_text';

    $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
        'Titel und Text',
        'modul_text',
        'tx_modul_text',
    ];


    $tempTypes = [
        'modul_text' => [
            'columnsOverrides' => [
                'bodytext' => [
                    'config' => [
                        'enableRichtext' => 1,
                    ],
                ],
            ],
            'showitem' => '--div--;Allgemein,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
        tx_modul_spalten,--palette--;;paletteTitel,
        bodytext,tx_modul_textspalterechts,--palette--;;paletteButton,tx_modul_textposition,tx_modul_backgroundcolor,--div--;
        LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,--palette--;;language,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,--palette--;;hidden,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,--div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,categories,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended',
        ],

    ];
    $GLOBALS['TCA']['tt_content']['types'] += $tempTypes;



});





