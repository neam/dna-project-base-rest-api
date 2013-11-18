<?php

// auto-loading
Yii::setPathOfAlias('SlideshowFile', dirname(__FILE__));
Yii::import('SlideshowFile.*');

class SlideshowFile extends BaseSlideshowFile
{

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
        return parent::getItemLabel();
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array());
    }

    public function rules()
    {
        $return = array_merge(
            parent::rules(), array(

                // Define status-dependent fields
                array('slug_' . $this->source_language . '', 'required', 'on' => 'draft,preview,public'),
                array('title_' . $this->source_language . ', original_media_id, processed_media_id_' . $this->source_language . '', 'required', 'on' => 'preview,public'),

                // Define step-dependent fields - Part 1 - what fields are saved at each step? (Other fields are ignored upon submit)
                array('slug_' . $this->source_language . '', 'safe', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('title_' . $this->source_language . '', 'safe', 'on' => 'preview-step_info,public-step_info,step_info'),
                array('about_' . $this->source_language . '', 'safe', 'on' => 'step_info'),
                array('original_media_id', 'safe', 'on' => 'preview-step_file,public-step_file,step_file'),
                array('dataChunks', 'safe', 'on' => 'preview-step_data,public-step_data,step_data'),

                // Define step-dependent fields - Part 2 - what fields are required at each step?
                array('slug_' . $this->source_language . '', 'required', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('title_' . $this->source_language . '', 'required', 'on' => 'preview-step_info,public-step_info,step_info'),
                array('about_' . $this->source_language . '', 'required', 'on' => 'step_info'),
                array('original_media_id, processed_media_id_' . $this->source_language . '', 'required', 'on' => 'preview-step_file,public-step_file,step_file'),
                array('dataChunks', 'required', 'on' => 'step_data'),

                // Ordinary validation rules
                array('title_' . $this->source_language, 'length', 'min' => 3, 'max' => 120),
                array('dataChunks', 'validateDataChunks'),
                array('about_' . $this->source_language, 'length', 'min' => 3, 'max' => 250),
            ),
            array() //$this->i18nRules()
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateDataChunks()
    {
        return count($this->dataChunks) <= 100;
    }


    public function flowSteps()
    {
        return array(
            'draft' => array(
                'info' => array(
                    'icon' => 'edit',
                ),
            ),
            'preview' => array(
                'file' => array(
                    'icon' => 'edit',
                ),
            ),
            'public' => array(),
            'all' => array(
                'data' => array(
                    'icon' => 'edit',
                ),
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

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

}
