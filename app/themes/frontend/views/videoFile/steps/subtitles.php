<?php

if (!$this->workflowData["translateInto"]) {

    $this->renderPartial("steps/fields/subtitles", compact("form", "model"));

    $this->renderPartial("steps/fields/subtitles_import", compact("form", "model"));

} else {

    $this->renderPartial("/videoFile/_view", array("data" => $model));

    $this->renderPartial("translate/subtitles", compact("form", "model"));

}

