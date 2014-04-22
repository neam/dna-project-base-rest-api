<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<?php // TODO: Use CKEditor. ?>
<?php echo $form->translateTextAreaControlGroup(
    $model,
    'teachers_guide',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
