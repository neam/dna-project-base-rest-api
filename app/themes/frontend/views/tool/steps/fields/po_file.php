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

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Yii::t('app', 'Add Po File'),
                'icon' => 'icon-plus',
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#addrelation-tool-pofile-modal',
                ),
            ), true);
        ?>
    </div>
</div>

<?php if ($model->getAttributeHint("po_file_id")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("po_file_id"); ?>
    </p>
<?php endif; ?>

<?php
$this->renderPartial('//gridRelation/_modal_form', array(
        'toType' => 'PoFile',
        'toLabel' => 'po file',
        'fromType' => 'Tool',
        'fromId' => $model->id,
        'type' => 'input',
        'inputId' => 'po_file_id',
    ));
?>