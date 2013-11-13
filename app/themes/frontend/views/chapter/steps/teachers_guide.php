<?php if (false) echo $form->html5EditorRow($model, 'teachers_guide_en', array('rows' => 6, 'cols' => 50, 'class' => 'span6', 'options' => array(
    'link' => true,
    'image' => false,
    'color' => false,
    'html' => true,
))); ?>

<?php echo $form->ckEditorRow($model, 'teachers_guide_en', array('rows' => 6, 'cols' => 50, 'class' => 'span6', 'options' => array(
    'fullpage' => 'js:true', 'width' => '640', 'resize_maxWidth' => '640', 'resize_minWidth' => '320'
))); ?>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("teachers_guide"); ?>
</p>
