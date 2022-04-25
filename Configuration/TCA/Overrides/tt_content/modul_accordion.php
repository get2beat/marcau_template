<?php
defined('TYPO3_MODE') || die();

call_user_func(function () {


    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['modul_accordion'] = 'tx_modul_accordion';

    $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
        'Akkordeon',
        'modul_accordion',
        'tx_modul_accordion',
    ];

    $tempColumns = [
        'tx_modul_accordions' => [
            'config' => [
                'appearance' => [
                    'collapseAll' => '1',
                    'enabledControls' => [
                        'dragdrop' => '1',
                    ],
                    'expandSingle' => '1',
                    'levelLinksPosition' => 'top',
                    'showAllLocalizationLink' => '1',
                    'showPossibleLocalizationRecords' => '1',
                    'showRemovedLocalizationRecords' => '1',
                    'showSynchronizationLink' => '0',
                    'useSortable' => '1',
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => '0',
                ],
                'foreign_field' => 'parentid',
                'foreign_sortby' => 'sorting',
                'foreign_table' => 'tx_modul_accordions',
                'foreign_table_field' => 'parenttable',
                'type' => 'inline',
            ],
            'exclude' => '1',
            'label' => 'Accordion',
        ],
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);

    $tempTypes = [
        'modul_accordion' => [
            'columnsOverrides' => [
                'bodytext' => [
                    'config' => [
                        'enableRichtext' => 1,
                    ],
                ],
            ],
            'showitem' => '--div--;Allgemein,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
            tx_modul_accordions,tx_modul_backgroundcolor,--div--;
            LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,--palette--;;language,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,--palette--;;hidden,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,--div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,categories,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended',
        ],

    ];
    $GLOBALS['TCA']['tt_content']['types'] += $tempTypes;



});





