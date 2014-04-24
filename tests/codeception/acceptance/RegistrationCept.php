<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('register and see result');
$I->register('test', 'test', 'test', 'dev+test@gapminder.org', true);