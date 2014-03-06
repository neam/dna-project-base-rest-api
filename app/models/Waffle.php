<?php

// auto-loading
Yii::setPathOfAlias('Waffle', dirname(__FILE__));
Yii::import('Waffle.*');

class Waffle extends BaseWaffle
{
    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', '');
        parent::init();
    }

    public function getItemLabel()
    {
        return (string) !empty($this->title) ? $this->title : "Waffle #" . $this->id;
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

        // Add i18n validation rules manually for the related item translations
        $attribute = "po_contents";
        $manualI18nRules = array();
        foreach (Yii::app()->params["languages"] as $language => $label) {
            $manualI18nRules[] = array($attribute, 'validateWaffleTranslation', 'on' => 'translate_into_' . $language);

            foreach ($this->flowSteps() as $step => $fields) {
                $manualI18nRules[] = array($attribute, 'validateWaffleTranslation', 'on' => "into_$language-step_$step");
            }
        }

        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            $manualI18nRules,
            array(

                array('title', 'length', 'min' => 3, 'max' => 200),
                array('about', 'length', 'min' => 3, 'max' => 400),
                array('json_import_media_id', 'validateFile', 'on' => 'publishable'),

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateFile($attribute)
    {
        if (is_null($this->json_import_media_id)) {
            $this->addError($attribute, Yii::t('app', '!validateFile'));
        }
    }

    public function validateWaffleTranslation($attribute)
    {
        if (true) {
            $this->addError($attribute, Yii::t('app', 'TODO: Waffle translation validation'));
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
            ),
            'import' => array(
                'json_import_media_id',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'import' => Yii::t('app', 'Import'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'slug' => Yii::t('model', 'Nice link'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', ''),
                'slug' => Yii::t('model', ''),
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
