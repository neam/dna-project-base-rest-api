<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that admin is the only user');
$I->login('admin', 'admin');

$I->amOnPage(AccountAdminPage::$URL);
$I->waitForText(AccountAdminPage::$headingText, 20);
$I->see(AccountAdminPage::$headingText);
foreach ($I->staff as $person) {
    $I->dontSeeLink($person['name']);
}
$I->seeLink('admin');
