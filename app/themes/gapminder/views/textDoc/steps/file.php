<?php
/* @var TextDocController|ItemController $this */
/* @var TextDoc|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<div class="file-field-2cols">
    <div class="field-column">
        <?php echo $form->select2ControlGroup(
            $model,
            'original_media_id',
            $model->getTextDocOptions(),
            array(
                'empty' => Yii::t('app', 'None'),
            )
        ); ?>
    </div>
    <div class="field-column">
        <div class="form-group">
            <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
            <?php echo TbHtml::button(
                Yii::t('app', 'Upload new'),
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
                    'inputSelector' => '#TextDoc_original_media_id',
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
            $model->getTextDocOptions(),
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
                Yii::t('app', 'Upload new'),
                array(
                    'block' => true,
                    'class' => 'upload-btn',
                    'data-toggle' => 'modal',
                    'data-target' => '#' . 'TextDoc_processed_media_id_' . $model->source_language . '-modal',
                )
            ); ?>
            <?php $this->renderPartial(
                '//p3Media/_modal_form',
                array(
                    'formId' => 'TextDoc_processed_media_id_' . $model->source_language,
                    'inputSelector' => '#TextDoc_processed_media_id_' . $model->source_language,
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
                $model->getTextDocOptions(),
                array(
                    'empty' => Yii::t('app', 'None'),
                )
            ); ?>
        </div>
        <div class="field-column">
            <div class="form-group">
                <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
                <?php echo TbHtml::button(
                    Yii::t('app', 'Upload new'),
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
                        'inputSelector' => '#TextDoc_processed_media_id_' . $this->workflowData['translateInto'],
                        'model' => new P3Media(),
                        'pk' => 'id',
                        'field' => 'itemLabel',
                    )
                ); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
