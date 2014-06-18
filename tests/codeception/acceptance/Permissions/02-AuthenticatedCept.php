<?php
$scenario->group('data:clean-db');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

$I->registerUser(
    array(
        'name' => 'authenticated',
        'password' => 'test',
        'email' => 'dev+authenticated@gapminder.org',
        'groupRoles' => array(),
    )
);

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
