<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/bootstrap.min.css',
        'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'css/site.css',
        'css/owl.carousel.css',
        'css/owl.theme.default.min.css',
        'css/offcanvas.min.css',
        'css/style.css',
    ];
    public $js = [
//        'js/jquery.min.js',
//        'js/bootstrap.min.js',
        'js/owl.carousel.js',
        'js/script.js',
        'js/offcanvas.min.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_READY
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
