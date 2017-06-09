<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'ArtikelKu',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => '/tugasweb',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '/tugasweb',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'loginUrl' => ['administrator/user/login'],
            'enableAutoLogin' => false,
            'identityCookie' => [
              'name' => '_frontendUser',
              'httpOnly' => true,
              'path' => '/frontend/web',
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => '_frontendSessionId',
            'savePath' => __DIR__.'/../runtime',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '<alias:index|about|contact|login|logout|signup>' => 'site/<alias>',
            ],
        ],
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '/tugasweb/administrator',
        ],
    ],
    'params' => $params,
];
