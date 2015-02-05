<?php

/**
 * Slide show file item resource.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $title
 * @property string $about
 * @property string $google_docs_id
 * @property string $slideshare_id
 *
 * Methods made available through the WRestModelBehavior class:
 * @method array getAllAttributes
 * @method array getCreateAttributes
 * @method array getUpdateAttributes
 */
class RestApiSlideshowFile extends SlideshowFile implements SirTrevorBlock
{
    /**
     * @inheritdoc
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                'rest-model-behavior' => array(
                    'class' => 'WRestModelBehavior',
                ),
                'RestrictedAccessBehavior' => array(
                    'class' => '\RestrictedAccessBehavior',
                ),
                'i18n-attribute-messages' => array(
                    'class' => 'I18nAttributeMessagesBehavior',
                    'translationAttributes' => array('title', 'about', 'google_docs_id', 'slideshare_id'),
                    'languageSuffixes' => LanguageHelper::getCodes(),
                    'behaviorKey' => 'i18n-attribute-messages',
                    'displayedMessageSourceComponent' => 'displayedMessages',
                    'editedMessageSourceComponent' => 'editedMessages',
                ),
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
            'google_docs_id' => $this->google_docs_id,
            'slideshare_id' => $this->slideshare_id,
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionItemType()
    {
        return 'slideshow_file';
    }
}
