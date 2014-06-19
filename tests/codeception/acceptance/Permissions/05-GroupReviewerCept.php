<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

$I->registerUser(
    array(
        'name' => 'reviewer',
        'password' => 'test',
        'email' => 'dev+reviewer@gapminder.org',
        'groupRoles' => array('GapminderOrg' => array('GroupReviewer')),
    )
);
