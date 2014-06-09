<?php
/** @var ExerciseController|ItemController $this */
/** @var Exercise|ItemTrait $model */
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
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'question',
    $this->getTranslationLanguage(),
    $this->action->id,
    array(
        'hint' => true,
        'disableSlug' => true,
    )
); ?>
<?php echo $form->translateTextAreaControlGroup(
    $model,
    'description',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php if ($this->actionUsesEditWorkflow()): ?>
    <?php
    // TODO: Refactor this.
    $relation = 'thumbnailMedia';
    $attribute = 'thumbnail_media_id';
    $step = 'info';
    $mimeTypes = array('image/jpeg', 'image/png');

    $this->renderPartial('//p3Media/_select', compact('model', 'form', 'relation', 'attribute', 'step', 'mimeTypes'));
    ?>
<?php endif; ?>
