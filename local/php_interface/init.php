<?php

use Bitrix\Main\EventManager;

/**
 * Три события:
 * OnBefore<Action>
 * On<Action>
 * OnAfter<Action>
 *
 * Action:
 * Add
 * Update
 * Delete
 */

$eventManager = EventManager::getInstance();

$eventManager->addEventHandler(
    'orm.local',
    '\Orm\Local\User::OnBeforeAdd',
    ['DemoClass', 'add']
);

class DemoClass
{
    public static function add($event)
    {
        $fields = $event->getParameter('fields');
        //echo '<h3>Добавили ' . $fields['NAME'] . '</h3>';
    }
}