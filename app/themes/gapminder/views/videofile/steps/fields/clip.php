<?php
// TODO: Fix and refactor this view.
$relation = 'originalMedia';
$attribute = 'original_media_id';
$step = 'files';
$mimeTypes = array('video/webm');

$this->renderPartial('//p3Media/_select', compact('model', 'form', 'relation', 'attribute', 'step', 'mimeTypes'));
?>