<?php
/**
 * @var PageController $this
 * @var Page $model
 * @var AppActiveForm $form
 */
?>

<?php $this->widget(
    '\RelatedItems',
    array(
        'model' => $model,
        'relation' => 'sections',
    )
); ?>

<?php echo Html::link(
    Yii::t('page sections', 'New section'),
    array('/section/add', 'pageId' => $model->id),
    array(
        'class' => 'btn btn-default',
        'role' => 'button',
    )
); ?>
