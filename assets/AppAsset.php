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
        //     // '//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css',
        //     // '/resources/demos/style.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css',
        //     'css/site.css',
        // ];
        // public $js = [
        //     'https://code.jquery.com/jquery-3.6.0.js',
        //     '//code.jquery.com/ui/1.13.2/jquery-ui.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
