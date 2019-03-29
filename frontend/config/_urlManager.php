<?php
return [
    'class'=>'yii\web\UrlManager',
    'enablePrettyUrl'=>true,
    'showScriptName'=>false,
    'rules'=>[
        '/portfolio/view/<slug>' => 'portfolio/view',
        '/service' => 'service/default/index',
        '/news/view/<slug>' => 'news/view'
    ]
];
