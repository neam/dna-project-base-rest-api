<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

/*
 * Default role in relation to group when account has been added to the group
 */
$I->login('member', 'test');

