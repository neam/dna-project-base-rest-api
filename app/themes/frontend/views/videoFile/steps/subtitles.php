<?php

if (!$this->workflowData["translateInto"]) {

    $this->renderPartial("steps/fields/subtitles", compact("form", "model"));

    $this->renderPartial("steps/fields/subtitles_import", compact("form", "model"));

} else {

    $currentLang = Yii::app()->language;
    Yii::app()->language = $this->workflowData["translateInto"];
    $this->renderPartial("/videoFile/_view", array("data" => $model));
    Yii::app()->language = $currentLang;

    $this->renderPartial("translate/subtitles", compact("form", "model"));

}

