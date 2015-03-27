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

        /** @var RestApiItemListConfig $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return array();
        }
        $config = $model->getConfig();

        return array(
            'display_extent' => !empty($config['display_extent']) ? $config['display_extent'] : null,
            'query' => array(
                'item_type' => !empty($config['query_filter_by_item_type_table']) ? $config['query_filter_by_item_type_table'] : null,
                'composition_type' => !empty($config['composition_type_ref']) ? $config['composition_type_ref'] : null,
                'sort' => !empty($config['query_sort_ref']) ? $config['query_sort_ref'] : null,
                'pageSize' => (int) $model->query_pageSize,
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
