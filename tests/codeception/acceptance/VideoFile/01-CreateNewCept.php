<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('perform actions and see result');

// Register users.
$I->registerGapminderStaff();

// Max logs in.
$I->login('max', 'test');

$I->pauseExecution();

// TODO verify that Max is part of default groups

// Max creates a new video file.
$I->createVideoFile('Max video');

// Verify that only Max can see his video.
$I->seeVideoFile('Max video');
$I->login('ola', 'test');
$I->dontSeeVideoFile('Max video');