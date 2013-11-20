<div class="control-group">
    <?php echo $form->textAreaRow($model, 'description_' . $model->source_language, array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
    <?php if ($this->workflowData["translateInto"]) echo $form->textAreaRow($model, 'description_'.$this->workflowData["translateInto"], array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

    <?php if ($model->getAttributeHint("description")): ?>
        <p class="alert alert-info help-block">
            <?php echo $model->getAttributeHint("description"); ?>
        </p>
    <?php endif; ?>

</div>