<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'rules' => [

                //['class' => 'frontend\components\ClassUrlRule'],
                '/' => 'site/index',
                '/article' => '/site/article',
                '/privacypolicy' => '/site/privacypolicy',
                '/consultation' => '/site/consultation',
                '/contacts' => '/site/contacts',
                '/first-order' => '/site/firstorder',
                '/main-order' => '/site/mainorder',
                '/news' => '/site/news',
                '/payment' => '/site/payment',
                '/autoreg' => '/site/autoreg',
                '/quiz' => '/site/quiz',
                '/reviews' => '/site/reviews',
                '/completed' => '/site/complited',
                '/search' => '/site/search',
                '/second-order' => '/site/secondorder',
                '/third-order' => '/site/therdorder',
                '/services' => '/site/services',
                '/thanks' => '/site/thanks',
                '/sign-up' => '/site/signin',
                '/login' => '/site/login',
                '/cabinet' => '/cabinet/index',
                '/cabinet/payment' => '/cabinet/payment',
                '/cabinet/my-documents' => '/cabinet/docs',
                '/cabinet/procedure-steps' => '/cabinet/staps',
                '/cabinet/settings' => '/cabinet/settings',
                '/cabinet/help' => '/cabinet/help',
                '/cabinet/anketa' => '/cabinet/cfs2',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
    ],

    'params' => $params,
];