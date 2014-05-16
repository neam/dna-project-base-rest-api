<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('translate a video');

$I->login('max', 'test');
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->see('Max video');

$videoId = $I->getVideoId('Max video');
$I->click(VideoFileBrowsePage::addToGroupButton('Translators', $videoId));

$I->seeElementInDOM(VideoFileBrowsePage::removeFromGroupButton('Translators', $videoId));
$I->logout();


// Martha sees and edits the translation fields (as a role GROUP-TRANSLATOR and
// member in group Translators) into Portuguese = one of her 3 user.languages
// (She can not edit source-language)

$I->login('martha', 'test');

$I->amOnPage(ProfilePage::$URL);

// TODO: figure out how to click on select2 instead
$I->selectOption('#Profile_language1', 'Portuguese');
$I->pauseExecution();
$I->selectOption('#Profile_language2', 'Swedish');
$I->selectOption('#Profile_language3', 'English');
$I->click('Save');

$I->seeOptionIsSelected('#Profile_language1', 'Portuguese');
$I->seeOptionIsSelected('#Profile_language2', 'Swedish');
$I->seeOptionIsSelected('#Profile_language3', 'English');

$I->amOnPage(VideoFileBrowsePage::$URL);

$I->click('Edit', $I->specifyVideoContext($videoId));
