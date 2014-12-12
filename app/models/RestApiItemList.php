<?php

/**
 * Item list resource.
 */
class RestApiItemList extends ItemListConfig implements SirTrevorBlock
{
    /**
     * @var array map of rest resource models per item active record class name (models must implement RelatedResource interface).
     */
    protected static $itemResourceMap = array(
        'Composition' => 'RestApiComposition',
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
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                'rest-model-behavior' => array(
                    'class' => 'WRestModelBehavior',
                ),
                'RestrictedAccessBehavior' => array(
                    'class' => '\RestrictedAccessBehavior',
                ),
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
           'display_extent' => !empty($this->displayExtentOption) ? $this->displayExtentOption->ref : null,
           'query' => array(
               'item_type' => !empty($this->queryFilterByItemType) ? $this->queryFilterByItemType->table : null,
               'composition_type' => !empty($this->queryFilterByCompositionType) ? $this->queryFilterByCompositionType->ref : null,
               'sort' => (!empty($this->querySortOption) && !empty($this->querySortOption->ref)) ? $this->querySortOption->ref : null,
               'pageSize' => (int)$this->query_pageSize,
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
        if (!empty($this->queryFilterByItemType)) {
            $className = $this->getResourceModelName();
            if ($className !== false) {
                $criteria = $this->getResourceCriteria();
                /** @var RelatedResource[] $models */
                $models = CActiveRecord::model($className)->findAll($criteria);
                foreach ($models as $model) {
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
    protected function getResourceModelName()
    {
        if (empty($this->queryFilterByItemType) || !isset(self::$itemResourceMap[$this->queryFilterByItemType->model_class])) {
            return false;
        }
        return self::$itemResourceMap[$this->queryFilterByItemType->model_class];
    }

    /**
     * Gets the criteria for finding this resources items.
     *
     * @return CDbCriteria
     */
    protected function getResourceCriteria()
    {
        $criteria = new CDbCriteria();
        if (!empty($this->query_filter_by_composition_type_id)) {
            $criteria->compare('composition_type_id', (int)$this->query_filter_by_composition_type_id);
        }
        if (!empty($this->querySortOption)) {
            // note that both criteria_order criteria_join needs to be valid for direct use with CDbCriteria
            if (!empty($this->querySortOption->criteria_order)) {
                $criteria->order = $this->querySortOption->criteria_order;
            }
            if (!empty($this->querySortOption->criteria_join)) {
                $criteria->join = $this->querySortOption->criteria_join;
            }
        }
        return $criteria;
    }
}
