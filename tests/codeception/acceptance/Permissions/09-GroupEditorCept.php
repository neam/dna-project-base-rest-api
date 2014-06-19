<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

$I->registerUser(
    array(
        'name' => 'editor',
        'password' => 'test',
        'email' => 'dev+editor@gapminder.org',
        'groupRoles' => array('GapminderOrg' => array('GroupEditor')),
    )
);
