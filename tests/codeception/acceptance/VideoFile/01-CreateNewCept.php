<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('create a video and make sure that only I see it.');

// Register users.
$I->registerGapminderStaff();

// Max logs in.
$I->login('max', 'test');

// Max creates a new video file.
$I->createVideoFile(
    array(
        'info' => array(
            VideoFileEditPage::$titleField => 'Max video',
        ),
    )
);

$I->amOnPage(VideoFileBrowsePage::$URL);
$I->seeVideoFile('Max video');
$I->logout();

$I->login('ola', 'test');
$I->dontSeeVideoFile('Max video');

