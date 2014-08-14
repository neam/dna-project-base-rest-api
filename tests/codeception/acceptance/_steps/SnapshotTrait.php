<?php

trait SnapshotTrait
{
    function createSnapshot($stepAttributes)
    {
        $I = $this;
        $I->amGoingTo('create a new snapshot');
        $I->amOnPage(SnapshotBrowsePage::$URL);
        $I->click(SnapshotBrowsePage::$addButton);
        $I->fillItemStepPages(SnapshotEditPage::$steps, $stepAttributes);
    }
}
