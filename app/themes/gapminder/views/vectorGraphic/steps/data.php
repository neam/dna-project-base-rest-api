<?php
/* @var VectorGraphicController|ItemController $this */
/* @var VectorGraphic|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<div class="control-group">
    <div class="controls">
        <?php echo $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('app', 'Add data'),
                'icon' => TbHtml::ICON_PLUS,
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#addrelation-vectorgraphic-dataarticle-modal',
                ),
            ), true
        ); ?>
        <?php echo Html::hintTooltip($model->getAttributeHint('dataarticles')); ?>
        <?php $this->renderPartial(
            '//gridRelation/_relation_list',
            array(
                'relation' => 'dataarticles',
                'model' => $model,
                'label' => 'data',
            )
        ); ?>
    </div>
</div>
<?php // TODO: Fix modal. ?>
<?php $this->renderPartial(
    '//gridRelation/_modal_form',
    array(
        'model' => $model,
        'relation' => 'dataarticles',
        'toType' => 'DataArticle',
        'toLabel' => 'data',
        'type' => 'edge',
    )
); ?>
