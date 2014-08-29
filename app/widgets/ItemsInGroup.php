<?php

class ItemsInGroup extends CWidget
{

    /**
     * @var string name of the group
     */
    public $group;
    /**
     * @var int number of items to render
     */
    public $limit = 3;
    /**
     * @var array
     */
    public $listHtmlOptions = array();


    private $groupId;

    public function init()
    {
        if (empty($this->group)) {
            throw new Exception('group must be set');
        }
        $this->groupId = PermissionHelper::groupNameToId($this->group);
    }

    public function run()
    {
        $criteria = new CDbCriteria();
        $criteria->join = 'INNER JOIN node_has_group ON node_has_group.node_id = t.id';
        $criteria->addCondition('node_has_group.group_id = :group_id');
        $criteria->limit = $this->limit;
        $criteria->params[':group_id'] = $this->groupId;
        $nodes = Node::model()->findAll($criteria);
        // TODO: $nodes has all items in group and does not respect any access restrictions

        if (count($nodes) === 0) {
            echo TbHtml::openTag('span', array('class' => 'no-results'));
            echo Yii::t('app', 'No results');
            echo TbHtml::closeTag('span');
            return;
        }

        echo TbHtml::openTag('ul', $this->listHtmlOptions);
        foreach ($nodes as $node) {
            $this->render('application.widgets.views.ItemsInGroup._item', array('item' => $node->item()));
        }
        echo TbHtml::closeTag('ul');
    }
} 
