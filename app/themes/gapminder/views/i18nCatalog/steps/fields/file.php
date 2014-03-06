<?php
/* @var PoFileController|ItemController $this */
/* @var PoFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php // TODO: Fix and refactor this view. ?>
<?php //Yii::app()->bootstrap->registerAssetCss('../select2/select2.css'); ?>
<?php //Yii::app()->bootstrap->registerAssetJs('../select2/select2.js'); ?>

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

Yii::app()->clientScript->registerScript('step_file-select2', $select2js);

$criteria = new CDbCriteria();
$criteria->addCondition("mime_type IN ('text/x-po','text/plain')");
$criteria->addCondition("t.type = 'file'");
$criteria->limit = 100;
$criteria->order = "t.created_at DESC";

$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'potImportMedia',
        'fields' => 'itemLabel',
        'criteria' => $criteria,
        'allowEmpty' => $noneLabel,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    ), true);
?>

<?php echo $form->customControlGroup($model, 'pot_import_media_id', $input, array(
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'pot_import_media_id', 'file'),
    ),
)); ?>

<?php $formId = 'pofile-pot_import_media_id-' . \uniqid() . '-form'; ?>

<div class="control-group">
    <div class="controls">
        <?php echo $this->widget('\TbButton', array(
            'label' => Yii::t('app', 'Upload'),
            'icon' => 'glyphicon-plus',
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#' . $formId . '-modal',
            ),
        ), true); ?>
    </div>
</div>

<?php $this->beginClip('modal:' . $formId . '-modal'); ?>
<?php $this->renderPartial('//p3Media/_modal_form', array(
    'formId' => $formId,
    'inputSelector' => '#PoFile_pot_import_media_id',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
)); ?>
<?php $this->endClip(); ?>