<?php
$modelClass = $this->modelClass;
$relation = "originalMedia";
$attribute = "original_media_id";
$step = "file";
$mimeTypes = array('application/msword');
?>
<style>

    .select2-container .select2-choice {
        display: block;
        height: 130px;
        min-width: 200px;
        max-width: 400px;
    }

    .select2-result-selectable {
        height: 120px;
        overflow-y: auto;
    }

    .select2-results {
        max-height: 320px;
    }

    .select2-thumb {
        margin-top: 8px;
        margin-bottom: 4px;
    }

    .select2-text {
        margin-bottom: 8px;
    }

</style>

<?php

Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');

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

$("#{$modelClass}_{$attribute}").data('select2opts', select2opts);
$("#{$modelClass}_{$attribute}").select2($("#{$modelClass}_{$attribute}").data('select2opts'));

EOF;

Yii::app()->clientScript->registerScript('step_' . $step . '-select2-' . $attribute, $select2js);

$criteria = new CDbCriteria();
$criteria->addInCondition("mime_type", $mimeTypes);
$criteria->addCondition("t.type = 'file'");
$criteria->limit = 100;
$criteria->order = "t.created_at DESC";

$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => $relation,
        'fields' => 'itemLabel',
        'criteria' => $criteria,
        'allowEmpty' => $noneLabel,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    )
    , true);
echo $form->customRow($model, $attribute, $input);
?>

<?php
$formId = lcfirst($modelClass) . '-' . $attribute . '-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Upload'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#' . $formId . '-modal',
            ),
        ), true);
        ?>
    </div>
</div>

<?php
$this->beginClip('modal:' . $formId . '-modal');
$this->renderPartial('//p3Media/_modal_form', array(
    'formId' => $formId,
    'inputSelector' => "#{$modelClass}_{$attribute}",
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint($attribute); ?>
</p>