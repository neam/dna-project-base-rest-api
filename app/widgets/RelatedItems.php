<?php

class RelatedItems extends CWidget
{
    /**
     * @var CActiveRecord
     */
    public $model;

    /**
     * @var string
     */
    public $relation;

    public function init()
    {
        if (empty($this->model)) {
            throw new Exception('Model must be set');
        }
        if (empty($this->relation)) {
            throw new Exception('Relation must be set');
        }
        if (!$this->model instanceof CActiveRecord) {
            throw new Exception('Model must be instance of a CActiveRecord');
        }
    }

    public function run()
    {
        $relatedItems = $this->model->{$this->relation};
        foreach ($relatedItems as $i => $relatedItem) {

            // We dont want instances of Nodes, but their actual model, ie VideoFile
            if ($relatedItem instanceof Node) {
                $actualModel = $relatedItem->item();
            } else {
                $actualModel = $relatedItem;
            }

            $this->render('relatedItem', array(
                'item' => $relatedItem,
                'actualModel' => $actualModel,
                'model' => $this->model,
                'relation' => $this->relation,
                'editUrl' => $this->getEditUrl($actualModel),
                'removeUrl' => $this->getDeleteUrl($actualModel),
            ));
        }
    }

    /**
     * Creates a URL expected by TbHtml::link()
     * @param ActiveRecord $model
     * @return string
     */
    protected function getEditUrl($model)
    {
        return array(
            lcfirst(get_class($model)) . '/continueAuthoring',
            'id' => $model->{$model->tableSchema->primaryKey},
        );
    }

    /**
     * Creates a URL expected by TbButton
     * @param ActiveRecord $model
     * @return array
     */
    protected function getDeleteUrl($model)
    {
        return array(
            'deleteEdge',
            'id' => $this->model->{$this->model->tableSchema->primaryKey},
            'from' => $this->model->node_id,
            'to' => $model->node_id,
            'relation' => $this->relation,
            'returnUrl' => Yii::app()->request->url
        );
    }

}
