<?php
/**
 * @var $model Exercise
 * @var ExerciseController $this
*/
?>

<div class="control-group">
    <div class="controls">
        <?php echo $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('app', 'Add material'),
                'icon' => TbHtml::ICON_PLUS,
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#addrelation-exercise--modal',
                ),
            ),
            true
        ); ?>

        <?php echo Html::hintTooltip($model->getAttributeHint('materials')); ?>

        <?php $this->renderPartial(
            '//gridRelation/_relation_list',
            array(
                'relation' => 'materials',
                'model' => $model,
                'label' => 'materials',
            )
        ); ?>
    </div>
</div>

<?php $this->renderPartial(
    '//gridRelation/_modal_form',
    array(
        'model' => $model,
        'relation' => 'materials',
        'toType' => '',
        'toLabel' => 'material',
        'type' => 'edge',
    )
); ?>
