<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('register and see result');
$I->register('max', 'test', 'test', 'max@gapminder.org', true);
$I->joinGroup('contributors');