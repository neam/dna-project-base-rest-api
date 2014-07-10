<?php

// auto-loading
Yii::setPathOfAlias('GuiSection', dirname(__FILE__));
Yii::import('GuiSection.*');

class GuiSection extends BaseGuiSection
{
    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'For developers to manage GUI strings for different parts of the cms.');
        parent::init();
    }

    public function getItemLabel()
    {
        return (string) !empty($this->title) ? $this->title : "GuiSection #" . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function rules()
    {

        $translationRules = array();
        /*
        foreach (LanguageHelper::getCodes() as $language) {
            $translationRules[] = array('title', 'length', 'min' => 3, 'on' => 'translate_into_' . $language); // dummy rule
        }
        */

        $rules = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            $translationRules,
            // The field i18n_catalog_id is not itself translated, but contains translated contents, so need to add i18n validation rules manually for the field
            $this->generateInlineValidatorI18nRules("i18n_catalog_id", "validateI18nCatalogTranslation"),
            array(
                array('title', 'length', 'min' => 3, 'max' => 200),
            )
        );
        Yii::log('model->rules(): ' . print_r($rules, true), 'trace', __METHOD__);
        return $rules;
    }

    public function validateFile($attribute)
    {
        if (is_null($this->original_media_id)) {
            $this->addError($attribute, Yii::t('app', '!validateFile'));
        }
    }

    public function validateI18nCatalogTranslation($attribute)
    {
        if (true) {
            $this->addError($attribute, Yii::t('app', 'TODO: Related translation validation'));
        }
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'title',
            ),
            'reviewable' => array(
                'slug',
            ),
            'publishable' => array(),
        );
    }

    /**
     * Define step-dependent fields
     * @return array
     */
    public function flowSteps()
    {
        return array(
            'info' => array(
                'title',
                'slug',
                'i18n_catalog_id',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'slug' => Yii::t('model', 'Nice link'),
                'i18n_catalog_id' => Yii::t('model', 'I18n Catalog'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', ''),
                'slug' => Yii::t('model', ''),
                'i18n_catalog_id' => Yii::t('model', 'The i18n catalog file with i18n content'),
            )
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

}
