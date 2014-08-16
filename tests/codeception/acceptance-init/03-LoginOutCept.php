<?php
$scenario->group('data:clean-db,coverage:minimal');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('log out and see result');
$I->login('admin', 'admin');
$I->logout();
