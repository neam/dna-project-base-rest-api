<?php
/** @var ExamQuestionAlternativeController|WorkflowUiControllerTrait $this */
/** @var ExamQuestionAlternative|ItemTrait $model */
/** @var TbActiveForm|AppActiveForm $form */
?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'slug',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
