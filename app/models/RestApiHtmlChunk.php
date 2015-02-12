<?php

/**
 * Html chunk item resource.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $markup
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the WRestModelBehavior class:
 * @method array getAllAttributes
 * @method array getCreateAttributes
 * @method array getUpdateAttributes
 */
class RestApiHtmlChunk extends HtmlChunk
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
            )
        );
    }
}
