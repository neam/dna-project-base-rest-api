<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

/*
 * Can edit everything in the group and see items suggested to group
 */
$I->login('editor', 'test');

$I->amOnPage(SnapshotBrowsePage::$URL);
$I->see('Sample Snapshot');
$I->click(
    SnapshotBrowsePage::$prepareForPublishingButtonText,
    SnapshotBrowsePage::modelContext('Sample Snapshot')
);


// Vizabi state is missing
$I->waitForText('1 required field missing', 10);
$I->click(SnapshotEditPage::$goToNextFieldButton);

$vizabiState = <<<EOD
{
    "isInteractive": true,
    "dataPath": "apps/go/scripts/vizabi/data/",
    "year": 2013,
    "fileFormat": "multiCSV",
    "category": [
        "country"
    ],
    "xAxisScale": "log",
    "yAxisTickValues": [
        40,
        60,
        80
    ],
    "xAxisTickValues": [
        500,
        5000,
        50000
    ],
    "language": "en",
    "speed": 0.1,
    "minYValue": 35,
    "maxYValue": 85,
    "minXValue": 150,
    "maxXValue": 150000,
    "autoZoom": true
}
EOD;

$I->fillField(SnapshotEditPage::$vizabiStateField, $vizabiState);
$I->click(SnapshotEditPage::$submitButton);
$I->waitForText('Submit for publishing', 10);
$I->click('Submit for publishing');
$I->seeInCurrentUrl('snapshot/edit');
$I->amOnPage(SnapshotBrowsePage::$URL);
$I->dontSee('Prepare for Publishing', SnapshotBrowsePage::modelContext('Sample Snapshot'));
