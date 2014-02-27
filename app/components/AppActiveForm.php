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

    public function createControlGroup($type, $model, $attribute, $htmlOptions = array(), $data = array())
    {
        if ($model->asa('i18n-attribute-messages') !== null) {
            $model = $model->edited();
        }
        return parent::createControlGroup(
            $type,
            $model,
            $attribute,
            $htmlOptions,
            $data
        );
    }
}
