<?php

class AppActiveForm extends TbActiveForm
{
    // Controller action ID for 'translate'
    const CONTROLLER_ACTION_TRANSLATE = 'translate';

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

    public function select2($model, $attribute, $data = array(), $htmlOptions = array())
    {
        $htmlOptions = $this->processControlGroupOptions($model, $attribute, $htmlOptions);
        return Html::activeSelect2($model, $attribute, $data, $htmlOptions);
    }

    public function select2ControlGroup($model, $attribute, $data = array(), $htmlOptions = array())
    {
        $htmlOptions = $this->processControlGroupOptions($model, $attribute, $htmlOptions);
        return Html::activeSelect2ControlGroup($model, $attribute, $data, $htmlOptions);
    }

    /**
     * Creates a multi text field control group for a translatable attribute.
     * @param ActiveRecord|ItemTrait $model
     * @param string $attribute
     * @param string $translateInto
     * @param string $controllerAction
     * @return string
     */
    public function translateTextFieldControlGroup($model, $attribute, $translateInto, $controllerAction, $fieldOptions = array())
    {
        return $this->translateFieldControlGroup($model, $attribute, $translateInto, $controllerAction, TbHtml::INPUT_TYPE_TEXT, $fieldOptions);
    }

    /**
     * Creates a multi textarea field control group for a translatable attribute.
     * @param ActiveRecord|ItemTrait $model
     * @param string $attribute
     * @param string $translateInto
     * @param string $controllerAction
     * @param array $fieldOptions
     */
    public function translateTextAreaControlGroup($model, $attribute, $translateInto, $controllerAction, $fieldOptions = array())
    {
        return $this->translateFieldControlGroup($model, $attribute, $translateInto, $controllerAction, TbHtml::INPUT_TYPE_TEXTAREA, $fieldOptions);
    }

    /**
     * Creates an item title text field control group with support for SlugIt auto-generation.
     * @param ActiveRecord $model
     * @param string $attribute
     * @param array $htmlOptions
     * @return string
     */
    public function itemTitleTextFieldControlGroup($model, $attribute, $htmlOptions = array())
    {
        $titleClass = 'slugit-from-1';
        $slugClass = 'slugit-to-1';

        $classes = array();
        if (isset($htmlOptions['class'])) {
            $classes = explode(' ', $htmlOptions['class']);
        }
        $classes[] = $titleClass;
        $htmlOptions['class'] = implode(' ', $classes);

        Html::jsSlugIt(array(
            ".$titleClass" => ".$slugClass",
        ));

        return parent::textFieldControlGroup($model, $attribute, $htmlOptions);
    }

    /**
     * Creates an item slug text field control group with support for SlugIt auto-generation.
     * @param ActiveRecord $model
     * @param string $attribute
     * @param array $htmlOptions
     * @return string
     */
    public function itemSlugTextFieldControlGroup($model, $attribute, $htmlOptions = array())
    {
        $titleClass = 'slugit-from-1';
        $slugClass = 'slugit-to-1';

        $classes = array();
        if (isset($htmlOptions['class'])) {
            $classes = explode(' ', $htmlOptions['class']);
        }
        $classes[] = $slugClass;
        $htmlOptions['class'] = implode(' ', $classes);

        Html::jsSlugIt(array(
            ".$titleClass" => ".$slugClass",
        ));

        return parent::textFieldControlGroup($model, $attribute, $htmlOptions);
    }

    /**
     * Builds a multi input field configuration for a translatable attribute.
     * @param ActiveRecord|ItemTrait $model
     * @param string $attribute
     * @param string $translateInto
     * @param string $controllerAction
     * @param string $inputType
     * @param array $fieldOptions
     * @return string
     */
    public function translateFieldControlGroup($model, $attribute, $translateInto, $controllerAction, $inputType, $fieldOptions = array())
    {
        $attributeSourceLanguage = $attribute . '_' . $model->source_language;
        $attributeTranslateInto = $attribute . '_' . $translateInto;

        // TODO: Add support for dynamic htmlOptions.
        $htmlOptions = array();

        // Valid base attributes for SlugIt IDs from which slugs are created
        $slugitFromAttributes = array(
            'title',
            'question',
        );

        if ($controllerAction === self::CONTROLLER_ACTION_TRANSLATE) {
            // Auto-generate slug from title
            if (in_array($attribute, $slugitFromAttributes) && !isset($fieldOptions['disableSlug'])) {
                $htmlOptions['class'] = Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-2';
            } else if ($attribute === 'slug') {
                $htmlOptions['class'] = Html::ITEM_FORM_FIELD_CLASS . ' slugit-to-2';
            }

            // Get hint
            if (isset($fieldOptions['hint']) && $fieldOptions['hint']) {
                $htmlOptions['label'] = Html::attributeLabelWithTooltip($model, $attributeTranslateInto, 'title');
            }

            // Bind slug field
            Html::jsSlugIt(array(
                '.slugit-from-2' => '.slugit-to-2',
            ));

            $html = Html::activeStaticTextFieldControlGroup($model, $attributeSourceLanguage);
            $html .= $this->createControlGroup($inputType, $model, $attributeTranslateInto, $htmlOptions);

            return $html;
        } else {
            // Auto-generate slug from title
            if (in_array($attribute, $slugitFromAttributes) && !isset($fieldOptions['disableSlug'])) {
                $htmlOptions['class'] = Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-1';
            } else if ($attribute === 'slug') {
                $htmlOptions['class'] = Html::ITEM_FORM_FIELD_CLASS . ' slugit-to-1';
            }

            // Get hint
            if (isset($fieldOptions['hint']) && $fieldOptions['hint']) {
                $htmlOptions['label'] = Html::attributeLabelWithTooltip($model, $attributeSourceLanguage, 'title');
            }

            // Bind slug field
            Html::jsSlugIt(array(
                '.slugit-from-1' => '.slugit-to-1',
            ));

            return $this->createControlGroup($inputType, $model, $attributeSourceLanguage, $htmlOptions);
        }
    }
}
