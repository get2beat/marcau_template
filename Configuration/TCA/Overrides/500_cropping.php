<?php

/*
 * This file is part of the package marcau/glatsch.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die();



/***************
 * Add crop variants
 */
$defaultCropSettings = [
    'title' => 'Seitenverhältnis',
    'allowedAspectRatios' => [
        '1:1' => [
            'title' => 'Quadrat 1/1',
            'value' => 1 / 1
        ],
        '3:2' => [
            'title' => 'Querformat 3/2',
            'value' => 3 / 2
        ],
        '4:3' => [
            'title' => 'Fotoformat 4/3',
            'value' => 4 / 3
        ],
        'NaN' => [
            'title' => 'Frei',
            'value' => 0.0
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ],

];

$querformatCropSettings = [
    'title' => 'Seitenverhältnis',
    'allowedAspectRatios' => [
        '3:2' => [
            'title' => 'Querformat 3/2',
            'value' => 3 / 2
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];
$quadratCropSettings = [
    'title' => 'Quadrat',
    'allowedAspectRatios' => [
        '1:1' => [
            'title' => 'Quadrat 1/1',
            'value' => 1 / 1
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];
$querquadratformatCropSettings = [
    'title' => 'Seitenverhältnis',
    'allowedAspectRatios' => [

        '3:2' => [
            'title' => 'Querformat 3/2',
            'value' => 3 / 2
        ],
        '1:1' => [
            'title' => 'Quadrat 1/1',
            'value' => 1 / 1
        ],
        'NaN' => [
            'title' => 'Frei',
            'value' => 0.0
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ],

];
$galerieSliderCropSettings = [
    'title' => 'Seitenverhältnis',
    'allowedAspectRatios' => [
        '21:10' => [
            'title' => 'Querformat 21/10',
            'value' => 21 / 10
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];
/***************
 * Image content element
 */
$GLOBALS['TCA']['tt_content']['types']['image']['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettings;


/***************
 * Textpic content element
 */
$GLOBALS['TCA']['tt_content']['types']['textpic']['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettings;

/***************
 * Media content element
 */
$GLOBALS['TCA']['tt_content']['types']['media']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettings;


/***************
 * News Media content element
 */

$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop'] = $querquadratformatCropSettings;
$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop']['title'] = 'Querformat';
$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile'] = $quadratCropSettings;
$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile']['title'] = 'Quadrat';

/***************
 * Textmedia content element
 */
$GLOBALS['TCA']['tt_content']['types']['textmedia']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettings;

/******************
 * mask image bild
 */
$GLOBALS['TCA']['tt_content']['types']['modul_bild']['columnsOverrides']['tx_modul_bild']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettings;


$headerDesktopCropSettings  = [
    'title' => 'Top Slider Desktop',
    'allowedAspectRatios' => [
        '64 / 25' => [
            'title' => 'Bild Desktop',
            'value' => 64 / 25
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];

$headerMobileCropSettings = [
    'title' => 'Top Slider Mobile',
    'allowedAspectRatios' => [
        '1 / 1' => [
            'title' => 'Bild Mobile',
            'value' => 1 / 1
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];

/******************
 * Top slider
 */
$GLOBALS['TCA']['tx_modul_slides']['columns']['tx_modul_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop']['title'] = 'Mobile Quadrat';
$GLOBALS['TCA']['tx_modul_slides']['columns']['tx_modul_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop'] = $headerDesktopCropSettings;
$GLOBALS['TCA']['tx_modul_slides']['columns']['tx_modul_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile']['title'] = 'Mobile Quadrat';
$GLOBALS['TCA']['tx_modul_slides']['columns']['tx_modul_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile'] = $headerMobileCropSettings;


$hochformatCropSettings = [
    'title' => 'Hochformat',
    'allowedAspectRatios' => [
        '1.5:2' => [
            'title' => 'Hochformat 1.5/2',
            'value' => 0.7445

        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];
$karusselquadratCropSettings = [
    'title' => 'Quadrat',
    'allowedAspectRatios' => [
        '1:1' => [
            'title' => 'Quadrat 1/1',
            'value' => 1 / 1
        ],
        'NaN' => [
            'title' => 'Frei',
            'value' => 0.0
        ],
    ],

    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];



/******************
 * modul bildtext
 */
$GLOBALS['TCA']['tt_content']['types']['modul_bildtext']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $querquadratformatCropSettings;
$GLOBALS['TCA']['tt_content']['types']['modul_bildtext']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default']['title'] = 'Seitenverhältnis Quer/Quadrat';


/******************
 * modul galerieSlider
 */
$GLOBALS['TCA']['tt_content']['types']['modul_galerieslider']['columnsOverrides']['tx_modul_bild']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop'] = $galerieSliderCropSettings;
$GLOBALS['TCA']['tt_content']['types']['modul_galerieslider']['columnsOverrides']['tx_modul_bild']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop']['title'] = 'Querformat';
$GLOBALS['TCA']['tt_content']['types']['modul_galerieslider']['columnsOverrides']['tx_modul_bild']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile'] = $quadratCropSettings;
$GLOBALS['TCA']['tt_content']['types']['modul_galerieslider']['columnsOverrides']['tx_modul_bild']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile']['title'] = 'Quadrat';

/******************
 * modul galerieSlider
 */
$GLOBALS['TCA']['tt_content']['types']['modul_galeriekarussell']['columnsOverrides']['tx_modul_bild']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktopmobile'] = $karusselquadratCropSettings;
$GLOBALS['TCA']['tt_content']['types']['modul_galeriekarussell']['columnsOverrides']['tx_modul_bild']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktopmobile']['title'] = 'Quadrat';

/***************
 * Image crop for All pages
 *
 * If you want to change the cropVariants for a special pagetype, you have to use
 * $GLOBALS['TCA']['pages']['types']['THE_PAGE_TYPE']['columnsOverrides']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']
 */
$GLOBALS['TCA']['pages']['columns']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $headerLargeCropSettings;
$GLOBALS['TCA']['pages']['columns']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['large'] = $headerLargeCropSettings;
$GLOBALS['TCA']['pages']['columns']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['medium']  = $headerMediumCropSettings;
$GLOBALS['TCA']['pages']['columns']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['small']   = $headerSmallCropSettings;
