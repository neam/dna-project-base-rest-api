<?php
$scenario->group('data:clean-db');
$scenario->group('data:user-generated');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that registering a user works');

$datetime = date("YmdHis");

$I->register('test-' . $datetime, 'test', 'test', 'dev+test-' . $datetime . '@gapminder.org', true);