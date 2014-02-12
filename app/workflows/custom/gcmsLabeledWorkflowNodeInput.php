<?php

// todo - add persistency
class gcmsLabeledWorkflowNodeInput extends ezcWorkflowNodeInput
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

        $return = "Input";

        if (!is_null($this->label)) {
            $return .= " (" . $this->label . ")";
        }

        $return .= "\n\n" . print_r($this->getConfiguration(), true) . "";

        return $return;
    }

}

