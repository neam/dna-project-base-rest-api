<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('register and see result');
$I->register('testuser', 'test', 'test', 'dev+testuser@gapminder.org', true);
$I->joinGroup('contributors');