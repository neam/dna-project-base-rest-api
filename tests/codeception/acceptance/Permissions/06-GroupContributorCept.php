<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

$I->registerUser(
    array(
        'name' => 'contributor',
        'password' => 'test',
        'email' => 'dev+contributor@gapminder.org',
        'groupRoles' => array('GapminderOrg' => array('GroupContributor')),
    )
);
