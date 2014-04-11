<?php

// auto-loading
Yii::setPathOfAlias('DownloadLink', dirname(__FILE__));
Yii::import('DownloadLink.*');

class DownloadLink extends BaseDownloadLink
{

    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return isset($this->title) ? $this->title : 'DownloadLink #' . $this->id;
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
        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            array( // Ordinary validation rules

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'file_media_id',
            ),
            'reviewable' => array(),
            'publishable' => array(
                'title_' . $this->source_language,
            ),
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
                'title_' . $this->source_language,
                'file_media_id',
            ),
        );
    }

    /**
     * Defines the flow step captions.
     * @return array
     */
    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
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
