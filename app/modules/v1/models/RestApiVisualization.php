<?php

/**
 *
 */
class RestApiVisualization extends BaseRestApiVisualization implements SirTrevorBlockNode
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
        return 'visualization';
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
            'state' => json_decode($this->state, true),
            'title' => $this->title,
            'tool' => $this->getToolCompositionAttributes(),
        );
    }
}
