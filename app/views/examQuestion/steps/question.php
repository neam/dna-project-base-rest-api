<?php
/* @var ExamQuestionController|WorkflowUiControllerTrait $this */
/* @var ExamQuestion|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'question',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'slug',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
