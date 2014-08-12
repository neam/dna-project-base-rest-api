<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('login and see result');
$I->login('admin', 'admin');
$I->waitForText('Welcome to Gapminder', 20);
$I->see('Welcome to Gapminder', 'h4');
