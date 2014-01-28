<?php $this->renderPartial("/_item/elements/flowbar", array('model' => $data)); ?>
<div class="below-flowbar">
    <?php
    if ($data->thumbnailMedia instanceof P3Media) {
        echo CHtml::link($data->thumbnailMedia->image("select2-thumb"), Yii::app()->controller->createUrl('view', array('id' => $data->id)));
    } else {

        ?>
        <div class="alert">
            <?php echo Yii::t('app', 'No thumbnail available'); ?>
        </div>

    <?php

    }
    ?>
    <?php //$this->renderPartial('_view', array('data' => $data)); ?>
</div>