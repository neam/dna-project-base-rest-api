<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'tool',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    )
    , true);
echo $form->customRow($model, 'tool_id', $input);
?>

<?php
$formId = 'snapshot-tool_id-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'Tool'))),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#' . $formId . '-modal',
            ),
        ), true);
        ?>                </div>
</div>

<?php
$this->beginClip('modal:' . $formId . '-modal');
$this->renderPartial('/tool/_modal_form', array(
    'formId' => $formId,
    'inputSelector' => '#Snapshot_tool_id',
    'model' => new Tool,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>

<?php if ($model->getAttributeHint("tool")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("tool"); ?>
    </p>
<?php endif; ?>
