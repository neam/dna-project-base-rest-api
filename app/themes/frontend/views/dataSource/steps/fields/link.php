<?php echo $form->textFieldRow($model, 'link', array('maxlength' => 255)); ?>
<?php if ($model->getAttributeHint("link")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("link"); ?>
    </p>
<?php endif; ?>
