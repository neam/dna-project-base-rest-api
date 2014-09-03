<?php

trait I18nCatalogTrait
{
    function createI18nCatalog($stepAttributes)
    {
        $I = $this;
        $I->amGoingTo('create a new i18n catalog');
        $I->amOnPage(I18nCatalogBrowsePage::$URL);
        $I->click(I18nCatalogBrowsePage::$addButton);
        $I->fillItemStepPages(I18nCatalogEditPage::$steps, $stepAttributes);
    }
}
