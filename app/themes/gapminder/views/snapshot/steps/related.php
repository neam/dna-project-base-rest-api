<?php
// todo: fix this view (and refactor it)
/* @var Snapshot $model */
/* @var SnapshotController $this */
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

    <?php
    $relatedCriteria = GoItem::model()->searchCriteria();
    echo $form->select2(
        $model,
        'related',
        CHtml::listData(
            GoItem::model()->findAll($relatedCriteria),
            'node_id',
            function($item) {
                if (isset($item->_title)) {
                    return $item->_title;
                }
                return $item->model_class . ' #' . $item->id;
            }
        )
    ); ?>

    <?php echo $this->widget(
        '\TbButton',
        array(
            'label' => Yii::t('app', 'Add related item'),
            'icon' => TbHtml::ICON_PLUS,
        ),
        true
    ); ?>

</div>
