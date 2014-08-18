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
        $I->click('.navbar .language-menu');
        $I->click($language, '.navbar .language-menu');
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

}
