<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

$I->registerUser(
    array(
        'name' => 'approver',
        'password' => 'test',
        'email' => 'dev+approver@gapminder.org',
        'groupRoles' => array('GapminderOrg' => array('GroupApprover')),
    )
);
