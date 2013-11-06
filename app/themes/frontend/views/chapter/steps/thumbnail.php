<style>

    .select2-container .select2-choice {
        display: block;
        height: 130px;
        width: 300px;
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

$select2js = <<<EOF

function format(state) {
    if (!state.id) return state.text; // optgroup
    return "<div><img class='select2-thumb' src='{$baseUrl}/p3media/file/image?preset=select2-thumb&id=" + state.id.toLowerCase() + "'/></div><div class='select2-text'>" + state.text + "</div>";
}

var select2opts = {
    formatResult: format,
    formatSelection: format,
    //escapeMarkup: function(m) { return m; }
};

$("#Chapter_thumbnail_media_id").data('select2opts', select2opts);
$("#Chapter_thumbnail_media_id").select2($("#Chapter_thumbnail_media_id").data('select2opts'));

EOF;

Yii::app()->clientScript->registerScript('step_thumbnail-select2', $select2js);

$criteria = new CDbCriteria();
$criteria->addCondition("mimetype IN ('image/jpeg','image/png')");
$criteria->addCondition("t.type = 1");
$criteria->limit = 100;
$criteria->order = "createdAt DESC";

$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'thumbnailMedia',
        'fields' => 'itemLabel',
        'criteria' => $criteria,
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    )
    , true);
echo $form->customRow($model, 'thumbnail_media_id', $input);
?>

<?php
$formId = 'chapter-thumbnail_media_id-' . \uniqid() . '-form';
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
    'inputSelector' => '#Chapter_thumbnail_media_id',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("thumbnail"); ?>
</p>