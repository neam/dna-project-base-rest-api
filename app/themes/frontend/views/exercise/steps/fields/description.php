<?php echo $form->textAreaRow($model, 'description_en', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php if ($model->getAttributeHint("description")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("description"); ?>
    </p>
<?php endif; ?>
