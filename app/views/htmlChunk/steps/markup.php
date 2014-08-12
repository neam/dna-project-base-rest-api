<?php
/** @var HtmlChunkController|WorkflowUiControllerTrait $this */
/** @var HtmlChunk|ItemTrait $model */
/** @var TbActiveForm|AppActiveForm $form */
?>
<?php echo $form->translateTextAreaControlGroup(
    $model,
    'markup',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
