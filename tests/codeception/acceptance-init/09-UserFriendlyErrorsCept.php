<?php
$scenario->group('data:user-generated,coverage:full');
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that errors are shown in a user-friendly manner');

$I->amOnPage(SiteErrorPage::route('notice=1'));
//$I->waitForText('An error report has been sent to our technicians'); // TODO: Possible reactivate after being able to test in all languages
$I->dontSee('Stack Trace', 'div.traces');
$I->seeElement(SiteErrorPage::$backToHome);

$I->amOnPage(SiteErrorPage::route('warning=1'));
//$I->waitForText('An error report has been sent to our technicians'); // TODO: Possible reactivate after being able to test in all languages
$I->dontSee('Stack Trace', 'div.traces');
$I->seeElement(SiteErrorPage::$backToHome);

$I->amOnPage(SiteErrorPage::route('fatal=1'));
//$I->waitForText('An error report has been sent to our technicians'); // TODO: Possible reactivate after being able to test in all languages
$I->dontSee('Stack Trace', 'div.traces');
$I->seeElement(SiteErrorPage::$backToHome);
