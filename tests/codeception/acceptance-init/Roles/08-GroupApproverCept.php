<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('approve a item');

/*
 * Can approve externally suggested items to be included
 * to the group as well as import items into the group
 */
$I->login('approver', 'test');
