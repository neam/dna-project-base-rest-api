<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

/*
 * Can create items in the group
 */
$I->login('contributor', 'test');

$I->createSnapshot(
    array(
        'info' => array(
            SnapshotEditPage::$titleField => 'Sample Snapshot',
            SnapshotEditPage::$aboutField => 'This is a sample snapshot.',
        ),
    )
);

$I->amOnPage(SnapshotBrowsePage::$URL);
$I->see('Sample Snapshot');

$I->addItemToGroup('GapminderOrg', SnapshotBrowsePage::modelContext('Sample Snapshot'));
