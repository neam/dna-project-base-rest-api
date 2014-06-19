<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

$I->registerUser(
    array(
        'name' => 'member',
        'password' => 'test',
        'email' => 'dev+member@gapminder.org',
        'groupRoles' => array('GapminderOrg' => array('GroupMember')),
    )
);
