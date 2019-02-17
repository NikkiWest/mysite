<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
    public $css = [
        'lib/jquery-ui/jquery-ui.css',
        'https://use.fontawesome.com/releases/v5.0.13/css/all.css',
        'css/uni.css',
        'css/main.css?v'.YII_V,
    ];
    public $js = [
        'lib/jquery-ui/jquery-ui.js',
        'lib/owl-carousel/js/owl.carousel.js',
        'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js',
        'js/uni.js?v'.YII_V,

    ];
    public $depends = [
        //'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
