<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('publish a item');

/*
 * Can toggle Item visibility to PUBLIC in assigned group
 */
$I->login('publisher', 'testtest');

$I->amOnPage(SnapshotBrowsePage::$URL);
$I->waitForText('Sample Snapshot');
$I->see('Sample Snapshot');
$I->click(
    SnapshotBrowsePage::$publishButtonText,
    SnapshotBrowsePage::modelContext('Sample Snapshot')
);
$I->waitForText(SnapshotBrowsePage::$unPublishButtonText);
