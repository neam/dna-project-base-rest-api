<?php

// todo - add persistency
class LabeledWorkflowNodeInput extends ezcWorkflowNodeInput
{

    private $label;

    function __construct($configuration)
    {

        if (isset($configuration["label"])) {
            $this->label = $configuration["label"];
            unset($configuration["label"]);
        }

        return parent::__construct($configuration);

    }

    function __toString()
    {

        if (!is_null($this->label)) {
            return "Input (" . $this->label . ")";
        }

        return parent::__toString();
    }

}

