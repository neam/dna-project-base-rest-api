<?php
$relation = "originalMedia";
$attribute = "original_media_id";
$step = "info";
$mimeTypes = array('video/webm');

$this->renderPartial('//p3Media/_select', compact("model", "form", "relation", "attribute", "step", "mimeTypes"));
