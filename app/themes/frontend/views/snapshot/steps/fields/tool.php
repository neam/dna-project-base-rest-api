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

    <div class="control-group">
        <div class="controls">
            <?php
            echo $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Yii::t('app', 'Add Tool'),
                'icon' => 'icon-plus',
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#addrelation-snapshot-tool-modal',
                ),
            ), true);
            ?>
        </div>
    </div>

<?php if ($model->getAttributeHint("tool")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("tool"); ?>
    </p>
<?php endif; ?>

<?php
$this->renderPartial('//gridRelation/_modal_form_single', array(
    'model' => $model,
    'toType' => 'Tool',
    'toLabel' => 'tool',
    'inputId' => 'tool_id',
));
?>