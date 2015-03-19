<?php

/**
 * Item list resource.
 *
 * @property int $id
 * @property int $query_pageSize
 * @property int $query_filter_by_item_type_option_id
 */
class RestApiItemListConfig extends ItemListConfig
{
    /**
     * @var array|null
     */
    public $config;

    /**
     * @inheritdoc
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Gets the items for this resource model.
     *
     * @return array
     */
    public function getItems()
    {
        $items = array();
        $itemTypeOptionId = $this->query_filter_by_item_type_option_id;
        if (!empty($itemTypeOptionId)) {
            $config = $this->getConfig();
            $className = $this->getResourceModelName($config);
            if ($className !== false) {
                $query = $this->getQuery($config);
                foreach ($query as $row) {
                    /** @var RelatedResource $model */
                    $model = $className::model();
                    $model->attributes = $row;
                    $items[] = $model->getRelatedAttributes();
                }
            }
        }
        return $items;
    }

    /**
     * Fetch necessary data to build the item list config command
     * Uses a single joined query instead of multiple individual ones as would be the case when using
     * active record relations.
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
     * @return array the config.
     * @throws \Exception if config cannot be found.
     */
    public function getConfig()
    {

        if (!is_null($this->config)) {
            return $this->config;
        }

        $command = \barebones\Barebones::fpdo()
            ->from('item_list_config', $this->id)
            ->leftJoin('display_extent_option ON display_extent_option.id = item_list_config.display_extent_option_id')
            ->select('display_extent_option.ref as display_extent')
            ->leftJoin('query_filter_by_item_type_option ON query_filter_by_item_type_option.id = item_list_config.query_filter_by_item_type_option_id')
            ->select('query_filter_by_item_type_option.table as query_filter_by_item_type_table')
            ->select('query_filter_by_item_type_option.model_class as query_filter_by_item_type_model_class')
            //->select('query_filter_by_item_type_option.item_type as query_filter_by_item_type_item_type')
            ->leftJoin('composition_type ON composition_type.id = item_list_config.query_filter_by_composition_type_id')
            ->select('composition_type.ref as composition_type_ref')
            ->leftJoin('sort_option ON sort_option.id = item_list_config.query_sort_option_id')
            ->select('sort_option.ref as query_sort_ref')
            ->select('sort_option.criteria_order as query_sort_order')
            ->select('sort_option.criteria_join as query_sort_join')
            ->limit(1);

        $config = $command->fetch();

        if (empty($config)) {
            throw new \Exception("Empty item list query config");
        }

        // set defaults
        if (is_null($config['query_pageSize'])) {
            $config['query_pageSize'] = 5;
        }

        return $this->config = $config;
    }

    /**
     * Gets the resource model class name for this resources items.
     *
     * @param array $config the item list config.
     * @return bool|string the model name or false if not supported.
     */
    protected function getResourceModelName($config)
    {
        if (!isset($config['query_filter_by_item_type_model_class'])) {
            return false;
        }
        return RestApiModel::getItemListConfigItemClass($config['query_filter_by_item_type_model_class']);
    }

    /**
     * Gets the query for finding this resource's items.
     *
     * @param array $config the config.
     * @return \SelectQuery
     */
    protected function getQuery($config)
    {
        /** @var \SelectQuery $query */
        $query = \barebones\Barebones::fpdo()
            ->from($config['query_filter_by_item_type_table']);

        if (!empty($config['query_sort_join'])) {
            $query = $query->join($config['query_sort_join']);
        }

        if (!empty($config['query_filter_by_composition_type_id'])) {
            // todo: if the table we are querying does not have the column "composition_type_id", this will cause a crash. e.g. if this item list is for profiles, then this option will crash it all.
           $query = $query->where('composition_type_id', $config['query_filter_by_composition_type_id']);
        }

        if (!empty($config['query_sort_order'])) {
            $query = $query->orderBy($config['query_sort_order']);
        }

        $query = $query->limit($config['query_pageSize']);

        \barebones\Barebones::restrictQueryToPublishedItems($query);

        return $query;
    }
}
