<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<?php
$criteria = new CDbCriteria();
$criteria->addNotInCondition('t.node_id', $model->getRelatedModelColumnValues('snapshots', 'node_id'));

$this->widget(
    '\Edges',
    array(
        'relation' => 'snapshots',
        'model' => $model,
        'criteria' => $criteria,
    )
);

?>

<?php publishJs('/themes/frontend/js/force-clean-dirty-forms.js', CClientScript::POS_END); ?>
