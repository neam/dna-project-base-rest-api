<?php $input = $this->widget('\GtcRelation', array(
    'model' => $model,
    'relation' => 'sourceNode',
    'fields' => 'itemLabel',
    'allowEmpty' => true,
    'style' => 'dropdownlist',
    'htmlOptions' => array(
        'checkAll' => 'all'
    ),
), true); ?>

<?php echo $form->customControlGroup($model, 'data_source_id', $input, array(
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'data_source_id', 'datasource'),
    ),
)); ?>

    <div class="control-group">
        <div class="controls">
            <?php echo $this->widget('\TbButton', array(
                'label' => Yii::t('app', 'Add Data source'),
                'icon' => 'glyphicon-plus',
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#addrelation-examquestion-datasource-modal',
                ),
            ), true); ?>
        </div>
    </div>

<?php $this->renderPartial('//gridRelation/_modal_form_single', array(
    'model' => $model,
    'toType' => 'DataSource',
    'toLabel' => 'data source',
    'inputId' => 'data_source_id',
)); ?>