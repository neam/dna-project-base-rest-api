<?php
$I = new WebGuy($scenario);
$I->wantTo('sign in');

Codeception\Module\WebHelper::login($I, 'admin', YII_ADMIN_PASSWORD);

$I->click('Logout'); //todo: fix context
$I->see('Login','.nav li a');
$I->dontSee('Dashboard'); //,'.dropdown-menu li a' - todo: fix context