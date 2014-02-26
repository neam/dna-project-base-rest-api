<?php

class AppActiveForm extends TbActiveForm
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
    public function customControlGroup($model, $attribute, $input, $htmlOptions = array())
    {
        return TbHtml::customActiveControlGroup($input, $model, $attribute, $htmlOptions);
    }
}
