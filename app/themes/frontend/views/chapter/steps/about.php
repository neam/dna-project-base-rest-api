<?php echo $form->textAreaRow($model, 'about', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("about_en"); ?>
</p>
