<?php

class RestApiSirTrevorBlockVisualization extends RestApiSirTrevorBlockNode
{
    /**
     * @inheritdoc
     */
    public function getTranslatableAttributes()
    {
        // visualization contain only data from it's item type. these are not currently translatable.
        return array();
    }

    /**
     * @inheritdoc
     */
    public function getItemType()
    {
        return 'visualization';
    }

    /**
     * @inheritdoc
     */
    public function applyData()
    {
        // Nothing to apply.
    }

    /**
     * @inheritdoc
     */
    protected function applyTranslations()
    {
        // Nothing to apply.
    }

    /**
     * @inheritdoc
     */
    protected function getBlockData()
    {
        /** @var RestApiVisualization $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return array();
        }

        return array(
            'state' => json_decode($model->state, true),
            'title' => $model->title,
            'tool' => $model->getToolCompositionAttributes(),
        );
    }
}
