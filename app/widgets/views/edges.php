<?php
/**
 * @var Edges $this
 * @var ActiveRecord $model
 * @var string $relation
 * @var string $id
 * @var string $itemClass
 * @var mixed $criteria
 * @var bool $multiple
 */
?>

<div class="control-group">
    <div class="controls">
        <?php echo Html::label($model->getAttributeLabel($relation), $id); ?>

        <?php $this->widget(
            '\RelatedItems',
            array(
                'model' => $model,
                'relation' => $relation,
            )
        ); ?>

    </div>

    <?php
    $select2 = $this->widget(
        'vendor.crisu83.yiistrap-widgets.widgets.TbSelect2',
        array(
            'name' => $id,
            'asDropDownList' => false,
            'data' => CHtml::listData(
                ActiveRecord::model($itemClass)->findAll($criteria),
                'node_id',
                'itemLabel'
            ),
            'pluginOptions' => array(
                'multiple' => $multiple,
                'width' => '100%',
            ),
        )
    );

    echo TbHtml::ajaxButton(
        Yii::t('edges', 'Add {item}', array('{item}' => $model->getAttributeLabel($relation))),
        Yii::app()->controller->createUrl('addEdges'),
        array(
            'type' => 'POST',
            'data' => "js: {
                '" . get_class($model) . "': {
                    'fromId': {$model->id},
                    'relation': '{$relation}',
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
