<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('review a item');

/*
 * Can review (= proofread, evaluate, preview) items in the group
 */
$I->login('reviewer', 'test');