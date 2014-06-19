<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

$I->registerUser(
    array(
        'name' => 'translator',
        'password' => 'test',
        'email' => 'dev+translator@gapminder.org',
        'groupRoles' => array('GapminderOrg' => array('GroupTranslator')),
    )
);
