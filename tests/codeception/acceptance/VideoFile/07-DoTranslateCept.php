<?php

// Martha sees and edits the translation fields (as a role GROUP-TRANSLATOR and
// member in group Translators) into Portuguese = one of her 3 user.languages
// (She can not edit source-language)

$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('translate a video');

$I->addGroupRoleToAccount('martha', 'Translators', 'GroupTranslator');

$I->login('martha', 'test');
$I->amOnPage(ProfilePage::$URL);

$I->selectSelect2Option('#Profile_language1', 'Portuguese');
$I->selectSelect2Option('#Profile_language2', 'Swedish');
$I->selectSelect2Option('#Profile_language3', 'English');
$I->click('Save');

$I->waitForText('Your account information has been updated.');

$I->seeSelect2OptionIsSelected('#Profile_language1', 'Portuguese');
$I->seeSelect2OptionIsSelected('#Profile_language2', 'Swedish');
$I->seeSelect2OptionIsSelected('#Profile_language3', 'English');

$I->amOnPage(VideoFileBrowsePage::$URL);
$I->dontSee('Max video');
$I->logout();


$I->login('max', 'test');
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->see('Max video');

$videoContext = VideoFileBrowsePage::modelContext('Max video');

$I->click('Translators', $videoContext);
$I->logout();


$I->login('martha', 'test');
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->see('Max video');

// Translate the video
$I->click('Translate', $videoContext);
$I->click('Translate into Portuguese');

// Source language texts can not be edited
$I->dontSeeElementInDOM(VideoFileEditPage::$titleField);
// Test that the field is empty (had issues with field being set to the original language attribute value)
$I->seeFieldIsEmpty(VideoFileTranslatePage::titleField('pt'));
$I->fillField(VideoFileTranslatePage::titleField('pt'), 'Video Max');

// TODO: translate some subtitles
