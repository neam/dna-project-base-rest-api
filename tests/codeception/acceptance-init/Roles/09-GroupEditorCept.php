<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('prepare a item for publishing');

/*
 * Can edit everything in the group and see items suggested to group
 */
$I->login('editor', 'testtest');

$I->amOnPage(MyTasksPage::$URL);
$I->click('Browse...');
$I->click('Snapshots');

$I->see('Sample Snapshot');
$I->click(
    SnapshotBrowsePage::$prepareForPublishingButtonText,
    SnapshotBrowsePage::modelContext('Sample Snapshot')
);

// Thumbnail and vizabi state is missing
$I->waitForText('2 required fields missing', 10);
$I->executeJS('window.scrollTo(0,0);'); // Workaround for WebDriver issue where the element is not fully scrolled into view because of an overlaying top/bottom navigation - see https://stackoverflow.com/questions/23458359/codeception-acceptance-test-fails-because-of-bottom-navigation/24852007#24852007
$I->click(SnapshotEditPage::$goToNextFieldButton);

// Thumbnail - Select existing uploaded file
$I->selectSelect2Option(SnapshotEditPage::$thumbnailField, 'phundament.png');
$I->seeSelect2OptionIsSelected(SnapshotEditPage::$thumbnailField, 'phundament.png');

// Vizabi state is missing
// TODO: Make the required field count update dynamically
//$I->waitForText('1 required field missing', 10);
//$I->executeJS('window.scrollTo(0,0);'); // Workaround for WebDriver issue where the element is not fully scrolled into view because of an overlaying top/bottom navigation - see https://stackoverflow.com/questions/23458359/codeception-acceptance-test-fails-because-of-bottom-navigation/24852007#24852007
//$I->click(SnapshotEditPage::$goToNextFieldButton);
$submit = ItemEditPage::$submitButton;
$I->click($submit);

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
$I->seeInCurrentUrl(SnapshotEditPage::$URL);
$I->amOnPage(SnapshotBrowsePage::$URL);
$I->dontSee('Prepare for Publishing', SnapshotBrowsePage::modelContext('Sample Snapshot'));
