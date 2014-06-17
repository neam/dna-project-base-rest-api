<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('create a new snapshot');

$I->login('max', 'test');

$I->createSnapshot(
    array(
        'info' => array(
            SnapshotEditPage::$titleField => 'Test snapshot',
        ),
    )
);

$I->amOnPage(SnapshotBrowsePage::$URL);
$I->see('Test snapshot');
