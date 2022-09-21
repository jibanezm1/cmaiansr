<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "images/favicon.ico",
        "css/plugins-css.css",
        "css/typography.css",
        "css/shortcodes/shortcodes.css",
        "css/style.css",
        "css/shop.css",
        "css/responsive.css",
    ];
    public $js = [
        "js/jquery-3.6.0.min.js",
        "js/plugins-jquery.js",
        "js/custom.js"

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
