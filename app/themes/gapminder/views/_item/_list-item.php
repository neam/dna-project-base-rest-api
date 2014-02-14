<?php
/* @var ActiveRecord $data */
?>
<div class="list-item">
    <?php $this->renderPartial('/_item/elements/flowbar', array('model' => $data)); ?>
    <div class="item-content">
        <div class="item-thumb">
            <?php if (isset($data->thumbnailMedia) && $data->thumbnailMedia instanceof P3Media): ?>
                <?php echo CHtml::link(
                    $data->thumbnailMedia->image('select2-thumb'),
                    $this->createUrl('view', array('id' => $data->id))
                ); ?>
            <?php else: ?>
                <div class="alert alert-warning">
                    <?php echo Yii::t('app', 'No thumbnail available'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="item-actions">
            <?php $this->renderPartial('/_item/elements/_action-buttons', array('model' => $data)); ?>
        </div>
    </div>
</div>
