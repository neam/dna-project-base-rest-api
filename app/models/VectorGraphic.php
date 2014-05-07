<?php

// auto-loading
Yii::setPathOfAlias('VectorGraphic', dirname(__FILE__));
Yii::import('VectorGraphic.*');

class VectorGraphic extends BaseVectorGraphic
{

    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'The only reason to upload static viz, are those originateing from illustrator files or similar. Most downloadable pdf-files originated from a Textdoc or Slideshow, but some need to be created from SVG-files by hand, like the static bubble charts with labels for all countries.');
        return parent::init();
    }

    public function getItemLabel()
    {
        return (string) isset($this->_title) ? $this->title : 'Vector Graphic #' . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(),
            array(
                'dataarticles' => array(self::HAS_MANY, 'DataArticle', array('id' => 'node_id'), 'through' => 'outNodes', 'condition' => 'relation=:relation', 'params' => array(':relation' => 'dataarticles')),
            )
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
                array('title_' . $this->source_language, 'length', 'min' => 3, 'max' => 120),
                array('dataarticles', 'validateDataArticles'),
                array('about_' . $this->source_language, 'length', 'min' => 3, 'max' => 250),

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateDataArticles()
    {
        return count($this->dataarticles) <= 100;
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'slug_' . $this->source_language,
            ),
            'reviewable' => array(
                'title_' . $this->source_language,
                'original_media_id',
                'processed_media_id_' . $this->source_language,
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
            'file' => array(
                'original_media_id',
                'processed_media_id_' . $this->source_language,
            ),
            'data' => array(
                'dataarticles',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'file' => Yii::t('app', 'File'),
            'data' => Yii::t('app', 'Data'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'title_en' => Yii::t('model', 'English Title'),
                'slug' => Yii::t('model', 'Nice link'),
                'slug_en' => Yii::t('model', 'English Nice link'),
                'about' => Yii::t('model', 'About'),
                'about_en' => Yii::t('model', 'About (English)'),
                'original_media_id' => Yii::t('model', 'File (svg)'),
                'dataarticles' => Yii::t('model', 'Data'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'A name of the vizualization, such as "World Wealth & Health Chart".'),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines'),
                'about' => Yii::t('model', 'Describe the content. For example: "High-res poster of all UN-states comparing the health and wealth of all UN-States for the most reasent year."'),
                'original_media_id' => Yii::t('model', 'A Vector Graphic File.'),
                'dataarticles' => Yii::t('model', 'The list of dataarticles will be used to generate the datasource slide that appears automatically on the last slide in the slideShow. Dataarticles will be listed in order of appearance, each with a title, about, metadata and links to original sources.'),
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

    /**
     * Returns vector graphics.
     * @return P3Media[]
     */
    public function getVectorGraphics()
    {
        return $this->getP3Media(array(
            'image/svg+xml',
        ));
    }

    /**
     * TODO: Remove this temporary method override once support for the 'image/svg+xml' MIME type has been implemented.
     */
    public function getP3Media($mimeType, $type = 'file', $getOwnedOnly = false)
    {
        $mimeType = array('text/plain');
        $fileExtension = '.svg';

        $criteria = new CDbCriteria();
        if (!is_array($mimeType)) {
            $mimeType = array($mimeType);
        }
        $criteria->addInCondition('mime_type', $mimeType);
        $criteria->addCondition('t.type = :type');
        $criteria->addCondition("t.original_name REGEXP '$fileExtension$'");
        $criteria->limit = 100;
        $criteria->order = 't.created_at DESC';
        $criteria->params[':type'] = $type;
        return P3Media::model()->findAll($criteria);
    }

    /**
     * Returns vector graphic options.
     * @return array
     */
    public function getVectorGraphicOptions()
    {
        return $this->getOptions($this->getVectorGraphics());
    }
}
