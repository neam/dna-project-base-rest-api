<?php echo $form->html5EditorRow($model, 'teachers_guide', array('rows' => 6, 'cols' => 50, 'class' => 'span6', 'options' => array(
    'link' => true,
    'image' => false,
    'color' => false,
    'html' => true,
))); ?>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("teachers_guide_en"); ?>
</p>
