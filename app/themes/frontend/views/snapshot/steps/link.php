<?php echo $form->textAreaRow($model, 'link', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php if ($model->getAttributeHint("link")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("link"); ?>
    </p>
<?php endif; ?>
