<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('edit a video I have previously created.');

$I->login('max', 'testtest');


// Create video
$I->createVideoFile(
    array(
        'info' => array(
            VideoFileEditPage::$titleField => 'Max vedio',
        ),
    )
);

$I->amOnPage(VideoFileBrowsePage::$URL);
$I->seeVideoFile('Max vedio');

$I->editVideoFile(
    'Max vedio',
    array(
        'info' => array(
            VideoFileEditPage::$titleField => 'Max video corrected',
        ),
    )
);

$I->amOnPage(VideoFileBrowsePage::$URL);
$I->seeVideoFile('Max video corrected');
