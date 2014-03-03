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
    // TODO: This could propably be refactored
    /** @var CDbCriteria $relatedCriteria */
    $relatedCriteria = GoItem::model()->searchCriteria();
    $relatedCriteria->addNotInCondition('node_id', $model->getRelatedNodeIds());
    $relatedCriteria->addCondition('node_id != :model_node_id');
    $relatedCriteria->params[':model_node_id'] = $model->node_id;
    $select2 = $this->widget(
        'vendor.crisu83.yiistrap-widgets.widgets.TbSelect2',
        array(
            'name' => 'add-related-edges',
            'data' => CHtml::listData(
                GoItem::model()->findAll($relatedCriteria),
                'node_id',
                function($item) {
                    if (isset($item->_title)) {
                        return $item->_title;
                    }
                    return $item->model_class . ' #' . $item->id;
                }
            ),
            'htmlOptions' => array(
                'multiple' => 'multiple',
            ),
        )
    );

    echo TbHtml::ajaxButton(
        Yii::t('snapshot', 'Add related item'),
        $this->createUrl('addEdges'),
        array(
            'type' => 'POST',
            'data' => "js: {
                '" . get_class($model) . "': {
                    'fromId': {$model->id},
                    'relation': 'related',
                    'edges_to_add': $('#{$select2->resolveId()}').select2('val')
                }
            }",
            'success' => "js:function() {
                location.reload(true);
            }"
        ),
        array(
            'icon' => TbHtml::ICON_PLUS,
        )
    );

    ?>

</div>
