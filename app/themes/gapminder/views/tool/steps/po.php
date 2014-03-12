<?php
/** @var ToolController|ItemController $this */
/** @var Tool $model */
/** @var AppActiveForm|TbActiveForm $form */
?>
<div class="file-field-2cols">
    <div class="field-column">
        <?php echo $form->select2ControlGroup($model, 'i18n_catalog_id', $model->getCatalogOptions()); ?>
    </div>
    <div class="field-column">
        <div class="form-group">
            <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
            <?php echo TbHtml::button(
                Yii::t('app', 'Upload new'),
                array(
                    'icon' => TbHtml::ICON_CLOUD_UPLOAD,
                    'block' => true,
                    'class' => 'upload-btn',
                    'data-toggle' => 'modal',
                    'data-target' => '#' . 'i18n_catalog_id-modal',
                )
            ); ?>
            <?php $this->renderPartial(
                '//p3Media/_modal_form',
                array(
                    'formId' => 'i18n_catalog_id',
                    'inputSelector' => '#Tool_i18n_catalog_id',
                    'model' => new P3Media(),
                    'pk' => 'id',
                    'field' => 'itemLabel',
                )
            ); ?>
        </div>
    </div>
</div>
