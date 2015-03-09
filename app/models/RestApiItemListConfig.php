<?php

/**
 * Item list resource.
 */
class RestApiItemListConfig extends ItemListConfig implements SirTrevorBlock
{
    /**
     * @var array map of rest resource models per item active record class name (models must implement RelatedResource interface).
     */
    protected static $itemResourceMap = array(
        'Composition' => 'RestApiComposition',
        'Profile' => 'RestApiProfile',
    );

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
        return array(
            'display_extent' => !empty($this->displayExtentOption) ? $this->displayExtentOption->ref : null,
            'query' => array(
                'item_type' => !empty($this->queryFilterByItemTypeOption) ? $this->queryFilterByItemTypeOption->table : null,
                'composition_type' => !empty($this->queryFilterByCompositionType) ? $this->queryFilterByCompositionType->ref : null,
                'sort' => (!empty($this->querySortOption) && !empty($this->querySortOption->ref)) ? $this->querySortOption->ref : null,
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
            'items' => $this->getCompositionItems(),
        );
    }

    /**
     * Gets the items for this resource model.
     *
     * @return array
     */
    protected function getCompositionItems()
    {
        $items = array();
        $itemTypeOptionId = $this->query_filter_by_item_type_option_id;
        if (!empty($itemTypeOptionId)) {
            $config = $this->getConfig();
            $className = $this->getResourceModelName($config);
            if ($className !== false) {

                $query = $this->getQuery($config);

                /** @var RelatedResource[] $models */
                foreach ($query as $row) {
                    $model = $className::model();
                    $model->attributes = $row;
                    $items[] = $model->getRelatedAttributes();
                }
            }
        }
        return $items;
    }

    /**
     * @inheritdoc
     */
    public function getCompositionItemType()
    {
        return 'item_list';
    }

    /**
     * Gets the resource model class name for this resources items.
     *
     * @return bool|string
     */
    protected function getResourceModelName($config)
    {
        if (empty($config['query_filter_by_item_type_model_class']) || !isset(self::$itemResourceMap[$config['query_filter_by_item_type_model_class']])) {
            return false;
        }
        return self::$itemResourceMap[$config['query_filter_by_item_type_model_class']];
    }

    /**
     * Fetch necessary data to build the item list config command
     *
     * Example:
     * query_filter_by_item_type_table: "composition"
     * query_filter_by_composition_type_id: 2
     * query_pageSize: 5
     * display_extent: "titles-only"
     * query_filter_by_item_type_model_class: "Composition"
     * query_filter_by_item_type_table: "composition"
     * query_sort_order: "created DESC"
     * query_sort_join: "footable ON baz.id = composition.footable_id"
     *
     * @return mixed
     */
    protected function getConfig()
    {

        $command = \barebones\Barebones::fpdo()
            ->from('item_list_config', $this->id)
            ->innerJoin('display_extent_option ON display_extent_option.id = item_list_config.display_extent_option_id')
            ->select('display_extent_option.ref as display_extent')
            ->innerJoin('query_filter_by_item_type_option ON query_filter_by_item_type_option.id = item_list_config.query_filter_by_item_type_option_id')
            ->select('query_filter_by_item_type_option.table as query_filter_by_item_type_table')
            ->select('query_filter_by_item_type_option.model_class as query_filter_by_item_type_model_class')
            ->leftJoin('sort_option ON sort_option.id = item_list_config.query_sort_option_id')
            ->select('sort_option.criteria_order as query_sort_order')
            ->select('sort_option.criteria_join as query_sort_join')
            ->limit(1);

        $config = $command->fetch();

        // set defaults
        if (is_null($config['query_pageSize'])) {
            $config['query_pageSize'] = 5;
        }

        return $config;
    }

    /**
     * Gets the query for finding this resource's items.
     *
     * @return \SelectQuery
     */
    protected function getQuery($config)
    {
        // build query
        $query = \barebones\Barebones::fpdo()
            ->from($config['query_filter_by_item_type_table']);

        if (!is_null($config['query_sort_join'])) {
            $query = $query->join($config['query_sort_join']);
        }

        if (!is_null($config['query_filter_by_composition_type_id'])) {
            $query = $query->where('composition_type_id', $config['query_filter_by_composition_type_id']);
        }

        if (!is_null($config['query_sort_order'])) {
            $query = $query->orderBy($config['query_sort_order']);
        }

        $query = $query->limit($config['query_pageSize']);

        \barebones\Barebones::restrictQueryToPublishedItems($query);

        return $query;
    }
}
