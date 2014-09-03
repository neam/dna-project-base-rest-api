<?php

trait DashboardTrait
{

    function gotoMyTasksPage()
    {
        /** @var \WebGuy\MemberSteps $I */
        $I = $this;
        $I->amOnPage(HomePage::$URL);
        $I->waitForText('My Tasks', 20, '.content');
        $I->click('My Tasks', '.content');
        $I->waitForText('Started Tasks', 20);
    }

}
