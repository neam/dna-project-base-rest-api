<?php echo $form->textAreaRow($model, 'embed_override', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php if ($model->getAttributeHint("embed_override")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("embed_override"); ?>
    </p>
<?php endif; ?>