<?php /** @var Chapter $model */ ?>

<div class="control-group">
    <div class="controls">
        <?php echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add visualization'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-chapter-snapshot-modal',
            ),
        ), true); ?>
        <?php echo Html::hintTooltip($model->getAttributeHint('snapshot')); ?>
        <?php $this->renderPartial('//gridRelation/_relation_list', array(
            'relation' => 'snapshots',
            'model' => $model,
            'label' => 'visualizations',
        )); ?>
    </div>
</div>

<?php $this->renderPartial('//gridRelation/_modal_form', array(
    'model' => $model,
    'relation' => 'snapshots',
    'toType' => 'Snapshot',
    'toLabel' => 'visualization',
    'type' => 'edge',
)); ?>
