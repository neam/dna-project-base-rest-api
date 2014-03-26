<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('login and see result');
$I->login('admin', 'admin');
$I->see('Welcome to Gapminder', 'h4');
