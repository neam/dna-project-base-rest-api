<?php

// auto-loading
Yii::setPathOfAlias('TextDoc', dirname(__FILE__));
Yii::import('TextDoc.*');

class TextDoc extends BaseTextDoc
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
            parent::behaviors(),
            array()
        );
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

    protected function hyperlink($url)
    {
        return $url;
    }

    public function processOriginal()
    {
        if (is_null($this->original_media_id)) {
            throw new CException("No original media available to process");
        }

        Yii::import('phpword.PHPWord');

        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate($this->originalMedia->fileName);

        // TODO save file as processed media for various languages

        // Translate concept
        $category = 'word_tmp';
        $document->setValue('t:POPULATION OF REGIONS', Yii::t($category, 'POPULATION OF REGIONS'));
        $document->setValue('t:How many people live in America today?', Yii::t($category, 'How many people live in America today?'));
        $document->setValue('t:Data documentation', Yii::t($category, 'Data documentation'));
        $document->setValue('t:Updates and translations to this file may be available here:', Yii::t($category, 'Updates and translations to this file may be available here:'));
        $document->setValue('t:To see what countries are in each of the four regions see the file:', Yii::t($category, 'To see what countries are in each of the four regions see the file:'));
        $document->setValue('chapter_url', $this->hyperlink('www.gapminder.org/popreg/data'));

        // Source info concept
        $document->setValue('datasource1_title', 'Data for 1950-2000');
        $document->setValue('datasource1_description', 'UN Population Division, World Population Prospect 2012 mid-estimate and mid-projection.');
        $document->setValue('datasource1_url', $this->hyperlink('un.org/esa/population'));
        $document->setValue('datasource2_title', 'Data before 1950');
        $document->setValue('datasource2_description', 'Compiled by Gapminder from historical records from various sources. Detailed documentation in English here:');
        $document->setValue('datasource2_url', $this->hyperlink('www.gapminder.org/data/documentation/gd003/'));

        // Misc tests
        $document->setValue('dollarsign$test', 'foo1');
        $document->setValue('anotherdollarsign$test', 'foo2');
        $document->setValue('escapeddollarsign\$test', 'foo3');
        $document->setValue('textboxtest', 'foo4');

        $document->save(str_replace('.php', '.docx', __FILE__));

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

}
