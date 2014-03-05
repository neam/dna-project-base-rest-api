<?php /** @var SlideshowFile $model */ ?>

<div class="control-group">
    <div class="controls">
        <?php echo $this->widget('\TbButton', array(
            'label' => Yii::t('app', 'Add data'),
            'icon' => 'glyphicon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-slideshowfile-dataarticle-modal',
            ),
        ), true); ?>
        <?php echo Html::hintTooltip($model->getAttributeHint('dataarticles')); ?>
        <?php $this->renderPartial('//gridRelation/_relation_list', array(
            'relation' => 'dataarticles',
            'model' => $model,
            'label' => 'data',
        )); ?>
    </div>
</div>

<?php $this->renderPartial('//gridRelation/_modal_form', array(
    'model' => $model,
    'relation' => 'dataarticles',
    'toType' => 'DataArticle',
    'toLabel' => 'data',
    'type' => 'edge',
)); ?>
