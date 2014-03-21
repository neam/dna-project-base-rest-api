<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('log out and see result');
$I->login('admin', 'admin');
$I->logout();
$I->see('Login', HomePage::$loginLink);