<?php /** @var Chapter $model */ ?>

<div class="control-group">
    <div class="controls">
        <?php echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add video'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-chapter-videofile-modal',
            ),
        ), true); ?>
        <?php echo Html::hintTooltip($model->getAttributeHint('video')); ?>
        <?php $this->renderPartial('//gridRelation/_relation_list', array(
            'relation' => 'videos',
            'model' => $model,
            'label' => 'videos',
        )); ?>
    </div>
</div>

<?php $this->renderPartial('//gridRelation/_modal_form', array(
    'model' => $model,
    'relation' => 'videos',
    'toType' => 'VideoFile',
    'toLabel' => 'video',
    'type' => 'edge',
)); ?>
