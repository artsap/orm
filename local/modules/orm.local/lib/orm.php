<?php

namespace Orm\Local;

use Bitrix\Main\ORM;
use Bitrix\Main\ORM\Data\DataManager;

class OrmTable extends DataManager
{
    /**
     * Имя таблицы
     */
    public static function getTableName()
    {
        return 'my_table';
    }

    /**
     * Описание таблицы
     */
    public static function getMap()
    {
        return [
            new ORM\Fields\IntegerField('ID', [
                'primary'      => true,
                'autocomplete' => true,
            ]),
            new ORM\Fields\StringField('NAME', [
                'required' => true,
            ]),
            new ORM\Fields\IntegerField('ELEMENT_ID', [
                'required' => true,
            ]),
            new ORM\Fields\Relations\Reference(
                'IBLOCK_TABLE',
                '\Bitrix\Iblock\Element',
                ['=this.ELEMENT_ID' => 'ref.ID'],
                ['join_type' => 'LEFT']
            ),
        ];
    }
}