<div class="control-group">
    <?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>
    <?php if ($model->getAttributeHint("title")): ?>
        <p class="alert alert-info help-block">
            <?php echo $model->getAttributeHint("title"); ?>
        </p>
    <?php endif; ?>
</div>
