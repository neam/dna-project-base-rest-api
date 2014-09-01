<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->am('a authenticated user');
$I->wantTo('create a item and edit it');


/*
 * Default role when logged in, can edit own items
 */
$I->login('authenticated', 'testtest');

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
