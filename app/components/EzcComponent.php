<?php

class EzcComponent extends CApplicationComponent
{
    public $ezcAlias = 'vendor.ezc.ezcomponents';

    public function init()
    {
        // Load ez components auto-loader
        require_once Yii::getPathOfAlias($this->ezcAlias) . '/Base/src/base.php';
        Yii::registerAutoloader(array('ezcBase', 'autoload'), true);
    }

}