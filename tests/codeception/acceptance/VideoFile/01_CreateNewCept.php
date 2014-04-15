<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

// Register max
$I->register('max', 'test', 'test', 'max@gapminder.org', true);
$I->login('max', 'test');

// TODO verify that Max is part of default groups

$I->amOnPage(VideoFileBrowsePage::$URL);
$I->click(VideoFileBrowsePage::$addButton);

// TODO create new video file

// TODO verify that only Max can see and edit the video file

$I->register('ola', 'test', 'test', 'ola@gapminder.org', true);
$I->login('ola', 'test');

$I->register('mattias', 'test', 'test', 'mattias@gapminder.org', true);
$I->login('mattias', 'test');

$I->register('julia', 'test', 'test', 'julia@gapminder.org', true);
$I->login('julia', 'test');

$I->register('fernanda', 'test', 'test', 'fernanda@gapminder.org', true);
$I->login('fernanda', 'test');
