<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('register users of different roles in a group');
$I->registerGroupUsers();
