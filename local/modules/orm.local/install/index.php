<?php

use Bitrix\Main\Loader;
use Bitrix\Main\ORM\Entity;
use Bitrix\Main\Application;

class orm_local extends CModule
{
    function __construct()
    {
        $this->MODULE_ID = 'orm.local';
        $this->MODULE_VERSION = '1.0.0';
        $this->MODULE_VERSION_DATE = '2022-07-11 00:00:00';
        $this->MODULE_NAME = 'orm.local';
        $this->MODULE_DESCRIPTION = 'orm.local';
        $this->PARTNER_NAME = 'Pena Agency';
        $this->PARTNER_URI = 'https://vpene.ru';
    }

    function DoInstall()
    {
        \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
        $this->InstallDB();
    }

    function DoUninstall()
    {
        $this->UnInstallDB();
        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    function InstallDB()
    {
        Loader::includeModule($this->MODULE_ID);

        if (!Application::getConnection(\Orm\Local\OrmTable::getConnectionName())->isTableExists(
            Entity::getInstance('\Orm\Local\OrmTable')->getDBTableName()
        )
        ) {
            Entity::getInstance('\Orm\Local\OrmTable')->createDbTable();
        }

        if (!Application::getConnection(\Orm\Local\UserTable::getConnectionName())->isTableExists(
            Entity::getInstance('\Orm\Local\UserTable')->getDBTableName()
        )
        ) {
            Entity::getInstance('\Orm\Local\UserTable')->createDbTable();
        }
    }

    function UnInstallDB()
    {
        Loader::includeModule($this->MODULE_ID);

        Application::getConnection(\Orm\Local\OrmTable::getConnectionName())->
        queryExecute('drop table if exists ' . Entity::getInstance('\Orm\Local\OrmTable')->getDBTableName());

        Application::getConnection(\Orm\Local\UserTable::getConnectionName())->
        queryExecute('drop table if exists ' . Entity::getInstance('\Orm\Local\UserTable')->getDBTableName());

    }
}