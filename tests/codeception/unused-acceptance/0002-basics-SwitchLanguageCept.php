<?php
$I = new WebGuy($scenario);
$I->wantTo('switch language');

// Switch language to german

$I->amOnPage('?r=site/index&lang=en');
$I->seeLink('en', '.dropdown-toggle');
$I->click('en');
$I->seeLink('Deutsch', '.dropdown-menu');
$I->click('Deutsch');
$I->seeLink('de', '.dropdown-toggle');
