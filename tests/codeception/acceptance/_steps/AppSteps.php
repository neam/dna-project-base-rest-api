<?php
namespace WebGuy;

class AppSteps extends \WebGuy
{
    function amOnPage($page)
    {
        $I = $this;
        parent::amOnPage($page);
        $I->dontSeeInTitle("504 Gateway Time-out");
    }

}