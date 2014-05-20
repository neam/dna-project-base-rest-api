<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('create a video and make sure that only I see it.');

// Max logs in.
$I->login('max', 'test');

// Max creates a new video file.
$I->createVideoFile(
    array(
        'info' => array(
            VideoFileEditPage::$titleField => 'Max video',
        ),
        'files' => array(
            VideoFileEditPage::$webmField => function () use ($I) {
                $modalContext = '#item-form-webm-modal';
                $I->click('Upload new', '.webm');
                $I->waitForElementVisible($modalContext, 30);
                $I->switchToIFrame('item-form-webm-upload-iframe');
                $I->attachFile('input[name="files[]"]', 'big-buck-bunny_trailer.webm');
                $I->see('big-buck-bunny_trailer.webm');
                $I->click('.start .ui-button');
            },
        ),
    )
);

$I->amOnPage(VideoFileBrowsePage::$URL);
$I->seeVideoFile('Max video');
$I->logout();

$I->login('ola', 'test');
$I->dontSeeVideoFile('Max video');
