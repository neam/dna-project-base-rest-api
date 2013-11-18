<?php echo $form->textAreaRow($model, 'vizabi_state', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php if ($model->getAttributeHint("vizabi_state")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("vizabi_state"); ?>
    </p>
<?php endif; ?>
