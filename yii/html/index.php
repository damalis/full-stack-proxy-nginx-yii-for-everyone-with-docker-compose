<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require 'basic/vendor/autoload.php';
require 'basic/vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/web.php';

(new yii\web\Application($config))->run();
