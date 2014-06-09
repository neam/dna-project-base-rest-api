<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('add a video to a group');

// Group member cannot see video
$I->login('mattias', 'test123');
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->dontSee('Max video');
$I->logout();


$videoContext = VideoFileBrowsePage::modelContext('Max video');


// Put video to group GapminderInternal
$I->login('max', 'test123');
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->see('Max video');
$I->click('GapminderInternal', $videoContext);
$I->logout();


// Group member can see video
$I->login('mattias', 'test123');
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->see('Max video');
$I->dontSee('Edit', $videoContext);


// Group contributor can create/edit own


// Group editor can edit all
