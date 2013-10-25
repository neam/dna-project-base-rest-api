<div class="row">
    <div class="span9">
        <?php $this->renderPartial('_view', array('data' => $model)); ?>
    </div>
    <div class="span3">
        <?php if (count($model->node()->outNodes) == 0): ?>
            <?php echo Yii::t('go', 'There are no related nodes'); ?>
        <?php
        else:
            foreach ($model->node()->outNodes as $node) {
                var_dump($node->attributes);
            }
        endif;
        ?>
    </div>
</div>


