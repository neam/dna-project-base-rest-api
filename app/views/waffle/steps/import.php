<?php
/* @var WaffleController|WorkflowUiControllerTrait $this */
/* @var Waffle|ItemTrait $model */
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

//$("#PoFile_json_import_media_id").data('select2opts', select2opts);
//$("#PoFile_json_import_media_id").select2($("#PoFile_json_import_media_id").data('select2opts'));

EOF;
?>
<div class="file-field-3cols">
    <div class="field-column">
        <?php echo $form->select2ControlGroup(
            $model,
            'json_import_media_id',
            $model->getJsonFileOptions(),
            array(
                'empty' => Yii::t('app', 'None'),
            )
        ); ?>
    </div>
    <div class="field-column">
        <div class="form-group">
            <label class="control-label"><?php echo Yii::t('app', '&nbsp;'); ?></label>
            <?php echo TbHtml::button(
                Yii::t('app', 'Upload'),
                array(
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
                    'inputSelector' => '#Waffle_json_import_media_id',
                    'model' => new P3Media(),
                    'pk' => 'id',
                    'field' => 'itemLabel',
                )
            ); ?>
        </div>
    </div>
    <div class="field-column">
        <div class="form-group">
            <label class="control-label"><?php echo Yii::t('app', '&nbsp;'); ?></label>
            <?php echo TbHtml::submitButton(
                Yii::t('model', 'Import'),
                array(
                    'block' => true,
                    'class' => 'btn btn-primary',
                    'name' => 'import',
                )
            ); ?>
        </div>
    </div>
</div>