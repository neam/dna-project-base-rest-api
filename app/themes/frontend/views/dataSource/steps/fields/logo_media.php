<?php
$relation = "logoMedia";
$attribute = "logo_media_id";
$step = "logo";
$mimeTypes = array('image/jpeg', 'image/png');

$this->renderPartial('//p3Media/_select', compact("model", "form", "relation", "attribute", "step", "mimeTypes"));
