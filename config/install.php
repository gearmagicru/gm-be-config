<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации установки модуля.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    'use'         => BACKEND,
    'id'          => 'gm.be.config',
    'name'        => 'Configuration',
    'description' => 'System configuration',
    'expandable'  => true,
    'namespace'   => 'Gm\Backend\Config',
    'path'        => '/gm/gm.be.config',
    'route'       => 'config',
    'routes'      => [
        [
            'type'    => 'extensions',
            'options' => [
                'module'      => 'gm.be.config',
                'route'       => 'config[/:extension[/:controller[/:action[/:id]]]]',
                'prefix'      => BACKEND,
                'constraints' => [
                    'id' => '[A-Za-z0-9_-]+'
                ],
                'redirect' => [
                    'info:*@*' => ['info', '*', null]
                ]
            ]
        ]
    ],
    'locales'     => ['ru_RU', 'en_GB'],
    'permissions' => ['any', 'extension', 'info'],
    'events'      => [],
    'required'    => [
        ['php', 'version' => '8.2'],
        ['app', 'code' => 'GM MS'],
        ['app', 'code' => 'GM CMS'],
        ['app', 'code' => 'GM CRM']
    ]
];
