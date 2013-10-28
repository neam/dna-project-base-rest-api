<?php
$this->renderPartial('/' . lcfirst(get_class($data)) . '/_view', compact('data'));
