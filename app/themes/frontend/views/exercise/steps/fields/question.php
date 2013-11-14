<div class="control-group">
    <?php echo $form->textFieldRow($model, 'question_en', array('maxlength' => 200)); ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("question"); ?>
    </p>
</div>
