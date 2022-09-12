<?php

<<<<<<< HEAD
use Codeception\Step\Action;

=======
>>>>>>> ce57403775cd5ef909d652d1104501a977a40f90
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
<<<<<<< HEAD
    'id' => 'to-do',
=======
    'id' => 'basic',
>>>>>>> ce57403775cd5ef909d652d1104501a977a40f90
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'A2ncWmIVxK-BYvNyJbAY3oUnSJMJqsNr',
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
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
        'db' => $db,
<<<<<<< HEAD

=======
        /*
>>>>>>> ce57403775cd5ef909d652d1104501a977a40f90
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
<<<<<<< HEAD
                '/home' => 'site/index',
                '/about' => 'site/about',
                '/login' => 'site/login',
                '/todo' => 'site/todo',
                '<action>' => '/site/<action>'
            ],
        ],

=======
            ],
        ],
        */
>>>>>>> ce57403775cd5ef909d652d1104501a977a40f90
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
