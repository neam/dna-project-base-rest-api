<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('test that sneak peeks are visible on the homepage for registered users');

$I->login('max', 'testtest');
$I->createVideoFile(
    array(
        'info' => array(
            VideoFileEditPage::$titleField => 'Sneak Peek video',
            VideoFileEditPage::$aboutField => 'Work in progress video',
            VideoFileEditPage::$thumbnailField => function () use ($I) {
                $I->selectSelect2Option(
                    VideoFileEditPage::$thumbnailField,
                    'phundament.png'
                );
            },
        ),
        'files' => array(
            VideoFileEditPage::$webmField => function () use ($I) {
                $I->uploadWebmFile();
            },
        ),
    )
);

$I->logout();


$I->login('member', 'testtest');
$I->am('member');
$I->amOnPage(HomePage::$URL);
$I->dontSee('Sneak Peek video');
$I->logout();


$I->amOnPage(HomePage::$URL);
$I->dontSee('Sneak Peek video');

$I->login('max', 'testtest');
$I->amOnPage(HomePage::$URL);
$I->dontSee('Sneak Peek video');

$I->amOnPage(VideoFileBrowsePage::$URL);
$I->addItemToGroup('SneakPeeks', VideoFileBrowsePage::modelContext('Sneak Peek video'));

$I->amOnPage(HomePage::$URL);
$I->waitForText('Sneak Peek video', 20, HomePage::$sneakPeeks);
$I->see('Sneak Peek video', HomePage::$sneakPeeks);
$I->click('Preview', HomePage::$sneakPeeks);
$I->seeInTitle('Preview');
$I->seeElement(VideoFileViewPage::$videoContainer);
$I->see('Sneak Peek video', 'h1');

$I->logout();

$I->amOnPage(HomePage::$URL);
$I->dontSee('Max video');

$I->login('member', 'testtest');
$I->amOnPage(HomePage::$URL);
$I->waitForText('Sneak Peek video', 20, HomePage::$sneakPeeks);
$I->see('Sneak Peek video', HomePage::$sneakPeeks);
$I->click('Preview', HomePage::$sneakPeeks);
$I->seeInTitle('Preview');
$I->seeElement(VideoFileViewPage::$videoContainer);
$I->see('Sneak Peek video', 'h1');
$I->logout();
