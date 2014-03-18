<?php
/**
 * @var CActiveRecord $model the model whose related items are being rendered
 * @var Node $item a single related item
 * @var ActiveRecord $actualModel result of $item->item()
 * @var CWidget $this the widget being rendered
 * @var array $editUrl URL to the related items editing
 * @var array $removeUrl URL to remove the related item from the list
 */
?>

<div class="related-item">
    <strong class="item-label">
        <?php echo Html::link($actualModel->getItemLabel(), $editUrl) ?>
    </strong>
    <?php
    $this->widget(
        '\TbButton',
        array(
            'label' => Yii::t('model', 'Remove'),
            'url' => $removeUrl,
            'icon' => TbHtml::ICON_REMOVE,
        )
    );
    ?>
</div>
