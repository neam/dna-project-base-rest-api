<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<?php // TODO: Find out why this if statement is here, and refactor it. ?>
<?php if (false): ?>
    <?php echo $form->html5EditorControlGroup($model, 'teachers_guide_en', array(
        'rows' => 6,
        'cols' => 50,
        'class' => 'span6',
        'options' => array(
            'link' => true,
            'image' => false,
            'color' => false,
            'html' => true,
        ),
    )); ?>
<?php endif; ?>
<?php // TODO: Use CKEditor field. ?>
<?php echo $form->textAreaControlGroup(
    $model,
    'teachers_guide_en',
    array(
        'rows' => 6,
        'cols' => 50,
        /*'options' => array(
            'fullpage' => 'js:true',
            'width' => '640',
            'resize_maxWidth' => '640',
            'resize_minWidth' => '320',
        ),*/
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'teachers_guide_en', 'teachers_guide'),
        ),
    )
); ?>
<?php // TODO: Use CKEditor field. ?>
<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textAreaControlGroup(
        $model,
        'teachers_guide_' . $this->workflowData['translateInto'],
        array(
            'rows' => 6,
            'cols' => 50,
            /*'options' => array(
                'fullpage' => 'js:true',
                'width' => '640',
                'resize_maxWidth' => '640',
                'resize_minWidth' => '320',
            ),*/
        )
    ); ?>
<?php endif; ?>
