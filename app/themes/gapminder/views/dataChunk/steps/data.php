<?php
/* @var DataArticleController|ItemController $this */
/* @var DataArticle|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php // TODO: Fix and refactor this view. ?>
<?php
$relation = 'fileMedia';
$attribute = 'file_media_id';
$step = 'data';
$mimeTypes = array('application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv');

$this->renderPartial('//p3Media/_select', compact('model', 'form', 'relation', 'attribute', 'step', 'mimeTypes'));
?>