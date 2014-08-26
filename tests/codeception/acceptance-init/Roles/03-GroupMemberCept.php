<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('do things as a member');

/*
 * Default role in relation to group when account has been added to the group
 */
$I->login('member', 'test');

