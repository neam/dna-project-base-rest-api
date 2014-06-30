<?php
$scenario->group('clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->amGoingTo('register users of different roles in a group');
$I->registerGroupUsers();
