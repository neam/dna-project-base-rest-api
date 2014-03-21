<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('login and see result');
$I->login('admin', 'admin');
$I->see('Administrator Admin', 'h1.profile-heading');
