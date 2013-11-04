<?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255, 'hintOptions' => array('class' => 'alert alert-info'), 'hint' => $model->getAttributeHint('title_en'))); ?>

<?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255, 'hintOptions' => array('class' => 'alert alert-info'), 'hint' => $model->getAttributeHint('slug_en'))); ?>

<div class="alert alert-info">
    Hint: Lorem ipsum
</div>
