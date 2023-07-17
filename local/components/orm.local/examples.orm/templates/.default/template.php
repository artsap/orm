<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var array $APPLICATION */

/** @var array $component */

use Bitrix\Main\Loader;
use Orm\Local\OrmTable;
use Orm\Local\UserTable;

Loader::includeModule('iblock');

global $USER;

$add1 = OrmTable::add([
    'NAME'       => 'Название',
    'ELEMENT_ID' => 4,
]);

$add2 = UserTable::add([
    'NAME'       => 'Название элемента',
    'CREATED_BY' => $USER->GetID(),
]);

/*
 *
OrmTable::update(2, ['NAME' => 'Название 2']);

OrmTable::delete(3);

*/

$res = OrmTable::query()
    ->setSelect([
        'ID',
        'NAME',
        'IBLOCK_TABLE_NAME' => 'IBLOCK_TABLE.NAME',
        'IBLOCK_TABLE_ID'   => 'IBLOCK_TABLE.ID',
        'ELEMENT_ID'
    ])->fetchAll();

if ($USER->IsAdmin()) {
    echo '<pre>';
    print_r($res);
    echo '</pre>';
}
