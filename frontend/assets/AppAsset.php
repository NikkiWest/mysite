<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => true
    ];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/lib/jquery-ui/jquery-ui.css',
        'https://use.fontawesome.com/releases/v5.0.13/css/all.css',
        '/lib/owl-carousel/css/owl.carousel.css',
        '/lib/owl-carousel/css/owl.theme.default.css',
        'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.css',
        'css/uni.css',
        'css/main.css?v'.YII_V,
    ];
    public $js = [
        '/lib/jquery-ui/jquery-ui.js',
        '/lib/owl-carousel/js/owl.carousel.js',
        'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js',
        '/js/uni.js?v'.YII_V,
        'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js',
        '/js/main.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
