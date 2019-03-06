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
    'modules' => [
        'service' => [
            'class' => 'frontend\modules\service\Module',
        ],
    ],
    'components' => [

        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl'=>'',
        ],
        'user' => [
            'identityClass' => 'frontend\models\User',
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
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
//                    'js'=>[]
                    'js'=>['/lib/jquery.js']
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
//                    'js'=>[]
                    'js'=>[
                        '/lib/popper.js',
                        '/lib/bootstrap-4.1.1/dist/js/bootstrap.min.js',
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
//                    'css' => [],
                    'css' => [
                        '/lib/bootstrap-4.1.1/dist/css/bootstrap.min.css',
                    ],
                ],
                'yii\widgets\PjaxAsset' => [
                    'js'=>['/lib/jquery.pjax.js']
                ],
            ],
        ],
        'urlManager' => require(__DIR__.'/_urlManager.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
