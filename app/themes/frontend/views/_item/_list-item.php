<?php /** @var ActiveRecord $data */ ?>

<div class="item">
    <?php $this->renderPartial('/_item/elements/flowbar', array('model' => $data)); ?>
    <div class="below-flowbar">
        <div class="row">
            <div class="span3">
                <?php if (isset($data->thumbnailMedia) && $data->thumbnailMedia instanceof P3Media): ?>
                    <?php echo CHtml::link($data->thumbnailMedia->image('select2-thumb'), Yii::app()->controller->createUrl('view', array('id' => $data->id))); ?>
                <?php else: ?>
                    <div class="alert">
                        <?php echo Yii::t('app', 'No thumbnail available'); ?>
                    </div>
                <?php endif; ?>
                <?php //$this->renderPartial('_view', array('data' => $data)); ?>
            </div>
            <div class="span9">
                <?php $this->renderPartial('/_item/elements/_action-buttons', array('model' => $data)); ?>
            </div>
        </div>
    </div>
</div>
