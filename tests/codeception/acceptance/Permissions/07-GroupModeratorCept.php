<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

$I->registerUser(
    array(
        'name' => 'moderator',
        'password' => 'test',
        'email' => 'dev+moderator@gapminder.org',
        'groupRoles' => array('GapminderOrg' => array('GroupModerator')),
    )
);
