<?php

class GMActiveForm extends TbActiveForm
{
    /**
     * Renders a pre-rendered custom field input row.
     *
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param string $input the rendered input.
     * @param array $htmlOptions the HTML options.
     *
     * @return string the generated row
     */
    public function customRow($model, $attribute, $input, $htmlOptions = array())
    {
        $htmlOptions['input'] = $input;
        return $this->inputRow(TbInput::TYPE_CUSTOM, $model, $attribute, null, $htmlOptions);
    }
}
