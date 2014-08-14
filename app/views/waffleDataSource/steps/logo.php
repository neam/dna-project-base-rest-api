<?php
/* @var WaffleController|WorkflowUiControllerTrait $this */
/* @var Waffle|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'imageSmallMedia',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    ),
    true
); ?>
<?php echo $form->customControlGroup($model, 'image_small_media_id', $input); ?>
<?php $input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'imageLargeMedia',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    ),
    true
); ?>
<?php echo $form->customControlGroup($model, 'image_large_media_id', $input); ?>
