<?php
/* @var VectorGraphicController|ItemController $this */
/* @var VectorGraphic|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php // TODO: Fix this view. ?>
<?php
$relation = 'originalMedia';
$attribute = 'original_media_id';
$step = 'file';
$mimeTypes = array('image/svg+xml');

$this->renderPartial('//p3Media/_select', compact('model', 'form', 'relation', 'attribute', 'step', 'mimeTypes'));
?>