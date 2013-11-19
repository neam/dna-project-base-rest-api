<?php echo $form->textAreaRow($model, 'about_'.$model->source_language, array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php if ($this->workflowData["translateInto"]) echo $form->textAreaRow($model, 'about_'.$this->workflowData["translateInto"], array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("about"); ?>
</p>
