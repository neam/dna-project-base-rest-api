<?php
/* @var SlideshowFileController|ItemController $this */
/* @var SlideshowFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php
$relatedCriteria = new CDbCriteria();
$relatedCriteria->addNotInCondition('t.node_id', $model->getRelatedModelColumnValues('related', 'id'));
$relatedCriteria->addCondition('t.node_id != :self_node_id');
$relatedCriteria->join = "INNER JOIN node_has_group AS nhg ON nhg.node_id = t.node_id";
$relatedCriteria->params[':self_node_id'] = $model->node_id;
?>
<?php $this->widget(
    '\Edges',
    array(
        'model' => $model,
        'relation' => 'related',
        'criteria' => $relatedCriteria,
        'itemClass' => 'Item',
    )
);
?>
<?php publishJs('/themes/gapminder/js/force-dirty-forms.js', CClientScript::POS_END); ?>
