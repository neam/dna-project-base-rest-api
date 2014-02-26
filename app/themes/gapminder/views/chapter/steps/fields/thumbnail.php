<?php
$relation = "thumbnailMedia";
$attribute = "thumbnail_media_id";
$step = "info";
$mimeTypes = array('image/jpeg', 'image/png');

$this->renderPartial('//p3Media/_select', compact("model", "form", "relation", "attribute", "step", "mimeTypes"));
