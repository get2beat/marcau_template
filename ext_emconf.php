<?php

/**
 * Extension Manager/Repository config file for ext "marcau_template".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Marcau Template',
    'description' => 'Configuration for Marcau typo3 template',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '10.2.0-10.4.99',
            'fluid_styled_content' => '10.2.0-10.4.99',
            'rte_ckeditor' => '10.2.0-10.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Marcau\\MarcauTemplate\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Beat Hausheer',
    'author_email' => 'info@marcau.ch',
    'author_company' => 'Marcau',
    'version' => '2.6',
];
