<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'layout' => 'main.php',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'vendorPath' => dirname(__DIR__) . '/vendor',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bg-yV8e9-D8DqjFUGYSqpi4w97kecW1k',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'view' => [
            'class' => 'yii\web\View',
            'renderers' => [
                'tpl' => [
                    'class' => 'yii\smarty\ViewRenderer',
                    //'cachePath' => '@runtime/Smarty/cache',
                ],
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    // Array of twig options:
                    'options' => [
                        'auto_reload' => true,
                    ],
                    'globals' => ['html' => ['class'=>'\yii\helpers\Html'],
                        'GridView' => ['class'=>'\yii\grid\GridView'],
                        'DetailView' => ['class'=>'yii\widgets\DetailView'],
                        'Pjax' =>['class'=>'yii\widgets\Pjax'],
                        'LinkPager' => ['class'=>'yii\widgets\LinkPager'],
                        ],
                    'uses' => ['yii\bootstrap','yii\widgets\Breadcrumbs',
                        'yii\grid\ActionColumn','yii\helpers\Url',
                        'yii\bootstrap\ActiveForm',
                        'yii\grid\SericalColumn',
                        ],
                    'functions' => [
                        't' => '\Yii::t',
                        ],
                ]
            ]
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,   // Disable index.php
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
/*
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '/',
                '<controller:\w+>/<action:\w+>' => '/',
             ],
*/
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,   // do not publish the bundle
                    'js' => [
                        'yiiweb/web/js/jquery-1.11.1.min.js',  // use custom jquery
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'css' => ['@bower/bootstrap/dist/css/bootstrap.min.css']
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
