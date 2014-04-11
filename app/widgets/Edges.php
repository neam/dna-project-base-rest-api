<?php

/**
 * Class Edges
 *
 * Widget for listing and adding related items.
 */
class Edges extends CWidget
{

    /**
     * @var ActiveRecord
     */
    public $model;

    /**
     * @var string the relation name (eg related or htmlChunks...)
     */
    public $relation;

    /**
     * @var string name of the ActiveRecord class which the items are searched from
     */
    public $itemClass;

    /**
     * @var string|CDbCriteria the criteria to apply when searching items
     */
    public $criteria = '';

    public function init()
    {
        if (empty($this->relation) || empty($this->itemClass) || empty($this->model)) {
            throw new Exception('relation, itemClass and model must be set');
        }
    }

    public function run()
    {
        $this->render('edges', array(
            'id' => $this->getId(),
            'model' => $this->model,
            'relation' => $this->relation,
            'itemClass' => $this->itemClass,
            'criteria' => $this->criteria,
        ));
    }

}
