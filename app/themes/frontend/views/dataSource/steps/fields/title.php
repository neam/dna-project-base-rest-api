<?php echo $form->textFieldRow($model, 'title_' . $model->source_language, array('maxlength' => 255)); ?>
<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'title_' . $this->workflowData["translateInto"], array('maxlength' => 255));
} ?>
<?php if ($model->getAttributeHint("title")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("title"); ?>
    </p>
<?php endif; ?>

<?php echo $form->textFieldRow($model, 'slug_' . $model->source_language, array('maxlength' => 255)); ?>
<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'slug_' . $this->workflowData["translateInto"], array('maxlength' => 255));
} ?>
<?php if ($model->getAttributeHint("slug")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("slug"); ?>
    </p>
<?php endif; ?>
