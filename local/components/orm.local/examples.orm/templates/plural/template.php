<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var array $APPLICATION */

/** @var array $component */

use Bitrix\Main\Loader;
use Bitrix\Iblock\Iblock;

Loader::includeModule('iblock');
global $USER;

/*
 * Неймспейс и класс инфоблока по его ID
 * \Bitrix\Iblock\Elements\ElementCatalogTable
 * \Bitrix\Iblock\Elements\Element<Символьный код API>Table
 */

$catalog = Iblock::wakeUp(2)->getEntityDataClass(); // ID Инфоблока 2
$elementId = 4;

$elements = $catalog::getList([ // Или query()
    'select' => [
        'ID',
        'NAME',
        'DETAIL_PICTURE',
        'BRAND_REF', // множественное свойство "справочник"
        'MATERIAL', // множественное свойство
        'RECOMMEND' // Привязка к элементам
    ],
    'filter' => [
        '=ID' => $elementId,
    ],
])->fetchCollection();

foreach ($elements as $element) {
    echo '<h3>' . $element->get('NAME') . '</h3>';

    echo '<h4>Бренд</h4><ul>';
    foreach ($element->getBrandRef()->getAll() as $value) {
        echo '<li>' . $value->getValue() . '</li>';
    }
    echo '</ul>';

    echo '<h4>Материал</h4><ul>';
    foreach ($element->getMaterial()->getAll() as $value) {
        echo '<li>' . $value->getValue() . '</li>';
    }
    echo '</ul>';

    echo '<h4>С этим товаром рекомендуем</h4><ul>';
    foreach ($element->getRecommend()->getAll() as $value) {
        echo '<li>' . $value->getValue() . '</li>';
    }
    echo '</ul>';
}