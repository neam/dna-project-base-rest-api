<div class="control-group">
    <?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255)); ?>
    <?php if ($model->getAttributeHint("slug_en")): ?>
        <p class="alert alert-info help-block">
            <?php echo $model->getAttributeHint("slug_en"); ?>
        </p>
    <?php endif; ?>
</div>
