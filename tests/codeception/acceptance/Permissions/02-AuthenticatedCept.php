<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->am('a authenticated user');
$I->wantTo('perform actions and see result');

$I->login('authenticated', 'test');

$I->createChapter(
    array(
        'info' => array(
            ChapterEditPage::$titleField => 'My own chapter',
        ),
    )
);

$I->editChapter(
    'My own chapter',
    array(
        'info' => array(
            ChapterEditPage::$aboutField => 'I dont know what this story will be about yet.',
        ),
    )
);
