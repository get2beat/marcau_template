<?php
return [
    'ctrl' => [
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'editlock' => 'editlock',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'translationSource' => 'l10n_source',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
        'title' => 'tx_modul_slides',
        'label' => 'tx_modul_titel',
        'iconfile' => 'EXT:marcau_template/Resources/Public/Icons/Extension.png',
        'hideTable' => true,
    ],
    'palettes' => [
        'language' => [
            'showitem' => '
                        sys_language_uid;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:sys_language_uid_formlabel,l18n_parent
                    ',
        ],
        'hidden' => [
            'showitem' => '
                        hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden
                    ',
        ],
        'access' => [
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access',
            'showitem' => '
                        starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                        endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel,
                        --linebreak--,
                        fe_group;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:fe_group_formlabel,
                        --linebreak--,editlock
                    ',
        ],
    ],
    'columns' => [
        'editlock' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:editlock',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        '',
                        '',
                    ],
                ],
            ],
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple',
                    ],
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0,
                    ],
                ],
                'default' => 0,
                'foreign_table' => 'tx_modul_slides',
                'foreign_table_where' => 'AND tx_modul_slides.pid=###CURRENT_PID### AND tx_modul_slides.sys_language_uid IN (-1, 0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => 2145913200,
                ],
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
        ],
        'fe_group' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                        -1,
                    ],
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                        -2,
                    ],
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                        '--div--',
                    ],
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
            ],
        ],
        'parentid' => [
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0,
                    ],
                ],
                'default' => 0,
                'foreign_table' => 'tt_content',
                'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.sys_language_uid IN (-1, ###REC_FIELD_sys_language_uid###)',
            ],
        ],
        'parenttable' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'sorting' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'tx_modul_link' => [
            'config' => [
                'autocomplete' => '0',
                'behaviour' => [
                    'allowLanguageSynchronization' => '0',
                ],
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'title' => 'Link',
                        ],
                    ],
                ],
                'renderType' => 'inputLink',
                'softref' => 'typolink',
                'type' => 'input',
            ],
            'exclude' => '1',
            'label' => 'Link (Button)',
        ],
        'tx_modul_link_title' => [
            'config' => [
                'autocomplete' => '0',
                'behaviour' => [
                    'allowLanguageSynchronization' => '0',
                ],
                'type' => 'input',
            ],
            'exclude' => '1',
            'label' => 'Link Titel',
        ],
        'tx_modul_media' => [
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'tx_modul_media',
                ],
                'foreign_label' => 'uid_local',
                'foreign_selector' => 'uid_local',
                'overrideChildTca' => [
                    'columns' => [
                        'uid_local' => [
                            'config' => [
                                'appearance' => [
                                    'elementBrowserType' => 'file',
                                    'elementBrowserAllowed' => 'jpg,jpeg,png,mp4,webp',
                                ],
                            ],
                        ],
                    ],
                    'types' => [
                        [
                            'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette',
                        ],
                        [
                            'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette',
                        ],
                        [
                            'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette',
                        ],
                        [
                            'showitem' => '
                                --palette--;;audioOverlayPalette,
                                --palette--;;filePalette',
                        ],
                        [
                            'showitem' => '
                                --palette--;;videoOverlayPalette,
                                --palette--;;filePalette',
                        ],
                        [
                            'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette',
                        ],
                    ],
                ],
                'filter' => [
                    [
                        'userFunc' => 'TYPO3\\CMS\\Core\\Resource\\Filter\\FileExtensionFilter->filterInlineChildren',
                        'parameters' => [
                            'allowedFileExtensions' => 'jpg,jpeg,png,mp4,webp',
                        ],
                    ],
                ],
                'appearance' => [
                    'useSortable' => '0',
                    'headerThumbnail' => [
                        'field' => 'uid_local',
                        'height' => '45m',
                    ],
                    'enabledControls' => [
                        'info' => true,
                        'new' => false,
                        'dragdrop' => true,
                        'sort' => false,
                        'hide' => true,
                        'delete' => true,
                    ],
                    'collapseAll' => '1',
                    'expandSingle' => '1',
                    'fileUploadAllowed' => '1',
                    'showAllLocalizationLink' => '1',
                    'showPossibleLocalizationRecords' => '1',
                    'showRemovedLocalizationRecords' => '1',
                    'showSynchronizationLink' => '0',
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => '0',
                ],
                'maxitems' => '1',
                'minitems' => '1',
            ],
            'exclude' => '1',
            'label' => 'Media (Bild/Video)',
        ],
        'tx_modul_titel' => [
            'config' => [
                'autocomplete' => '0',
                'behaviour' => [
                    'allowLanguageSynchronization' => '0',
                ],
                'type' => 'input',
            ],
            'exclude' => '1',
            'label' => 'Titel',
        ],
        'tx_modul_h1' => [
            'displayCond' => 'FIELD:tx_modul_spalten:<:2',
            'config' => [
                'behaviour' => [
                    'allowLanguageSynchronization' => '0',
                ],
                'cols' => '1',
                'renderType' => 'checkboxToggle',
                'type' => 'check',
            ],
            'exclude' => '1',
            'label' => 'Überschrift als H1 markieren (Nur einmal pro Seite!)',
        ],
        't3_origuid' => [
            'config' => [
                'type' => 'passthrough',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
                'default' => 0,
            ],
        ],
    ],
    'types' => [
        1 => [
            'showitem' => 'tx_modul_titel,tx_modul_h1,tx_modul_media,tx_modul_link,tx_modul_link_title,',
        ],
    ],
];
