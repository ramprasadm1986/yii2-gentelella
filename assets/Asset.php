<?php

namespace ramprasadm1986\gentelella\assets;

class Asset extends \yii\web\AssetBundle
{
    public $depends = [
        'ramprasadm1986\gentelella\assets\ThemeAsset',
        'ramprasadm1986\gentelella\assets\ExtensionAsset',
    ];
}
