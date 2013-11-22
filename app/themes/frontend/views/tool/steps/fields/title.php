<?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>
<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'title_' . $this->workflowData["translateInto"], array('maxlength' => 255));
} ?>
<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("title"); ?>
</p>

<?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255)); ?>
<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'slug_' . $this->workflowData["translateInto"], array('maxlength' => 255));
} ?>
<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("slug"); ?>
</p>
