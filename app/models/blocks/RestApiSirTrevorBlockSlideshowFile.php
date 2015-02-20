<?php

class RestApiSirTrevorBlockSlideshowFile extends RestApiSirTrevorBlockNode
{
    /**
     * @inheritdoc
     */
    public function getTranslatableAttributes()
    {
        // slideshow contain only data from it's item type. these are not currently translatable.
        return array();
    }

    /**
     * @inheritdoc
     */
    public function getItemType()
    {
        return 'slideshow_file';
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
        /** @var RestApiSlideshowFile $model */
        $model = $this->loadReferredModel($this->nodeId);
        if ($model === null) {
            return array();
        } else {
            return array(
                'google_docs_id' => $model->google_docs_id,
                'slideshare_id' => $model->slideshare_id,
            );
        }
    }
}
