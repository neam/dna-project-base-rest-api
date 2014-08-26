<?php
namespace WebGuy;

class AppSteps extends \WebGuy
{

    use \Select2Trait;

    function amOnPage($page)
    {
        $I = $this;
        parent::amOnPage($page);
        $I->dontSeeInTitle("504 Gateway Time-out");
    }

    function switchLanguage($language)
    {
        $I = $this;
        $I->amGoingTo("switch language to $language");
        $I->executeInSmallScreen(function () use ($I) {
            $I->toggleMobileNavigation();
        });
        $I->waitForElementVisible(\HomePage::$languageMenu);
        $I->click(\HomePage::$languageMenu);
        $I->waitForText($language, 20, \HomePage::$languageMenu);
        $I->click($language, \HomePage::$languageMenu);
    }

    function seeFieldIsEmpty($field)
    {
        $I = $this;
        $I->amGoingTo("check that the field is empty");
        $I->seeInField($field, '');
    }

    /**
     * Toggles the navigation used by mobile layouts
     */
    function toggleMobileNavigation()
    {
        $I = $this;
        $I->amGoingTo("toggle the navigation");
        $I->click(\MobilePage::$navbarToggle);
    }

    function wantTo($text)
    {
        if ($this->haveASmallScreen()) {
            $text .= ' on a small screen';
        }
        parent::wantTo($text);
    }

}
