<?php

// auto-loading
Yii::setPathOfAlias('TextDoc', dirname(__FILE__));
Yii::import('TextDoc.*');

class TextDoc extends BaseTextDoc
{

    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'Textdocs may be selfcontained exercises or arbitrary text that is related to something else.');
        return parent::init();
    }

    public function getItemLabel()
    {
        return (string) isset($this->_title) ? $this->_title : 'Text Doc #' . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array());
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
                array('about_' . $this->source_language, 'length', 'min' => 3, 'max' => 250),
                
            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
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
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'file' => Yii::t('app', 'File'),
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
                'original_media_id' => Yii::t('model', 'File (original)'),
                'processed_media_id' => Yii::t('model', 'File (processed)'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'A bundle of slides, with a name.'),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines'),
                'about' => Yii::t('model', 'Describe the content. For example: "The descriptions of families to use in the role-play."'),
                'original_media_id' => Yii::t('model', 'The file contains the latest numbers.'),
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
