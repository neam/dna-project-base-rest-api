<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'sourceNode',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    )
    , true);
echo $form->customRow($model, 'data_source_id', $input);
?>

    <div class="control-group">
        <div class="controls">
            <?php
            echo $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Yii::t('app', 'Add Data source'),
                'icon' => 'icon-plus',
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#addrelation-examquestion-datasource-modal',
                ),
            ), true);
            ?>
        </div>
    </div>

<?php if ($model->getAttributeHint("datasource")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("datasource"); ?>
    </p>
<?php endif; ?>

<?php
$this->renderPartial('//gridRelation/_modal_form_single', array(
    'model' => $model,
    'toType' => 'DataSource',
    'toLabel' => 'data source',
    'inputId' => 'data_source_id',
));
?>