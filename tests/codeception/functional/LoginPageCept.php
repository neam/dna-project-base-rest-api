<?php
$I = new TestGuy\MemberSteps($scenario);
$I->wantTo('login and logout');
$I->amOnPage('?r=/');
$I->click('Login');
$I->see('Login','h1');

$I->login('admin', 'admin');

$I->click('Logout');
$I->see('Login', 'ul.nav');

$I->dontSee('Logout');
