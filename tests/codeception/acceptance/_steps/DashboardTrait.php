<?php

trait DashboardTrait
{

    function gotoMyTasksPage()
    {
        /** @var \WebGuy\MemberSteps $I */
        $I = $this;
        $I->amOnPage(HomePage::$URL);
        $I->waitForText('My Tasks', 20, 'div.content');
        $I->click('My Tasks', 'div.content');
        $I->waitForText('Started Tasks', 20);
    }

}
