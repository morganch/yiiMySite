<?php
use codemix\yii2confload\Config;

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');

//require(__DIR__ . '/../vendor/autoload.php');
//require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require('/var/www/vendor/autoload.php');

require('/var/www/vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');
//$config = Config::bootstrap('/var/www/html');
//Yii::createObject('yii\web\Application', [$config->web()])->run();
(new yii\web\Application($config))->run();
