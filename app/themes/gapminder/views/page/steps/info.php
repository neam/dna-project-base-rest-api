<?php
/** @var PageController|ItemController $this */
/** @var Page|ItemTrait $model */
/** @var TbActiveForm|AppActiveForm $form */
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
<?php echo $form->translateTextAreaControlGroup(
    $model,
    'about',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php $this->widget(
    '\RelatedItems',
    array(
        'model' => $model,
        'relation' => 'sections',
    )
); ?>
<?php echo Html::link(
    Yii::t('page sections', 'New section'),
    array('/section/add', 'pageId' => $model->id),
    array(
        'class' => 'btn btn-default',
        'role' => 'button',
    )
); ?>
