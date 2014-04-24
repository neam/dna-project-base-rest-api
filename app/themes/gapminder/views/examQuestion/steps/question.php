<?php
/* @var ExamQuestionController|ItemController $this */
/* @var ExamQuestion|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/question', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/slug', compact('form', 'model')); ?>
