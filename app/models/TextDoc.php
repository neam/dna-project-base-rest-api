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

                // Define step-dependent fields - Part 2 - what fields are required at each step?
                array('slug_' . $this->source_language . '', 'required', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('title_' . $this->source_language . '', 'required', 'on' => 'preview-step_info,public-step_info,step_info'),
                array('about_' . $this->source_language . '', 'required', 'on' => 'step_info'),
                array('original_media_id, processed_media_id_' . $this->source_language . '', 'required', 'on' => 'preview-step_file,public-step_file,step_file'),

                // Ordinary validation rules
                array('title_' . $this->source_language, 'length', 'min' => 3, 'max' => 120),
                array('about_' . $this->source_language, 'length', 'min' => 3, 'max' => 250),
            ),
            $this->i18nRules()
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function i18nRules()
    {
        $i18nRules = array();
        foreach (Yii::app()->params["languages"] as $lang => $label) {
            $i18nRules[] = array('title_' . $lang . ', slug_' . $lang . ', about_' . $lang, 'safe', 'on' => 'into_' . $lang . '-step_info');
            $i18nRules[] = array('title_' . $this->source_language . ', slug_' . $this->source_language . ', about_' . $this->source_language, 'safe', 'on' => 'into_' . $lang . '-step_info');
        }
        return $i18nRules;
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
            'all' => array(),
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
                'thumbnail_media_id' => Yii::t('model', 'Thumbnail'),
                'original_media_id' => Yii::t('model', 'Film file'),
                'subtitles' => Yii::t('model', 'Subtitles'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Chapter titles are descriptive with common language. Mentioning what data, geography and time is covered. '),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_map" url to the chapter with populatins on the map.'),
                'thumbnail_media_id' => Yii::t('model', 'This thumbnail is the visual symbol that enables users to reconginze the chapter again in a list of thumbnails. It should capture the essence of the visual presentation. and should not look like other chapters. Many chapters show bubblechart, so the thumbnail must capture the specific aspect by focusing on an essential detail.'),
                'about' => Yii::t('model', 'Describe the purpose of the chapter, try aviding using the word "and". When repeating a lot of aspects there is probably a uniting aspect that should be written instead.'),
                'teachers_guide' => Yii::t('model', 'You are a teacher. Your time is precious and your students are picky.  By watching the video you\'ve already understood the content of this chapter. Now you are reading the guide looking for ways to engage your students without loosing time. If the guide is good, you will realize you don\'t need any fancy technology. Maybe you just need seven small stones. You may get an advice to give the students one of the exercises first and then give the presentation, when they are more curious for an answer. That\'s what a good guide can do for a teacher!'),
                'exercise' => Yii::t('model', 'Exercises let students build skills and use knowledge, instead of just memorize facts and then forget them. The exercises deal with the same phenomenas as the chapter video and mimics it\'s graphics so that students can bring their understanding from the videos and slideshows into assignments.'),
                'video' => Yii::t('model', 'The video does two things. First of all it shows some core global trends and patterns. But it also gives teachers ideas for how to make these learnings come alive with simple explanations that are easy to understand and remember.  This video does not give pracitcal advice for different equipment. Such videos are found as material with the exercises of the chapter.'),
                'snapshot' => Yii::t('model', 'The visualizaitons opens a window into the data, which let\'s the students generate their hypothesis and try answering quesitons themselves. With local data the story of the chapter can be made local, by selecting your country. The visualizations in this view should relate directly to those in the video. Visualizaitons that are indirectly relevant are in the related list.'),

                'tags' => Yii::t('model', ''),
                'dataChunks' => Yii::t('model', ''),
                'tests' => Yii::t('model', ''),
                'related' => Yii::t('model', ''),
                'credits' => Yii::t('model', ''),
            )
        );
    }

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

}
