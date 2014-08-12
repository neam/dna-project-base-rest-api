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
     * Returns true if the current environment is a mobile one
     * @return bool
     */
    function isMobileEnv()
    {
        /** @var \Codeception\Scenario $scenario */
        $scenario = $this->scenario;
        return in_array('cms-saucelabs-iphone-7_1-portrait', $scenario->getEnv());
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

    /**
     * If env is mobile then the navigation will be toggled before executing the callback.
     * @param $callable
     */
    function executeInNavigation($callable)
    {
        $I = $this;
        if ($this->isMobileEnv()) {
            $I->toggleMobileNavigation();
        }
        $callable();
    }

}
