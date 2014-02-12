<?php
$relation = "fileMedia";
$attribute = "file_media_id";
$step = "data";
$mimeTypes = array(); // todo - define mimetypes

$this->renderPartial('//p3Media/_select', compact("model", "form", "relation", "attribute", "step", "mimeTypes"));
