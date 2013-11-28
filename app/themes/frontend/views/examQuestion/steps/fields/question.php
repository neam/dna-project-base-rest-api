<?php echo $form->textFieldRow($model, 'question_' . $model->source_language, array(
    'maxlength' => 200,
    'id' => 'slugit-from-1',
)); ?>

<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'question_' . $this->workflowData["translateInto"], array(
        'maxlength' => 255,
        'id' => 'slugit-from-2',
    ));
} ?>

<?php if ($model->getAttributeHint("question")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("question"); ?>
    </p>
<?php endif; ?>