<div class="control-group">
    <?php echo $form->textFieldRow($model, 'link', array('maxlength' => 255)); ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("link"); ?>
    </p>
</div>
