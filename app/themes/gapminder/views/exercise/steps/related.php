<?php
/** @var Exercise $model */
/** @var ExerciseController|ItemController $this */
?>
<div class="control-group">
    <div class="controls">
        <?php echo $this->widget('\TbButton', array(
            'label' => Yii::t('app', 'Add related item'),
            'icon' => TbHtml::ICON_PLUS,
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-exercise--modal',
            ),
        ), true); ?>
        <?php echo Html::hintTooltip($model->getAttributeHint('related')); ?>
        <?php $this->renderPartial(
            '//gridRelation/_relation_list',
            array(
                'relation' => 'related',
                'model' => $model,
                'label' => 'related items',
            )
        ); ?>
    </div>
</div>
<?php $this->renderPartial('//gridRelation/_modal_form', array(
    'model' => $model,
    'relation' => 'related',
    'toType' => '',
    'toLabel' => 'related item',
    'type' => 'edge',
)); ?>
<?php publishJs('/themes/gapminder/js/force-dirty-forms.js', CClientScript::POS_END); ?>