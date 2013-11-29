<?php /** @var SlideshowFile $model */ ?>

<div class="control-group">
    <div class="controls">
        <?php echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add data'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-slideshowfile-datachunk-modal',
            ),
        ), true); ?>
        <?php echo Html::hintTooltip($model->getAttributeHint('datachunks')); ?>
        <?php $this->renderPartial('//gridRelation/_relation_list', array(
            'relation' => 'datachunks',
            'model' => $model,
            'label' => 'data',
        )); ?>
    </div>
</div>

<?php $this->renderPartial('//gridRelation/_modal_form', array(
    'model' => $model,
    'relation' => 'datachunks',
    'toType' => 'DataChunk',
    'toLabel' => 'data',
    'type' => 'edge',
)); ?>
