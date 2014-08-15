<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

// TODO: assign group roles to users once implemented

/*
 * All rights within group, including assigning group moderators, editors etc
 */
$I->login('administrator', 'test');
