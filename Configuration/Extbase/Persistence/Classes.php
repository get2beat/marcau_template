<?php
return [
    \GeorgRinger\News\Domain\Model\News::class => [
        'subclasses' => [
            3 => \Marcau\MarcauTemplate\Domain\Model\OhneDetail::class,
        ]
    ],
    \Marcau\MarcauTemplate\Domain\Model\OhneDetail::class => [
        'tableName' => 'tx_news_domain_model_news',
        'recordType' => 3,
    ]
];
