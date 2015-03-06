<?php

/**
 * Html chunk item resource.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $markup
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 */
class RestApiHtmlChunk extends HtmlChunk implements SirTrevorBlock
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
}
