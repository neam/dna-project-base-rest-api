<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'poFile',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    )
    , true);
echo $form->customRow($model, 'po_file_id', $input);
?>

<?php
$formId = 'snapshot-tool_id-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'Po File'))),
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
$this->renderPartial('/poFile/_modal_form', array(
    'formId' => $formId,
    'inputSelector' => '#Tool_po_file_id',
    'model' => new PoFile,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("po_file_id"); ?>
</p>
