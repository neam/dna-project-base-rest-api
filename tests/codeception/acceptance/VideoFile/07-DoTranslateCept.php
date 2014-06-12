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

$I->amOnPage(ProfilePage::$URL);

$I->seeSelect2OptionIsSelected('#Profile_language1', 'Portuguese');
$I->seeSelect2OptionIsSelected('#Profile_language2', 'Swedish');
$I->seeSelect2OptionIsSelected('#Profile_language3', 'English');

$I->amOnPage(VideoFileBrowsePage::$URL);
$I->dontSee('Max video');
$I->logout();


$I->login('max', 'test');
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->see('Max video');

// The last blank line in subtitles is significant
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

$I->editVideoFile(
    'Max video',
    array(
        'subtitles' => array(
            VideoFileEditPage::$subtitlesField => $subtitles,
        ),
    )
);

$I->amOnPage(VideoFileBrowsePage::$URL);

$videoContext = VideoFileBrowsePage::modelContext('Max video');

$I->amGoingTo('add "Max video" to the group "Translators"');
$I->click('Translators', $videoContext);
$I->logout();

$I->amGoingTo('login as Martha and translate "Max video" into portuguese');
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
$I->fillField(VideoFileTranslatePage::titleField('pt'), 'Vídeo Max');
$I->click(VideoFileTranslatePage::$submitButton);

$I->fillField(
    "A common misunderstanding is that if we save all the poor children: the world will become overpopulated.",
    "Um equívoco comum é que, se salvar todas as crianças pobres: o mundo vai se tornar superpovoado."
);

$I->fillField("This may sound logical, but it's wrong.", "Isto pode parecer lógico, mas é errado.");

$I->fillField("Its the other way around!", "É o contrário!");

$I->fillField(
    "Saving the poor childrens lives is required to end population growth.",
    "Salvando as crianças pobres vive é necessário para acabar com o crescimento da população."
);

$I->click(VideoFileTranslatePage::$submitButton);
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->see('Max video');
$I->dontSee('Vídeo Max');
$I->switchLanguage('Português');
$I->dontSee('Max video');
$I->see('Vídeo Max');
/*
$I->switchLanguage('English');

$I->click('View', $videoContext);
$I->click(VideoFileViewPage::$videoContainer);

$I->waitForText("A common misunderstanding is that if we save all the poor children: the world will become overpopulated.", 10);

$I->switchLanguage('Português');
$I->click(VideoFileViewPage::$videoContainer);
$I->waitForText("Um equívoco comum é que, se salvar todas as crianças pobres: o mundo vai se tornar superpovoado.", 10);
*/
