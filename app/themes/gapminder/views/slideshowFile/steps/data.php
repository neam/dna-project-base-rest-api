<?php
/* @var SlideshowFileController|ItemController $this */
/* @var SlideshowFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>

<?php echo $form->select2ControlGroup(
    $model,
    'dataarticles',
    CHtml::listData(
        DataArticle::model()->findAll(),
        'node_id',
        'itemLabel'
    ),
    array(
        'multiple' => true,
        'unselectValue' => '', // Anything that empty() evaluates as true
        'options' => $form->selectRelated($model, 'dataarticles', 'node_id'),
    )
); ?>
