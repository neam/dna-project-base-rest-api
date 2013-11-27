<?php
/** @var TbActiveForm $form */
/** @var Chapter $model */
?>

<?php echo $form->textFieldRow($model, 'title_' . $model->source_language, array(
    'maxlength' => 255,
    'id' => 'slugit-from-1',
)); ?>

<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'title_' . $this->workflowData["translateInto"], array(
        'maxlength' => 255,
        'id' => 'slugit-from-2',
    ));
} ?>

<?php if ($model->getAttributeHint("title")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("title"); ?>
    </p>
<?php endif; ?>

<?php echo $form->textFieldRow($model, 'slug_' . $model->source_language, array(
    'maxlength' => 255,
    'id' => 'slugit-to-1',
)); ?>

<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'slug_' . $this->workflowData["translateInto"], array(
        'maxlength' => 255,
        'id' => 'slugit-to-2',
    ));
} ?>

<?php if ($model->getAttributeHint("slug")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("slug"); ?>
    </p>
<?php endif; ?>

<?php Html::jsSlugIt(array(
    '#slugit-from-1' => '#slugit-to-1',
    '#slugit-from-2' => '#slugit-to-2',
)); ?>