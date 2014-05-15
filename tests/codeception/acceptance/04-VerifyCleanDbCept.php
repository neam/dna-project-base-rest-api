<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that admin is the only user');
$I->login('admin', 'admin');

$I->amOnPage(AccountAdminPage::$URL);
foreach ($I->staff as $person) {
    $I->dontSeeLink($person['name']);
    $I->seeLink($person['name']);
}
$I->seeLink('admin');
