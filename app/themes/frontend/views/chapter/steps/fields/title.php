<div class="control-group">
    <?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("title"); ?>
    </p>
</div>

<div class="control-group">
    <?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255)); ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("slug"); ?>
    </p>
</div>
