<?php

class RestApiSirTrevorBlockSlideshowFile extends RestApiSirTrevorBlockNode
{
    /**
     * @inheritdoc
     */
    public function getTranslatableAttributes()
    {
        // todo: item lists contain only data from it's item type. these are not currently translatable.
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
    public function getListableAttributes(array $options = array())
    {
        /** @var RestApiSlideshowFile $model */
        $model = $this->loadReferredModel($this->nodeId);

        return array(
            'google_docs_id' => $model->google_docs_id,
            'slideshare_id' => $model->slideshare_id,
        );
    }
}
