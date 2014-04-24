<?php
/**
 * @var SectionController $this
 * @var Section $model
 * @var AppActiveForm $form
 */
?>

<?php echo $form->translateTextFieldControlGroup(
    $model,
    'title',
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

<?php echo $form->translateTextFieldControlGroup(
    $model,
    'menu_label',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>

<?php $this->renderPartial(
    'steps/fields/contents',
    compact('form', 'model')
); ?>
