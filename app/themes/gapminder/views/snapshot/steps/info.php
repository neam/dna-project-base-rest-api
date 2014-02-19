<?php // TODO: Refactor this view. ?>
<?php

$this->renderPartial("steps/fields/title", compact("form", "model"));

$this->renderPartial("steps/fields/slug", compact("form", "model"));

$this->renderPartial("steps/fields/about", compact("form", "model"));

// todo: fix the thumbnail upload.
//$this->renderPartial("steps/fields/thumbnail", compact("form", "model"));

