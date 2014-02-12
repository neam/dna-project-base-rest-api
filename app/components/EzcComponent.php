<?php

class EzcComponent extends CApplicationComponent
{
    public $ezcAlias = 'vendor.zetacomponents';
    public $tablePrefix = '';
    private $_db = null;
    private $_definition = null;

    public function & getDb()
    {
        if (is_null($this->_db)) {
            $this->_db = ezcDbFactory::create('mysql://' . YII_DB_USER . ':' . YII_DB_PASSWORD . '@' . YII_DB_HOST . '/' . YII_DB_NAME);
        }
        return $this->_db;
    }

    public function getWorkflowDatabaseDefinitionStorage()
    {

        if (!$this->_definition) {

            $db =& $this->db;

            $this->_definition = new ezcWorkflowDatabaseDefinitionStorage($db);

            $options = new ezcWorkflowDatabaseOptions();
            $options['prefix'] = $this->tablePrefix;

            $this->_definition->options = $options;

        }

        return $this->_definition;


    }

    public function getWorkflowDatabaseExecution($executionId = null)
    {

        $db =& $this->db;

        $options = new ezcWorkflowDatabaseOptions();
        $options['prefix'] = $this->tablePrefix;

        $execution = new ezcWorkflowDatabaseExecution($db, $executionId, $options);

        return $execution;

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