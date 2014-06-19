<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

$I->registerUser(
    array(
        'name' => 'administrator',
        'password' => 'test',
        'email' => 'dev+administrator@gapminder.org',
        'groupRoles' => array('GapminderOrg' => array('GroupAdministrator')),
    )
);
