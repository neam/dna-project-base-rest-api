<?php
/* @var VideoFileController|ItemController $this */
/* @var VideoFile|ItemTrait $model */
?>
<?php echo $form->select2ControlGroup($model, 'thumbnail_media_id', $model->getThumbnailOptions()); ?>
<?php echo TbHtml::button(
    Yii::t('app', 'Upload'),
    array(
        'icon' => TbHtml::ICON_PLUS,
        'class' => 'upload-btn',
        'data-toggle' => 'modal',
        'data-target' => '#' . $form->id . '-modal',
    )
); ?>
<?php $this->beginClip('modal:' . $form->id . '-modal'); ?>
    <?php $this->renderPartial(
        '//p3Media/_modal_form',
        array(
            'formId' => $form->id,
            'inputSelector' => "#VideoFile_original_media_id",
            'model' => new P3Media(),
            'pk' => 'id',
            'field' => 'itemLabel',
        )
    ); ?>
<?php $this->endClip(); ?>
