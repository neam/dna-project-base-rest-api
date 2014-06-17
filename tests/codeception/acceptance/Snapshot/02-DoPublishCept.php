<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('publish a snapshot');

$I->login('max', 'test');

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

$modelContext = SnapshotBrowsePage::modelContext('Test snapshot');

// Prepare for publishing
$I->amOnPage(SnapshotBrowsePage::$URL);
$I->click('Prepare for publishing', $modelContext);
// Vizabi state is missing
$I->waitForText('1 required field missing', 10);
$I->click(SnapshotEditPage::$goToNextFieldButton);
$I->fillField(SnapshotEditPage::$vizabiStateField, $vizabiState);
$I->click(SnapshotEditPage::$submitButton);
$I->waitForText('Submit for publishing', 10);
$I->click('Submit for publishing');
$I->seeInCurrentUrl('snapshot/edit');

// Add to group
$I->amOnPage(SnapshotBrowsePage::$URL);
$I->click('GapminderOrg', $modelContext);
$I->logout();

// Publish
$I->login('ola', 'test');
$I->amOnPage(SnapshotBrowsePage::$URL);
$I->see('Test snapshot');
$I->click('Publish');
$I->seeInCurrentUrl('snapshot/edit');

// Ensure item is visible
$I->amOnPage(SnapshotBrowsePage::$URL);
$I->click('View', $modelContext);
$I->dontSee('Error 404');
$I->logout();
$I->amOnPage(SnapshotBrowsePage::$URL);
$I->click('View', $modelContext);
$I->dontSee('Error 404');
