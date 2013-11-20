<?php echo $form->textFieldRow($model, 'slug_'.$model->source_language, array('maxlength' => 255)); ?>
<?php if ($this->workflowData["translateInto"]) echo $form->textFieldRow($model, 'slug_'.$this->workflowData["translateInto"], array('maxlength' => 255)); ?>
<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("slug"); ?>
</p>

