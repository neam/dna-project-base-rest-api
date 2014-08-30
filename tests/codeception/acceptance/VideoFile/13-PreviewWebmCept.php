<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('create a video, attach a .webm video, and make sure it is rendered on the preview page. (Inactive)');

$I->login('max', 'test');
$videoTitle = '.webm Video';
$I->createVideoFile(
    array(
        'info' => array(
            VideoFileEditPage::$titleField => $videoTitle,
        ),
        'files' => array(
            VideoFileEditPage::$webmField => function () use ($I) {
                $I->uploadWebmFile();
            },
        ),
    )
);
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->seeVideoFile($videoTitle);
$I->click('Edit', VideoFileBrowsePage::modelContext($videoTitle));
$I->see($videoTitle, 'h1');
$I->click('Preview');
$I->seeInTitle('Preview');
$I->seeElement(VideoFileViewPage::$videoContainer);
