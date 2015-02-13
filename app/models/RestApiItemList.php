<?php

/**
 * Item list resource.
 */
class RestApiItemList extends ItemListConfig
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
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                'rest-model-behavior' => array(
                    'class' => 'WRestModelBehavior',
                ),
            )
        );
    }

    /**
     * Gets the items for this resource model.
     *
     * @return array
     */
    public function getItems()
    {
        $items = array();
        if (!empty($this->queryFilterByItemType)) {
            $className = RestApiModel::getItemListItemClass($this->queryFilterByItemType->model_class);
            if ($className !== false) {
                $criteria = $this->getItemCriteria();
                /** @var RelatedResource[] $models */
                $models = ActiveRecord::model($className)->findAll($criteria);
                foreach ($models as $model) {
                    $items[] = $model->getRelatedAttributes();
                }
            }
        }
        return $items;
    }

    /**
     * Gets the criteria for finding this resources items.
     *
     * @return CDbCriteria
     */
    protected function getItemCriteria()
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
