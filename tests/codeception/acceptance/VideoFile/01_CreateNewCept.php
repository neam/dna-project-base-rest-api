<?php
/**
 * @var MemberSteps $I
 */
$I = new WebGuy($scenario);
$I->wantTo('perform actions and see result');

// register max
$I->register('max', 'test', 'test', 'max@gapminder.org', true);

// verify max is part of default groups
$I->amOnPage(ProfilePage::$URL);
$I->dontSee('You do not have any permissions assigned. Only administrators can assign permissions.');
// todo
$I->see();

// create new video file
// todo

// verify that only Max can see and edit
// todo