<?php
// todo: fix this view (and refactor it)
/* @var VideoFile $model */
/* @var VideoFileController $this */
?>
<div class="control-group">
    <div class="controls">
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

    TODO: select2

    <?php echo $this->widget(
        '\TbButton',
        array(
            'label' => Yii::t('app', 'Add related item'),
            'icon' => TbHtml::ICON_PLUS,
        ),
        true
    ); ?>

</div>
