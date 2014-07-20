<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

/*
 * Can assign some roles and revert changes that users have made.
 * A lightweight EDITOR. Can also see items suggested to group
 */
$I->login('moderator', 'test');
