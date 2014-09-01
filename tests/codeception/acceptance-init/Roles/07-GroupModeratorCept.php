<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('do things as a moderator');

/*
 * Can assign some roles and revert changes that users have made.
 * A lightweight EDITOR. Can also see items suggested to group
 */
$I->login('moderator', 'testtest');
