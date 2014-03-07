<?php
/* @var I18nCatalogController|ItemController $this */
/* @var I18nCatalog|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php // TODO: Remove unused code. ?>
<?php
$baseUrl = Yii::app()->request->baseUrl;
$noneLabel = Yii::t('app', 'None');
$chooseBelowLabel = Yii::t('app', 'Click to choose existing or upload new below');
$select2js = <<<EOF

function format(state) {
    if (!state.id && !state.text) return "<div class='select2-text'>{$noneLabel} - {$chooseBelowLabel}</div>";
    if (!state.id) return state.text;
    return "<div><img class='select2-thumb' src='{$baseUrl}/p3media/file/image?preset=select2-thumb&id=" + state.id.toLowerCase() + "'/></div><div class='select2-text'>" + state.text + "</div>";
}

var select2opts = {
    formatResult: format,
    formatSelection: format,
    //escapeMarkup: function(m) { return m; }
};

//$("#PoFile_pot_import_media_id").data('select2opts', select2opts);
//$("#PoFile_pot_import_media_id").select2($("#PoFile_pot_import_media_id").data('select2opts'));

EOF;
?>
<div class="file-field">
    <div class="field-select">
        <?php echo $form->select2ControlGroup($model, 'pot_import_media_id', $model->getPoOptions()); ?>
    </div>
    <div class="field-upload">
        <div class="form-group">
            <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
            <?php echo TbHtml::button(
                Yii::t('app', 'Upload new'),
                array(
                    'icon' => TbHtml::ICON_CLOUD_UPLOAD,
                    'block' => true,
                    'class' => 'upload-btn',
                    'data-toggle' => 'modal',
                    'data-target' => '#' . $form->id . '-modal',
                )
            ); ?>
            <?php $this->renderPartial(
                '//p3Media/_modal_form',
                array(
                    'formId' => $form->id,
                    'inputSelector' => '#PoFile_pot_import_media_id',
                    'model' => new P3Media(),
                    'pk' => 'id',
                    'field' => 'itemLabel',
                )
            ); ?>
        </div>
    </div>
    <div class="field-import">
        <div class="form-group">
            <label class="control-label"><?php echo Yii::t('app', '&nbsp;'); ?></label>
            <?php echo TbHtml::submitButton(
                Yii::t('model', 'Import'),
                array(
                    'block' => true,
                    'disabled' => true, // TODO: Remove when the submit logic has been implemented.
                    'class' => 'btn btn-primary',
                    'name' => 'import',
                )
            ); ?>
        </div>
    </div>
</div>
