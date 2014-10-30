<?php
$scenario->group('data:clean-db,coverage:basic');
$I = new ApiGuy($scenario);
$I->wantTo('retrieve public profile items via the REST API as defined in api blueprint');
