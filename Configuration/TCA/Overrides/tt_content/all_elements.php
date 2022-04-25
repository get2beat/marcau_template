<?php

$tempColumns = [
    'header' => [
        'displayCond' => 'FIELD:tx_modul_spalten:<:2',
        'l10n_mode' => 'prefixLangTitle',
        'label' => 'Titel',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
        ],
    ],
    'bodytext' => [
        'l10n_mode' => 'prefixLangTitle',
        'label' => 'Text',
        'config' => [
            'type' => 'text',
            'cols' => 80,
            'rows' => 15,
            'softref' => 'typolink_tag,email[subst],url',
            'search' => [
                'andWhere' => '`CType`=\'text\' OR `CType`=\'textpic\' OR `CType`=\'textmedia\'',
            ],
        ],
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
    'tx_modul_spalten' => [
        'exclude' => 1,
        'label' => 'Spalten',
        'onChange' => 'reload',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                [
                    'Einspaltig',
                    1,
                ],
                [
                    'Zweinspaltig',
                    2,
                ],
            ],
        ],
    ],
    'tx_modul_textspalterechts' => [
        'displayCond' => 'FIELD:tx_modul_spalten:=:2',
        'config' => [
            'behaviour' => [
                'allowLanguageSynchronization' => '0',
            ],
            'type' => 'text',
            'enableRichtext' => true,
        ],
        'exclude' => '1',
        'label' => 'Text in Spalte Rechts',
    ],
    'tx_modul_backgroundcolor' => [
        'config' => [
            'items' => [
                [
                    'Keine',
                    '',
                ],
                [
                    'Dunkel',
                    'color-dunkel',
                ],
                [
                    'Hell',
                    'color-hell',
                ],
            ],
            'renderType' => 'selectSingle',
            'type' => 'select',
        ],
        'name' => 'select',
        'label' => 'Hintergrundfarbe',
    ],
    'tx_modul_topslider_config' => [
        'config' => [
            'items' => [
                [
                    'Vollbild',
                    0,
                ],
                [
                    'Fläche',
                    1,
                ],
                [
                    'Fläche mit 3/4 Hintergrund',
                    2,
                ],
                [
                    'Fläche mit Hintergrundrahemen',
                    3,
                ],
            ],
            'renderType' => 'selectSingle',
            'type' => 'select',
        ],
        'name' => 'select',
        'label' => 'Ausgabe Topslider',
    ],
    'tx_modul_trennlinie' => [
        'config' => [
            'renderType' => 'checkboxToggle',
            'type' => 'check',
        ],
        'name' => 'check',
        'label' => 'Trennlinie',
    ],
    'tx_modul_select_trennlinie' => [
        'exclude' => 1,
        'label' => 'Trennlinie als:',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                [
                    'Einfache Linie',
                    1,
                ],
                [
                    'Linie als Logo',
                    2,
                ],
            ],
        ],
    ],
    'tx_modul_link' => [
        'displayCond' => 'FIELD:tx_modul_spalten:<:2',
        'config' => [
            'renderType' => 'inputLink',
            'softref' => 'typolink',
            'type' => 'input',
        ],
        'name' => 'link',
        'label' => 'Link (Button)',
    ],
    'tx_modul_link_title' => [
        'displayCond' => 'FIELD:tx_modul_spalten:<:2',
        'config' => [
            'type' => 'input',
        ],
        'name' => 'string',
        'label' => 'Link Titel',
    ],
    'tx_modul_showtitle' => [
        'displayCond' => 'FIELD:tx_modul_spalten:<:2',
        'config' => [
            'renderType' => 'checkboxToggle',
            'type' => 'check',
        ],
        'name' => 'check',
        'label' => 'Titel anzeigen',
    ],
    'tx_modul_textposition' => [
        'displayCond' => 'FIELD:tx_modul_spalten:<:2',
        'config' => [
            'items' => [
                [
                    'Linksbündig',
                    'text-left',
                ],
                [
                    'Zentriert',
                    'text-center',
                ],
            ],
            'renderType' => 'selectSingle',
            'type' => 'select',
        ],
        'name' => 'select',
        'label' => 'Textposition',
    ],
    'tx_modul_bild' => [
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'sys_file_reference',
            'foreign_field' => 'uid_foreign',
            'foreign_sortby' => 'sorting_foreign',
            'foreign_table_field' => 'tablenames',
            'foreign_match_fields' => [
                'fieldname' => 'tx_modul_bild',
            ],
            'foreign_label' => 'uid_local',
            'foreign_selector' => 'uid_local',
            'overrideChildTca' => [
                'columns' => [
                    'uid_local' => [
                        'config' => [
                            'appearance' => [
                                'elementBrowserType' => 'file',
                                'elementBrowserAllowed' => 'jpg,jpeg,png',
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
                                --palette--;;audiovideoOverlayPalette,
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
                        'allowedFileExtensions' => 'jpg,jpeg,png',
                    ],
                ],
            ],
            'appearance' => [
                'useSortable' => '1',
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
                'fileUploadAllowed' => '1',
            ],
            'maxitems' => '50',
            'minitems' => '0',
        ],
        'exclude' => '1',
        'label' => 'Bild',
    ],
    'tx_modul_bildposition' => [
        'config' => [
            'default' => '1',
            'behaviour' => [
                'allowLanguageSynchronization' => '0',
            ],
            'items' => [
                [
                    'Links',
                    '1',
                ],
                [
                    'Rechts',
                    '2',
                ],
            ],
            'renderType' => 'selectSingle',
            'type' => 'select',
        ],
        'exclude' => '1',
        'label' => 'Bildposition',
    ],
    'tx_modul_bilddimension' => [
        'config' => [
            'items' => [
                [
                    'Normal',
                    'normal',
                ],
                [
                    'Gross',
                    'gross',
                ],
            ],
            'renderType' => 'selectSingle',
            'type' => 'select',
        ],
        'name' => 'select',
        'label' => 'Bildgrösse',
    ],
    'assets' => [
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'sys_file_reference',
            'foreign_field' => 'uid_foreign',
            'foreign_sortby' => 'sorting_foreign',
            'foreign_table_field' => 'tablenames',
            'foreign_match_fields' => [
                'fieldname' => 'assets',
            ],
            'foreign_label' => 'uid_local',
            'foreign_selector' => 'uid_local',
            'overrideChildTca' => [
                'columns' => [
                    'uid_local' => [
                        'config' => [
                            'appearance' => [
                                'elementBrowserType' => 'file',
                                'elementBrowserAllowed' => 'gif,jpg,jpeg,bmp,png,svg,ai,webp,mp3,wav,mp4,ogg,flac,opus,webm,youtube,vimeo',
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
                                --palette--;;audiovideoOverlayPalette,
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
                        'allowedFileExtensions' => 'gif,jpg,jpeg,bmp,png,svg,ai,webp,mp3,wav,mp4,ogg,flac,opus,webm,youtube,vimeo',
                    ],
                ],
            ],
        ],
        'label' => 'LLL:EXT:frontend/Resources/Private/Language/Database.xlf:tt_content.asset_references',
    ],

];

