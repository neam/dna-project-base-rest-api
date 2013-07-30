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
        return array_merge(
            parent::rules()
        /* , array(
          array('column1, column2', 'rule1'),
          array('column3', 'rule2'),
          ) */
        );
    }

    public function processOriginal()
    {
        if (is_null($this->original_media_id)) {
            throw new CException("No original media available to process");
        }

        // TODO save file as processed media for various languages

        require_once("http://localhost:8080/GapcmsJavaBridge/java/Java.inc");

        $sourceDataPptFileName = Yii::getPathOfAlias("application")."/includes/source_data.ppt";

        try {

            $sourceDataPpt = new java("org.apache.poi.hslf.usermodel.SlideShow", new java("org.apache.poi.hslf.HSLFSlideShow", $sourceDataPptFileName));

            $ppt = new java("org.apache.poi.hslf.usermodel.SlideShow", new java("org.apache.poi.hslf.HSLFSlideShow", $this->originalMedia->fileName));

            $newSlide = $ppt->createSlide();

            foreach ($sourceDataPpt->getSlides()[0]->getShapes() as $shape) {
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

}
