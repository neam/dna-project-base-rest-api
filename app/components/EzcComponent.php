<?php

class EzcComponent extends CApplicationComponent
{
    public $ezcAlias = 'vendor.ezc.ezcomponents';
    private $_db = null;

    public function init()
    {
        // Load ez components auto-loader
        require_once Yii::getPathOfAlias($this->ezcAlias) . '/Base/src/base.php';
        Yii::registerAutoloader(array('ezcBase', 'autoload'), true);
    }

    public function & getDb()
    {
        if (is_null($this->_db)) {
            $this->_db = ezcDbFactory::create('mysql://' . YII_DB_USER . ':' . YII_DB_PASSWORD . '@' . YII_DB_HOST . '/' . YII_DB_NAME);
        }
        return $this->_db;
    }

    public function graphvizSyntax($workflow)
    {

        $visitor = new ezcWorkflowVisitorVisualization;
        $workflow->accept($visitor);
        $graphVizSyntax = (string) $visitor;

        return $graphVizSyntax;

    }

    public function buildWorkflow($name, $inMemory = false)
    {

        $class = $name;

        if (!class_exists($class)) {
            throw new CException("Class $class does not exist");
        }

        $builder = new $class();
        $workflow = $builder->buildWorkflow($name, $inMemory);

        return $workflow;

    }

}