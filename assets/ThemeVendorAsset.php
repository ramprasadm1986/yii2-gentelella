<?php
/**
* @copyright Copyright (c) 2015 Yiister
* @license https://github.com/yiister/yii2-gentelella/blob/master/LICENSE
* @link http://gentelella.yiister.ru
*/

namespace ramprasadm1986\gentelella\assets;

use yii\web\AssetBundle;

class ThemeVendorAsset extends AssetBundle
{
    public $sourcePath = '@bower/gentelella/vendors';

    
	
	 public $css = [
		'malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css'
       
    ];
	
	public $js = [
        'datatables.net/js/jquery.dataTables.min.js',
		'malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'
    ];
}
