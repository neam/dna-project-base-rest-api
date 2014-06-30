<?php
$I = new WebGuy\MemberSteps($scenario);
/*
 * Default role when not logged in
 */
$I->am('a guest');
$I->wantTo('snoop around');
