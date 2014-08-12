<?php
/* @var SlideshowFileController|ItemController $this */
/* @var SlideshowFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<div class="file-field-2cols">
    <div class="field-column">
        <?php echo $form->select2ControlGroup(
            $model,
            'original_media_id',
            $model->getSlideshowFileOptions(),
            array(
                'empty' => Yii::t('app', 'None'),
            )
        ); ?>
    </div>
    <div class="field-column">
        <div class="form-group">
            <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
            <?php echo TbHtml::button(
                Yii::t('app', 'Upload'),
                array(
                    'block' => true,
                    'class' => 'upload-btn',
                    'data-toggle' => 'modal',
                    'data-target' => '#' . 'original_media_id-modal',
                )
            ); ?>
            <?php $this->renderPartial(
                '//p3Media/_modal_form',
                array(
                    'formId' => 'original_media_id',
                    'inputSelector' => '#SlideshowFile_original_media_id',
                    'model' => new P3Media(),
                    'pk' => 'id',
                    'field' => 'itemLabel',
                )
            ); ?>
        </div>
    </div>
</div>
<div class="file-field-2cols">
    <div class="field-column">
        <?php echo $form->select2ControlGroup(
            $model,
            'processed_media_id_' . $model->source_language,
            $model->getSlideshowFileOptions(),
            array(
                'disabled' => !$this->canEditSourceLanguage(),
                'empty' => Yii::t('app', 'None'),
            )
        ); ?>
    </div>
    <div class="field-column">
        <div class="form-group">
            <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
            <?php echo TbHtml::button(
                Yii::t('app', 'Upload'),
                array(
                    'block' => true,
                    'class' => 'upload-btn',
                    'data-toggle' => 'modal',
                    'data-target' => '#' . 'processed_media_id_' . $model->source_language . '-modal',
                )
            ); ?>
            <?php $this->renderPartial(
                '//p3Media/_modal_form',
                array(
                    'formId' => 'processed_media_id_' . $model->source_language,
                    'inputSelector' => '#SlideshowFile_processed_media_id_' . $model->source_language,
                    'model' => new P3Media(),
                    'pk' => 'id',
                    'field' => 'itemLabel',
                )
            ); ?>
        </div>
    </div>
</div>
<?php if ($this->workflowData['translateInto']): ?>
    <div class="file-field-2cols">
        <div class="field-column">
            <?php echo $form->select2ControlGroup(
                $model,
                'processed_media_id_' . $this->workflowData['translateInto'],
                $model->getSlideshowFileOptions(),
                array(
                    'empty' => Yii::t('app', 'None'),
                )
            ); ?>
        </div>
        <div class="field-column">
            <div class="form-group">
                <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
                <?php echo TbHtml::button(
                    Yii::t('app', 'Upload'),
                    array(
                        'block' => true,
                        'class' => 'upload-btn',
                        'data-toggle' => 'modal',
                        'data-target' => '#' . 'processed_media_id_' . $this->workflowData['translateInto'] . '-modal',
                    )
                ); ?>
                <?php $this->renderPartial(
                    '//p3Media/_modal_form',
                    array(
                        'formId' => 'processed_media_id_' . $this->workflowData['translateInto'],
                        'inputSelector' => '#SlideshowFile_processed_media_id_' . $this->workflowData['translateInto'],
                        'model' => new P3Media(),
                        'pk' => 'id',
                        'field' => 'itemLabel',
                    )
                ); ?>
            </div>
        </div>
    </div>
<?php endif; ?>