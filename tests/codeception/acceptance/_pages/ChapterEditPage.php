<?php

class ChapterEditPage extends ItemEditPage
{
    // include url of current page
    static $URL = 'chapter/edit';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    static $steps = array(
        'info',
        'teachers_guide',
        'exercises',
        'videos',
        'snapshots',
        'related',
    );

    static $titleField = '#Chapter_title_en';
    static $slugField = '#Chapter_slug_en';
    static $aboutField = '#Chapter_about_en';
    static $thumbnailField = '#Chapter_thumbnail_en';
    static $teachersGuideField = '#Chapter_teachers_guide_en';
    static $exercisesField = '#Chapter_exercises';
    static $videosField = '#Chapter_videos';
    static $visualizationsField = '#Chapter_snapshots';
    static $relatedField = '#Chapter_related';

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: EditPage::route('/123-post');
     */
     public static function route($param)
     {
        return static::$URL.$param;
     }

    /**
     * @var WebGuy;
     */
    protected $webGuy;

    public function __construct(WebGuy $I)
    {
        $this->webGuy = $I;
    }

    /**
     * @return ChapterEditPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
