<?php /** @var Tool $model */ ?>

<?php $input = $this->widget('\GtcRelation', array(
    'model' => $model,
    'relation' => 'poFile',
    'fields' => 'itemLabel',
    'allowEmpty' => true,
    'style' => 'dropdownlist',
    'htmlOptions' => array(
        'checkAll' => 'all'
    ),
), true); ?>

<?php echo $form->customRow($model, 'po_file_id', $input, array(
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'po_file_id'),
    ),
)); ?>

<div class="control-group">
    <div class="controls">
        <?php echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add Po File'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-tool-pofile-modal',
            ),
        ), true); ?>
    </div>
</div>

<?php $this->renderPartial('//gridRelation/_modal_form_single', array(
    'model' => $model,
    'toType' => 'PoFile',
    'toLabel' => 'po file',
    'inputId' => 'po_file_id',
)); ?>
