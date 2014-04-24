<?php
/**
 * @var ActiveRecord $model the model whose related items are being rendered
 * @var Node $node a single related item
 * @var ActiveRecord $item result of $node->item()
 * @var RelatedItems $this the widget being rendered
 */
?>

<div class="related-item">
    <strong class="item-label">
        <?php echo Html::link($item->itemLabel, $this->getEditUrl($item)) ?>
    </strong>
    <?php
    $this->widget(
        '\TbButton',
        array(
            'label' => Yii::t('model', 'Remove'),
            'url' => $this->getDeleteUrl($item),
            'icon' => TbHtml::ICON_REMOVE,
        )
    );
    ?>
</div>
