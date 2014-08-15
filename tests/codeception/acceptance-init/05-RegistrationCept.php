<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that registering a user works');

$I->register('test', 'test', 'test', 'dev+test@gapminder.org', true);

