<?php /** @var Chapter $model */ ?>

<div class="control-group">
    <div class="controls">
        <?php echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add exercise'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-chapter-exercise-modal',
            ),
        ), true); ?>
        <?php echo Html::hintTooltip($model->getAttributeHint('exercise')); ?>
        <?php $this->renderPartial('//gridRelation/_relation_list', array(
            'relation' => 'exercises',
            'model' => $model,
            'label' => 'exercises',
        )); ?>
    </div>
</div>

<?php $this->renderPartial('//gridRelation/_modal_form', array(
    'model' => $model,
    'relation' => 'exercises',
    'toType' => 'Exercise',
    'toLabel' => 'exercise',
    'type' => 'edge',
)); ?>
