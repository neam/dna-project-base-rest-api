<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('register and see result');
$I->register('test', 'test', 'test', 'test@gapminder.org', 1);
// TODO fix send mail in the test environment
//$I->see('Please check your email, to complete signing up.', 'h1');