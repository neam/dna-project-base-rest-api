<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

/*
 * Can toggle Item visibility to PUBLIC in assigned group
 */
$I->login('publisher', 'test');
