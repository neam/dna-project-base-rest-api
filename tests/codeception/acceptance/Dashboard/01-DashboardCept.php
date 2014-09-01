<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('test the dashboard');

$I->login('martha', 'testtest');
$I->selectLanguages(array('Portuguese', 'Swedish', 'English'));
$I->gotoMyTasksPage();
$I->see('Started Tasks (0)');
$I->see('New Tasks (3)'); // one per language
$I->logout();

$I->login('max', 'testtest');
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
$I->createVideoFile(
    array(
        'info' => array(
            VideoFileEditPage::$titleField => 'Dashboard test video',
        ),
        'subtitles' => array(
            VideoFileEditPage::$subtitlesField => $subtitles,
        ),
    )
);
$I->amOnPage(VideoFileBrowsePage::$URL);
$I->click('Translators', VideoFileBrowsePage::modelContext('Dashboard test video'));
$I->logout();

$I->login('martha', 'testtest');
$I->gotoMyTasksPage();

$I->see('Started Tasks (0)');
$I->see('New Tasks (6)'); // one per language
$I->see(DashboardPage::$startTaskButton);
$I->dontSee(DashboardPage::$continueTaskButton);

$I->click(
    DashboardPage::$startTaskButton,
    DashboardPage::translateModelContext('Dashboard test video', 'VideoFile', 'pt')
);

$I->click('Stop Translating');
$I->gotoMyTasksPage();
$I->see('Started Tasks (0)');
$I->see('New Tasks (6)');

$I->click(
    DashboardPage::$startTaskButton,
    DashboardPage::translateModelContext('Dashboard test video', 'VideoFile', 'pt')
);

$I->fillField(VideoFileEditPage::$titleFieldPt, 'Vídeo de teste do Dashboard');
$I->click(VideoFileEditPage::$submitButton);
$I->gotoMyTasksPage();
// This is how it currently works, task in JIRA: https://gapminder.atlassian.net/browse/CMS-923
$I->see('Started Tasks (3)');
$I->see('New Tasks (3)');
