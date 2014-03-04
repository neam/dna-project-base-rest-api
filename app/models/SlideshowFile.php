<?php

// auto-loading
Yii::setPathOfAlias('SlideshowFile', dirname(__FILE__));
Yii::import('SlideshowFile.*');

class SlideshowFile extends BaseSlideshowFile
{

    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'All slideshows ar of this Blueprint, while some just support a specific vide, while others may be selfcontained exercises.');
        return parent::init();
    }

    public function getItemLabel()
    {
        return 'Slideshow File #' . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array());
    }

    public function relations()
    {
        return array_merge(
            parent::relations(),
            array(
                'dataarticles' => array(self::HAS_MANY, 'DataArticle', array('id' => 'node_id'), 'through' => 'outNodes', 'condition' => 'relation=:relation', 'params' => array(':relation' => 'dataarticles')),
                'related' => array(self::HAS_MANY, 'Node', array('id' => 'id'), 'through' => 'outNodes', 'condition' => 'relation=:relation', 'params' => array(':relation' => 'related')),
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


    public function processOriginal()
    {
        if (is_null($this->original_media_id)) {
            throw new CException("No original media available to process");
        }

        // TODO save file as processed media for various languages

        require_once("http://localhost:8080/GapcmsJavaBridge/java/Java.inc");

        $sourceDataPptFileName = Yii::getPathOfAlias("application") . "/includes/source_data.ppt";

        try {

            $sourceDataPpt = new java("org.apache.poi.hslf.usermodel.SlideShow", new java("org.apache.poi.hslf.HSLFSlideShow", $sourceDataPptFileName));

            $ppt = new java("org.apache.poi.hslf.usermodel.SlideShow", new java("org.apache.poi.hslf.HSLFSlideShow", $this->originalMedia->fileName));

            $newSlide = $ppt->createSlide();

            $translate = array(
                '${t:DATA DOCUMENTATION}' => 'DATA DOCUMENTATION',
                '${t:Updates and translations to this file may be available here:}' => 'Updates and translations to this file may be available here:',
                '${chapter_url}' => 'http://www.gapminder.org/foo',
                '${datasource1_title}' => 'Data Slide 1',
                '${datasource1_description}' => 'UN Population Division, World Population Prospect 2012 mid-estimate and mid-projection.',
                '${datasource1_url}' => 'http://un.org/esa/population',
                '${datasource2_title}' => 'Data before 1950',
                '${datasource2_description}' => 'Compiled by Gapminder from historical records from various sources. Detailed documentation in English here:',
                '${datasource2_url}' => 'www.gapminder.org/data/documentation/gd003/',
            );

            foreach ($sourceDataPpt->getSlides()[0]->getShapes() as $k => $shape) {

                foreach ($shape->getTextRun()->getRichTextRuns() as $i => $rt) {

                    $text = $rt->getText();

                    //var_dump($k, $i, java_values($rt->getText())); //, java_values($shape->getText())

                    foreach ($translate as $search => $replace) {

                        if (strpos($text, $search) !== false) {
                            $text = str_replace($search, $replace, $text);
                            $rt->setText(new java("java.lang.String", $text));
                        }

                    }

                }

                $newSlide->addShape($shape);
            }

            //var_dump(java_values($ppt));

            // Output to browser for now
            header("Content-type: application/vnd.ms-powerpoint");
            header("Content-Disposition: attachment; filename=presentation.ppt");
            $memoryStream = new java("java.io.ByteArrayOutputStream");
            $ppt->write($memoryStream);
            $memoryStream->close();
            echo java_values($memoryStream->toByteArray());

        } catch (Exception $e) {
            var_dump($e);
        }

    }

    public function afterSave()
    {

        if (!empty($this->generate_processed_media)) {
            $this->processOriginal();
            $this->setIsNewRecord(false);
            if (!$this->saveAttributes(array("generate_processed_media" => 0))) {
                throw new SaveException($this);
            }
        }

        return parent::afterSave();
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
            'preview' => array(
                'title_' . $this->source_language,
                'original_media_id',
                'processed_media_id_' . $this->source_language,
            ),
            'public' => array(),
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
            'related' => array(
                'related',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'file' => Yii::t('app', 'File'),
            'data' => Yii::t('app', 'Data'),
            'related' => Yii::t('app', 'Related'),
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
                'original_media_id' => Yii::t('model', 'File'),
                'dataarticles' => Yii::t('model', 'Data'),
                'related' => Yii::t('model', 'Related'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'A bundle of slides, with a name.'),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines'),
                'about' => Yii::t('model', 'Describe the content. For example: "These are the print outs for the exercise Draw the World Population Trend."'),
                'original_media_id' => Yii::t('model', 'The file contains the latest numbers.'),
                'dataarticles' => Yii::t('model', 'The list of dataarticles will be used to generate the datasource page that comes with the VIzualization when downloading it. Dataarticles will be listed in order of appearance, each with a title, about, metadata and links to original sources.'),
                'related' => Yii::t('model', 'Users of this slideshow may also be interested in these things.'),
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
