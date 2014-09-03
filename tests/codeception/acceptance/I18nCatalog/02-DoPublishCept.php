<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('publish an i18n catalog');

$I->login('max', 'testtest');

$poContents = <<<EOD
# The context for chain here is \'metal\' (eg. a metal chain)
msgctxt "metal"
msgid "Chain"
msgstr ""

# The context for chain here is \'restaurant\' (eg. the restaurant chain)
msgctxt "restaurant"
msgid "Chain"
msgstr ""

EOD;

$modelContext = I18nCatalogBrowsePage::modelContext('Test i18n catalog');

// Prepare for publishing
$I->amOnPage(I18nCatalogBrowsePage::$URL);
$I->click('Prepare for Publishing', $modelContext);

// Slug and about are missing
$I->waitForText('2 required fields missing', 10);
$I->fillField(I18nCatalogEditPage::$slugField, 'todo-add-slugit-or-remove-slugs-from-i18n-catalog');
$I->fillField(I18nCatalogEditPage::$aboutField, 'This is used in API testing (clean-db)');
$I->click(I18nCatalogEditPage::$submitButton);
$I->waitForText('Submit for publishing', 10);
$I->click('Submit for publishing');
$I->seeInCurrentUrl(I18nCatalogEditPage::$URL);

// Add to group
$I->amOnPage(I18nCatalogBrowsePage::$URL);
$I->click('GapminderOrg', $modelContext);
$I->logout();

// Publish
$I->login('ola', 'testtest');
$I->amOnPage(I18nCatalogBrowsePage::$URL);
$I->see('Test i18n catalog');
$I->click('Publish');
$I->seeInCurrentUrl(I18nCatalogBrowsePage::$URL);

// Ensure item is visible
$I->amOnPage(I18nCatalogBrowsePage::$URL);
$I->click('View', $modelContext);
$I->dontSee('Error 404');
$I->logout();
$I->amOnPage(I18nCatalogBrowsePage::$URL);
$I->click('View', $modelContext);
$I->dontSee('Error 404');
