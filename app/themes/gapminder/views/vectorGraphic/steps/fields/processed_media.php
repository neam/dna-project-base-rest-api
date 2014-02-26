<?php
/* @var VectorGraphicController|ItemController $this */
/* @var VectorGraphic|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php // TODO: Fix this view. ?>
<?php
$relation = 'processedMediaId' . ucfirst($model->source_language);
$attribute = 'processed_media_id_' . $model->source_language;
$step = 'file';
$mimeTypes = array('image/svg+xml');

$this->renderPartial('//p3Media/_select', compact('model', 'form', 'relation', 'attribute', 'step', 'mimeTypes'));

if ($this->workflowData['translateInto']) {
    $relation = 'processedMediaId' . ucfirst($this->workflowData['translateInto']);
    $attribute = 'processed_media_id_' . $this->workflowData['translateInto'];
    $step = 'file';
    $mimeTypes = array('application/vnd.ms-powerpoint');

    $this->renderPartial('//p3Media/_select', compact('model', 'form', 'relation', 'attribute', 'step', 'mimeTypes'));
}
?>