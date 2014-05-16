<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('add a video to a group');

// Group member cannot see video
$I->login('mattias', 'test');
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->dontSee('Max video');
$I->logout();


// Put video to group GapminderInternal
$I->login('max', 'test');
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->see('Max video');
$videoId = $I->getVideoId('Max video');
$I->click(VideoFileBrowsePage::addToGroupButton('GapminderInternal', $videoId));
$I->logout();


// Group member can see video
$I->login('mattias', 'test');
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->see('Max video');
$I->dontSee('Edit', $I->specifyVideoContext($videoId));


// Group contributor can create/edit own


// Group editor can edit all
