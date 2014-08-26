<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions as a super-administrator');

/*
 * All non-developer rights, most importantly creating groups and assigning group administrators
 */
$I->login('admin', 'admin');
