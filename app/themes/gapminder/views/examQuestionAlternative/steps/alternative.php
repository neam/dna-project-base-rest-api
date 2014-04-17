<?php
/** @var ExamQuestionAlternativeController|ItemController $this */
/** @var ExamQuestionAlternative|ItemTrait $model */
/** @var TbActiveForm|AppActiveForm $form */
?>
<?php echo $form->translateTextAreaControlGroup(
    $model,
    'markup',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->checkBoxControlGroup(
    $model,
    'correct',
    array(
        'disabled' => !$this->canEditSourceLanguage(),
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'correct', 'correct'),
        ),
    )
); ?>
