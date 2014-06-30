<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('translate a item into one of my languages');

/*
 * Can translate items in the group
 */
$I->login('translator', 'test');
