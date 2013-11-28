<?php echo $form->textFieldRow($model, 'title_en', array(
    'maxlength' => 255,
    'id' => 'slugit-from-1',
)); ?>

<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'title_' . $this->workflowData["translateInto"], array(
        'maxlength' => 255,
        'id' => 'slugit-from-2',
    ));
} ?>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("title"); ?>
</p>

<?php echo $form->textFieldRow($model, 'slug_en', array(
    'maxlength' => 255,
    'id' => 'slugit-to-1',
)); ?>

<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'slug_' . $this->workflowData["translateInto"], array(
        'maxlength' => 255,
        'id' => 'slugit-to-2',
    ));
} ?>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("slug"); ?>
</p>

<?php Html::jsSlugIt(array(
    '#slugit-from-1' => '#slugit-to-1',
    '#slugit-from-2' => '#slugit-to-2',
)); ?>
