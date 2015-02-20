<?php

class RestApiSirTrevorBlockItemList extends RestApiSirTrevorBlockNode
{
    /**
     * @inheritdoc
     */
    public function getTranslatableAttributes()
    {
        // item lists contain only data from it's item type. these are not currently translatable.
        return array();
    }

    /**
     * @inheritdoc
     */
    public function getItemType()
    {
        return 'item_list';
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
        if ($this->mode === self::MODE_TRANSLATION) {
            // This block cannot be translated, so there is no need to return any data.
            return array();
        }

        /** @var RestApiItemList $model */
        $model = $this->loadReferredModel($this->nodeId);
        if ($model === null) {
            return array();
        }

        return array(
            'display_extent' => !empty($model->displayExtentOption) ? $model->displayExtentOption->ref : null,
            'query' => array(
                'item_type' => !empty($model->queryFilterByItemType) ? $model->queryFilterByItemType->table : null,
                'composition_type' => !empty($model->queryFilterByCompositionType) ? $model->queryFilterByCompositionType->ref : null,
                'sort' => (!empty($model->querySortOption) && !empty($model->querySortOption->ref)) ? $model->querySortOption->ref : null,
                'pageSize' => (int)$model->query_pageSize,
            ),
            // todo: do this once we have pagination.
//           'pagination_metadata' => array(
//                'currentPage' => '1',
//                'itemCount' => '68',
//                'limit' => '100',
//                'offset' => '0',
//                'pageCount' => '14',
//                'pageSize' => '5',
//                'pageVar' => 'foo',
//                'params' => '???',
//                'route' => '/sdfsdf/'
//           ),
            'items' => $model->getItems(),
        );
    }
}
