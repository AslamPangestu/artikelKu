<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => 'ArtikelKu',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'homeUrl' => '/tugasweb/administrator',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/tugasweb/administrator',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => [
              'name' => '_backendUser',
              'httpOnly' => true,
              'path' => '/backend/web',
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => '_backendSessionId',
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
                //'<action:(.*)>' => 'site/<action>',
                //'<alias:index|artikel|kategori|gambar|logout|login>' => 'site/<alias>',
            ],
        ],
        'urlManagerFrontend' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/tugasweb',
        ],
    ],
    'params' => $params,
];
