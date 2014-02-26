<?php /** @var Chapter $model */ ?>

<?php if (false) {
    echo $form->html5EditorControlGroup($model, 'teachers_guide_en', array(
        'rows' => 6,
        'cols' => 50,
        'class' => 'span6',
        'options' => array(
            'link' => true,
            'image' => false,
            'color' => false,
            'html' => true,
        ),
    ));
} ?>

<?php echo $form->ckEditorControlGroup($model, 'teachers_guide_en', array(
    'rows' => 6,
    'cols' => 50,
    'class' => 'span6',
    'options' => array(
        'fullpage' => 'js:true',
        'width' => '640',
        'resize_maxWidth' => '640',
        'resize_minWidth' => '320',
    ),
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'teachers_guide_en', 'teachers_guide'),
    ),
)); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->ckEditorControlGroup($model, 'teachers_guide_' . $this->workflowData['translateInto'], array(
        'rows' => 6,
        'cols' => 50,
        'class' => 'span6',
        'options' => array(
            'fullpage' => 'js:true',
            'width' => '640',
            'resize_maxWidth' => '640',
            'resize_minWidth' => '320',
        ),
    ));
} ?>
