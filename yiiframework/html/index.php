<?php

define('YII_DEBUG', true);
define('YII_ENV', 'dev');

// register Composer autoloader
require 'basic/vendor/autoload.php';

// include Yii class file
require 'basic/vendor/yiisoft/yii2/Yii.php';

// load application configuration
//$config = require 'basic/config/web.php';
	
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'extensions' => require __DIR__ . 'basic/vendor/yiisoft/extensions.php',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'database:host=localhost',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
		'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'redis',
            'port' => 6379,
            'database' => 0,
        ],
    ],
];

// create, configure and run application
(new yii\web\Application($config))->run();
