<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions as a administrator');

// TODO: assign group roles to users once implemented

/*
 * All rights within group, including assigning group moderators, editors etc
 */
$I->login('administrator', 'testtest');
