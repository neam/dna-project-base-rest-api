<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('register users of different roles in a group');
$I->registerGroupUsers();
