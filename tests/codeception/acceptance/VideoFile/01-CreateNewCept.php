<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('create a video and make sure that only I see it.');

// Max logs in.
$I->login('max', 'test123');

$subtitles = <<<EOD
1
00:00:03,399 --> 00:00:10,800
A common misunderstanding is that if we save all the poor children: the world will become overpopulated.

2
00:00:10,800 --> 00:00:13,599
This may sound logical, but it's wrong.

3
00:00:13,599 --> 00:00:16,199
Its the other way around!

4
00:00:16,199 --> 00:00:22,000
Saving the poor childrens lives is required to end population growth.
EOD;


// Max creates a new video file.
$I->createVideoFile(
    array(
        'info' => array(
            VideoFileEditPage::$titleField => 'Max video',
        ),
        'files' => array(
            VideoFileEditPage::$webmField => function () use ($I) {
                $I->uploadWebmFile();
            },
        ),
        'subtitles' => array(
            VideoFileEditPage::$subtitlesField => $subtitles,
        ),
    )
);

$I->amOnPage(VideoFileBrowsePage::$URL);
$I->seeVideoFile('Max video');
$I->click('View', VideoFileBrowsePage::modelContext('Max video'));

$I->seeElement(VideoFileViewPage::$videoContainer);
$I->dontSee(VideoFileViewPage::$noVideoMessage);
$I->logout();

$I->login('ola', 'test123');
$I->dontSeeVideoFile('Max video');
