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
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',

        // CDN A FONTAWESOME ICONS
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css',

        // Animate css
        'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',

        // CDN BOOTSTRAP 4
        'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css',

        // FUENTE - PARRAFOS
        'https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap',


        // FUENTE MARKET PERMANENT - GOOGLE FONTS (TITULOS)
        'https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap',

        // ROBOTO FLEX
        'https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap'

       

    ];
    public $js = [
        // LIGHT BOX
        'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];

}
