<?php

use Bitrix\Main\Loader;

class OxamplesOrm extends CBitrixComponent
{
    public function executeComponent()
    {
        if (Loader::includeModule('orm.local')) {
            $this->includeComponentTemplate();
        }
    }
}