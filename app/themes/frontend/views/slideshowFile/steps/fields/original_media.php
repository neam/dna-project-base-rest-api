<?php
$relation = "originalMedia";
$attribute = "original_media_id";
$step = "file";
$mimeTypes = array('application/vnd.ms-powerpoint');

$this->renderPartial('//p3Media/_select', compact("model", "form", "relation", "attribute", "step", "mimeTypes"));
