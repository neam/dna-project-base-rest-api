<?php

// auto-loading
Yii::setPathOfAlias('Page', dirname(__FILE__));
Yii::import('Page.*');

class Page extends BasePage
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
        return isset($this->_title) ? $this->_title : 'Page #' . $this->id;
    }

    public function relations()
    {
        $relations = parent::relations();

        // Sort sections by edge weight
        $relations['sections'] = array(
            self::HAS_MANY,
            'Section',
            array('id' => 'node_id'),
            'condition' => 'relation = :relation',
            'through' => 'outNodes',
            'order' => 'outEdges.weight ASC',
            'params' => array(
                ':relation' => 'sections',
            )
        );

        return $relations;
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
            array(
                // Ordinary validation rules
                array('title_' . $this->source_language, 'length', 'min' => 3, 'max' => 200),
            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
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

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'title_' . $this->source_language,
            ),
            'reviewable' => array(
                'slug_' . $this->source_language,
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
                'title_' . $this->source_language,
                'slug_' . $this->source_language,
                'about_' . $this->source_language,
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
        );
    }

}
