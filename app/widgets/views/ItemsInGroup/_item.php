<?php
/**
 * @var ItemsInGroup $this
 * @var ActiveRecord $item
 */
?>
<li class="item">
    <section class="item-thumbnail">
        <?php echo isset($item->thumbnailMedia) ? $item->thumbnailMedia->image('item-list-thumbnail') : ''; ?>
    </section>
    <section class="item-info">
        <span class="info-item-type">
            <?php
            // Want to display Video instead of VideoFile
            $class = get_class($item);
            echo $item->getAttributeLabel($class) ? $item->getAttributeLabel($class) : $class;
            ?>
        </span>
        <span class="info-title"><?php echo $item->title; ?></span>
        <span class="info-meta">
            <?php echo Yii::t('app', 'VERSION {version}', array('{version}' => $item->version)); ?>,
            <?php echo Yii::app()->dateFormatter->format('MMM d, yyyy', $item->created); ?>
        </span>
    </section>
    <section class="item-actions">
        <?php echo TbHtml::linkButton(
            Yii::t('app', 'Preview'),
            array(
                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                'block' => true,
                'size' => TbHtml::BUTTON_SIZE_SM,
                'url' => Yii::app()->controller->createUrl("$class/preview", array('id' => $item->id)),
            )
        ); ?>
    </section>
</li>

