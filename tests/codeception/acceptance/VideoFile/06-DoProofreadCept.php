<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);


// Suggest proofread
$I->wantTo('suggest a video for proofreading');
// Max think the video is good enough to make it publicly reviewable,
// he suggest it to be proofread Suggest to group: VideoProofreaders,
// so group GROUP-MODERATORs in that group sees suggestion



// Ask for proofreading

// Ola accept suggestion = puts(as GROUP-MODERATOR in target) in group: Proofreaders


// Actual proofreading

// Some guy in Australia read it and comments on the language.
// Jack (as GROUP-REVIEWER in group VideoProofreaders) can comment & rate (thumbs up) each field.


// Remove user from group and disable user

// Ola realizes the proofreader is a Gapminder enemy and disable the user.
// as GROUP-MODERATOR of videoProofreaders, remove user from group
// as SUPERADMIN of CMS, disable user from logging in (with a comment)


// Realize video is proofread

// Ola or Max(GROUP-REVIEWER) conclude the video is proofread (by a nicer user),
// by seeing 100% proofread status, and reading the comments.
