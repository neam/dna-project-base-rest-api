<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('create a new i18n catalog');

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

$I->createI18nCatalog(
    array(
        'info' => array(
            I18nCatalogEditPage::$titleField => 'Test i18n catalog',
        ),
        'i18n' => array(
            I18nCatalogEditPage::$i18nCategoryField => 'foo-category',
            I18nCatalogEditPage::$poContentsField => $poContents,
        ),
    )
);

$I->amOnPage(I18nCatalogBrowsePage::$URL);
$I->see('Test i18n catalog');
