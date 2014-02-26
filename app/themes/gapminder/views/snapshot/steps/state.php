<?php // TODO: Refactor this view. ?>
<?php

$this->renderPartial("steps/fields/vizabi_state", compact("form", "model"));

// todo: implement the add tool modal properly
//$this->renderPartial("steps/fields/tool", compact("form", "model"));

$this->renderPartial("steps/fields/embed_override", compact("form", "model"));

