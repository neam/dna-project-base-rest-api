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
class RestApiHtmlChunk extends HtmlChunk implements SirTrevorBlockNode, TranslatableResource
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

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return $this->getListableAttributes();
    }

    /**
     * Returns att "listable" attributes.
     * Listable attributes are ones that appear inside an "attributes" section for a "html_chunk" in any response.
     *
     * @return array
     */
    public function getListableAttributes()
    {
        return array(
            'markup' => $this->markup,
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionItemType()
    {
        return 'html_chunk';
    }

    /**
     * @inheritdoc
     */
    public function getTranslationAttributes()
    {
        return array('markup');
    }

    /**
     * @inheritdoc
     */
    public function getTranslatedAttributes()
    {
        return $this->getListableAttributes();
    }
}
