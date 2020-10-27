<?php


namespace ramprasadm1986\gentelella\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
        'ramprasadm1986\gentelella\assets\BootstrapProgressbar',
        'ramprasadm1986\gentelella\assets\ThemeBuildAsset',
        'ramprasadm1986\gentelella\assets\ThemeSrcAsset',
    ];
}
