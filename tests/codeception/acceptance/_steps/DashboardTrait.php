<?php

trait DashboardTrait
{

    function gotoMyTasksPage()
    {
        $I = $this;
        $I->amOnPage(HomePage::$URL);
        $I->waitForText('My Tasks', 20);
        $I->click('My Tasks');
        $I->waitForText('Started Tasks', 20);
    }

} 
