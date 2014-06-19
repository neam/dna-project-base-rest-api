<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

$I->registerUser(
    array(
        'name' => 'publisher',
        'password' => 'test',
        'email' => 'dev+publisher@gapminder.org',
        'groupRoles' => array('GapminderOrg' => array('GroupPublisher')),
    )
);
