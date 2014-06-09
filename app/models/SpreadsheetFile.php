<?php

// auto-loading
Yii::setPathOfAlias('SpreadsheetFile', dirname(__FILE__));
Yii::import('SpreadsheetFile.*');

class SpreadsheetFile extends BaseSpreadsheetFile
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
        return parent::init();
    }

    public function getItemLabel()
    {
        return (string) !empty($this->title) ? $this->title : "SpreadsheetFile #" . $this->id;
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
                array('title_' . $this->source_language, 'length', 'min' => 3, 'max' => 120),

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function processOriginal()
    {
        if (is_null($this->original_media_id)) {
            throw new CException("No original media available to process");
        }

        Yii::import('phpexcel.PHPExcel');

        $PHPExcel = new PHPExcel();

        // TODO save file as processed media for various languages

        require_once("http://localhost:8080/GapcmsJavaBridge/java/Java.inc");

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', true);
        ini_set('display_startup_errors', true);

        define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

        date_default_timezone_set('Europe/London');

        /** PHPExcel_IOFactory */
        require_once Yii::getPathOfAlias('phpexcel') . '/PHPExcel/IOFactory.php';

        echo date('H:i:s'), " Load from Excel5 template", EOL;
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load($this->originalMedia->fileName);

        echo date('H:i:s'), " Add new data to the template", EOL;
        $data = array(array('title' => 'Excel for dummies',
            'price' => 17.99,
            'quantity' => 2
        ),
            array('title' => 'PHP for dummies',
                'price' => 15.99,
                'quantity' => 1
            ),
            array('title' => 'Inside OOP',
                'price' => 12.95,
                'quantity' => 1
            )
        );

        $objPHPExcel->getActiveSheet()->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel(time()));

        $baseRow = 5;
        foreach ($data as $r => $dataRow) {
            $row = $baseRow + $r;
            $objPHPExcel->getActiveSheet()->insertNewRowBefore($row, 1);

            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $r + 1)
                ->setCellValue('B' . $row, $dataRow['title'])
                ->setCellValue('C' . $row, $dataRow['price'])
                ->setCellValue('D' . $row, $dataRow['quantity'])
                ->setCellValue('E' . $row, '=C' . $row . '*D' . $row);
        }
        $objPHPExcel->getActiveSheet()->removeRow($baseRow - 1, 1);


        echo date('H:i:s'), " Write to Excel5 format", EOL;
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save(str_replace('.php', '.xls', __FILE__));
        echo date('H:i:s'), " File written to ", str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)), EOL;


        // Echo memory peak usage
        echo date('H:i:s'), " Peak memory usage: ", (memory_get_peak_usage(true) / 1024 / 1024), " MB", EOL;

        // Echo done
        echo date('H:i:s'), " Done writing file", EOL;
        echo 'File has been created in ', getcwd(), EOL;


        die("die");

        //var_dump($document);

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
                'title_' . $this->source_language,
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
            ),
            'file' => array(
                'original_media_id',
                'processed_media_id_' . $this->source_language,
            ),
            'data' => array(
                'dataarticles', // TODO: Fix this.
            ),
            'related' => array(
                'related', // TODO: Fix this.
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
