<?php

$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('upload a profile picture');
$I->login('max', 'test');

$I->amOnPage(ProfilePage::$URL);
$I->selectLanguages(array('Swedish', 'English'));
$I->click('Upload');
$I->switchToIFrame(UploadPopupPage::iframeName('profile-form'));
$I->attachFile(UploadPopupPage::$filesField, 'phundament.png');
$I->see('phundament.png');
$I->click(UploadPopupPage::$uploadButton);
$I->waitForElementNotVisible('.fileupload-progressbar', 10);
$I->switchToIFrame();
$I->click('Close');
$I->waitForText('Uploaded file');
$I->waitForElementNotVisible('#profile-form-modal', 30);
$I->waitForText('Save');
$I->click('Save');
$I->waitForText('Your account information has been updated.');
$I->seeSelect2OptionIsSelected('#Profile_picture_media_id', 'phundament.png');
