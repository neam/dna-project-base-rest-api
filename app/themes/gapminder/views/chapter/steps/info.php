<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<div class="info-step">
    <?php $this->renderPartial('steps/fields/title', compact('form', 'model')); ?>
    <?php $this->renderPartial('steps/fields/about', compact('form', 'model')); ?>
    <?php echo $form->select2ControlGroup($model, 'thumbnail_media_id', $model->getThumbnailOptions()); ?>
</div>
