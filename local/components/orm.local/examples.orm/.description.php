<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = [
    "NAME"        => 'Примеры ORM',
    "DESCRIPTION" => 'Примеры ORM',
    "SORT"        => 100,
    "CACHE_PATH"  => "Y",
    "PATH"        => [
        "ID"    => "pena",
        "NAME"  => 'Pena Agency',
        "SORT"  => 100,
        "CHILD" => [
            "ID"   => "examples.orm",
            "NAME" => 'Примеры'
        ],
    ],
];