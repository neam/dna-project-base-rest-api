<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

/*
 * Can approve externally suggested items to be included
 * to the group as well as import items into the group
 */
$I->login('approver', 'test');
