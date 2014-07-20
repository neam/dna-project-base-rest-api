<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
/*
 * Default role when not logged in
 */
$I->am('a guest');
$I->wantTo('view a published item');
$I->amOnPage(SnapshotBrowsePage::$URL);
$I->see('Sample Snapshot');
$I->click(SnapshotBrowsePage::$viewButtonText);
$I->see('Sample Snapshot', 'h1');
$I->see(SnapshotViewPage::$noMarkupText);
