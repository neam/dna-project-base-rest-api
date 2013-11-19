<?php
$relation = "originalMedia";
$attribute = "original_media_id";
$step = "file";
$mimeTypes = array('application/msword');

$this->renderPartial('//p3Media/_select', compact("model", "form", "relation", "attribute", "step", "mimeTypes"));
