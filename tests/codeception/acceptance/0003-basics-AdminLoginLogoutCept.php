<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('sign in');

$I->login('admin', 'admin');

$I->click('Logout'); //todo: fix context
$I->see('Login','.nav li a');
$I->dontSee('Dashboard'); //,'.dropdown-menu li a' - todo: fix context