<?php echo $form->textAreaRow($model, 'about_en', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php if ($model->getAttributeHint("about")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("about"); ?>
    </p>
<?php endif; ?>
