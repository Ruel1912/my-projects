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
    'css/jquery.formstyler.css',
    'css/jquery.formstyler.theme.css',
    'css/style.css',
    'css/media.css',
  ];
  public $js = [
    "js/jquery.formstyler.min.js",
    "js/jquery.maskedinput.js",
    "js/script.js",
  ];
  public $depends = [
    'yii\web\YiiAsset'
  ];
}
