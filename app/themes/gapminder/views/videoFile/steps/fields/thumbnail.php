<?php
/* @var VideoFileController|ItemController $this */
/* @var VideoFile|ItemTrait $model */
?>
<div class="file-field-2cols">
    <div class="field-column">
        <?php echo $form->select2ControlGroup($model, 'thumbnail_media_id', $model->getThumbnailOptions()); ?>
    </div>
    <div class="field-column">
        <div class="form-group">
            <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
            <?php echo TbHtml::button(
                Yii::t('app', 'Upload'),
                array(
                    'block' => true,
                    'icon' => TbHtml::ICON_PLUS,
                    'class' => 'upload-btn',
                    'data-toggle' => 'modal',
                    'data-target' => '#' . $form->id . '-modal',
                )
            ); ?>
            <?php $this->renderPartial(
                '//p3Media/_modal_form',
                array(
                    'formId' => $form->id,
                    'inputSelector' => '#VideoFile_thumbnail_media_id',
                    'model' => new P3Media(),
                    'pk' => 'id',
                    'field' => 'itemLabel',
                )
            ); ?>
        </div>
    </div>
</div>
