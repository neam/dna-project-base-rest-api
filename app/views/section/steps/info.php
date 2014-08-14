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

<?php echo $form->select2ControlGroup(
    $model,
    'contents',
    CHtml::listData(
        Item::model()->findAllByAttributes(array('model_class' => array('HtmlChunk'))),
        'node_id',
        'itemLabel'
    ),
    array(
        'multiple' => true,
        'unselectValue' => '', // Anything that empty() evaluates as true
        'options' => $form->selectRelated($model, 'contents'),
    )
); ?>

