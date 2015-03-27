<?php

/**
 * Item list resource.
 */
class RestApiItemListConfig extends BaseRestApiItemListConfig implements SirTrevorBlockNode
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
        return 'item_list';
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        $config = $this->getConfig();
        return array(
            'display_extent' => !empty($config['display_extent']) ? $config['display_extent'] : null,
            'query' => array(
                'item_type' => !empty($config['query_filter_by_item_type_table']) ? $config['query_filter_by_item_type_table'] : null,
                'composition_type' => !empty($config['composition_type_ref']) ? $config['composition_type_ref'] : null,
                'sort' => !empty($config['query_sort_ref']) ? $config['query_sort_ref'] : null,
                'pageSize' => (int) $this->query_pageSize,
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
            'items' => $this->getItems(),
        );
    }
}
