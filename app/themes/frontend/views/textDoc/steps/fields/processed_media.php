<?php
$relation = "processedMediaIdEn";
$attribute = "processed_media_id_en";
$step = "file";
$mimeTypes = array('application/msword');

$this->renderPartial('//p3Media/_select', compact("model", "form", "relation", "attribute", "step", "mimeTypes"));
