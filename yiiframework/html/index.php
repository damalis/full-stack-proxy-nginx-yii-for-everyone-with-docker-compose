<?php

defined('YII_DEBUG');// or define('YII_DEBUG', true);
defined('YII_ENV');// or define('YII_ENV', 'dev');

// register Composer autoloader
require 'vendor/autoload.php';

// include Yii class file
require 'vendor/yiisoft/yii2/Yii.php';

// load application configuration
$config = require 'config/web.php';

// create, configure and run application
(new yii\web\Application($config))->run();

// Create Test DB Connection
Yii::$app->set('id', [
		'class' => 'yii\db\Connection',
		'dsn' => 'database:host=localhost;dbname=${DB_NAME}',
		'username' => ${DB_USER},
		'password' => ${DB_PASSWORD,
		'charset' => 'utf8'
    ]);
	
try {
    // Check DB Connection
    if ( Yii::$app->db->open() ) {
       // Write Config
        $config['components']['db']['class'] = 'yii\db\Connection';
        $config['components']['db']['dsn'] = 'database';
        $config['components']['db']['username'] = ${DB_USER};
        $config['components']['db']['password'] = ${DB_PASSWORD;
        $config['components']['db']['charset'] = 'utf8';

        Configuration::setConfig($config);
        $success = TRUE;
        return $this->redirect(['init']);
    } else {
        $errorMsg = 'Incorrect Configurations';
    }
} catch ( Exception $e ) {
        $errorMsg = $e->getMessage();
}

// Create Test redis Connection
Yii::$app->set('redis', [
		'class' => 'yii\redis\Connection',
		'hostname' => 'redis',
		'port' => 6379,
		'database' => 0
    ]);

try {
    // Check DB Connection
    if ( Yii::$app->db->open() ) {
       // Write Config
        $config['components']['redis']['class'] = 'yii\redis\Connection';
        $config['components']['redis']['hostname'] = 'redis';
        $config['components']['redis']['port'] = 6379;
        $config['components']['redis']['database'] = 0;

        Configuration::setConfig($config);
        $success = TRUE;
        return $this->redirect(['init']);
    } else {
        $errorMsg = 'Incorrect Configurations';
    }
} catch ( Exception $e ) {
        $errorMsg = $e->getMessage();
}

// This provides the basic access to redis storage via the redis application component:

Yii::$app->redis->set('mykey', 'some value');
echo Yii::$app->redis->get('mykey');
