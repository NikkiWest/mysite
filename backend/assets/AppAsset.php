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
        '/lib/tinymce/tinymce.min.js',
        '/lib/tinymce/langs/ru.js',
        '/lib/tinymce/themes/modern/theme.min.js',
        '/lib/jquery.form.min.js',
        '/lib/jquery-ui/jquery-ui.js',
        '/lib/jquery-ui/jquery.ui.datepicker-ru.js',
        '/lib/jquery.form.min.js',
        '/lib/jquery.tmpl.min.js',
        'js/uni.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
