<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var array $APPLICATION */
/** @var array $component */

use Orm\Local\UserTable;

global $USER;

$res = UserTable::query()
    ->setSelect([
        'NAME',
        'USER_NAME' => 'CREATED_BY_USER.NAME',
        'USER_ID'   => 'CREATED_BY_USER.ID',
        //'CREATED_BY_USER', // Все поля
    ])->fetchAll();

if ($USER->IsAdmin()) {
    echo '<pre>';
    print_r($res);
    echo '</pre>';
}


