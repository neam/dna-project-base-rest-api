<?php

/**
 * Html chunk item resource.
 */
class RestApiHtmlChunk extends BaseRestApiHtmlChunk implements SirTrevorBlockNode
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
    public function getCompositionItemType()
    {
        return 'html_chunk';
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
            'markup' => $this->markup,
        );
    }
}
