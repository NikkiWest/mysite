<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/uni.css',
        'css/site.css',
    ];
    public $js = [
        'js/uni.js',
        '/lib/jquery.form.min.js',
        '/lib/jquery-ui/jquery-ui.js',
        '/lib/jquery-ui/jquery.ui.datepicker-ru.js',
        '/lib/jquery.form.min.js',
        '/lib/jquery.tmpl.min.js',
        'js/code-edit.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
