<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>

<?php
$criteria = new CDbCriteria();
$criteria->addNotInCondition('t.node_id', $model->getRelatedModelColumnValues('videos', 'node_id'));

$this->widget(
    '\Edges',
    array(
        'relation' => 'videos',
        'model' => $model,
        'criteria' => $criteria,
        'id' => 'Chapter_videos',
    )
);

?>

<?php publishJs('/themes/frontend/js/force-clean-dirty-forms.js', CClientScript::POS_END); ?>
