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
        // This global is set in _bootstrap.php by us
        global $running_env;

        return in_array(
            $running_env,
            array(
                'cms-saucelabs-iphone-7_1-portrait',
                'cms-saucelabs-iphone-7_1-portrait-appium-1_2',
            )
        );
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
