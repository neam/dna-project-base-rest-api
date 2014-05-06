<?php
/* @var ExamQuestionController|ItemController $this */
/* @var ExamQuestion|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<?php
$criteria = new CDbCriteria();
$criteria->addNotInCondition('t.node_id', $model->getRelatedModelColumnValues('related', 'id'));
$criteria->addCondition('t.node_id != :self_node_id');
$criteria->params[':self_node_id'] = $model->node_id;
$this->widget(
    '\Edges',
    array(
        'model' => $model,
        'relation' => 'related',
        'criteria' => $criteria,
        'itemClass' => 'Item',
    )
);
?>
<?php publishJs('/themes/gapminder/js/force-dirty-forms.js', CClientScript::POS_END); ?>
