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


// Thumbnail and vizabi state is missing
$I->waitForText('2 required fields missing', 10);
$I->executeJS('window.scrollTo(0,0);'); // Workaround for WebDriver issue where the element is not fully scrolled into view because of an overlaying top/bottom navigation - see https://stackoverflow.com/questions/23458359/codeception-acceptance-test-fails-because-of-bottom-navigation/24852007#24852007
$I->click(SnapshotEditPage::$goToNextFieldButton);

// Temp: Upload instead of selecting existing uploaded file
$I->click('Upload');
$I->switchToIFrame(UploadPopupPage::iframeName('item-form'));
$I->attachFile(UploadPopupPage::$filesField, 'phundament.png');
$I->see('phundament.png');
$I->click(UploadPopupPage::$uploadButton);
$I->waitForElementNotVisible('.fileupload-progressbar', 10);
$I->switchToIFrame();
$I->click('Close');
$I->waitForText('Uploaded file');
$I->waitForElementNotVisible('#item-form-modal', 30);

// TODO: Select existing uploaded file instead of uploading anew above
//$I->fillField(SnapshotEditPage::$thumbnailField, 'phundament.png');
//$I->seeSelect2OptionIsSelected('#Profile_picture_media_id', 'phundament.png');

// Vizabi state is missing
$I->waitForText('1 required field missing', 10);
$I->executeJS('window.scrollTo(0,0);'); // Workaround for WebDriver issue where the element is not fully scrolled into view because of an overlaying top/bottom navigation - see https://stackoverflow.com/questions/23458359/codeception-acceptance-test-fails-because-of-bottom-navigation/24852007#24852007
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
