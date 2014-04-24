<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('sign in');

$I->login('admin', 'admin');

$I->seeLink('Admin');
$I->click('Admin');
$I->seeLink('Logout');
$I->click('Logout');
$I->seeLink('Login', '.nav li a');
