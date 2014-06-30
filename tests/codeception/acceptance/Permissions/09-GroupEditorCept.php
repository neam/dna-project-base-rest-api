<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

/*
 * Can edit everything in the group and see items suggested to group
 */
$I->login('editor', 'test');
