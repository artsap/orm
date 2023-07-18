<?php

namespace Orm\Local;

use Bitrix\Main\ORM;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Iblock\Iblock;

class UserTable extends DataManager
{
    /**
     * Имя таблицы
     */
    public static function getTableName()
    {
        return 'my_table_user';
    }

    /**
     * Массив сущностей (полей таблицы) с которыми будем работать
     */
    public static function getMap()
    {
        return [
            new ORM\Fields\IntegerField('ID', [
                'primary'      => true,
                'autocomplete' => true,
            ]),
            new ORM\Fields\IntegerField('CREATED_BY', [
                'required' => true,
            ]),
            new ORM\Fields\StringField('NAME', [
                'required' => true,
            ]),
            new ORM\Fields\Relations\Reference(
                'CREATED_BY_USER',
                '\Bitrix\Main\User',
                ['=this.CREATED_BY' => 'ref.ID'],
                ['join_type' => 'LEFT']
            ),
        ];
    }
}