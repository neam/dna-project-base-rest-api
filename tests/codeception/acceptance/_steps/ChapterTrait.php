<?php

trait ChapterTrait
{

    function createChapter($stepAttributes)
    {
        $I = $this;
        $I->amGoingTo('create a new chapter');
        $I->amOnPage(ChapterBrowsePage::$URL);
        $I->click(ChapterBrowsePage::$addButton);
        $I->fillItemStepPages(ChapterEditPage::$steps, $stepAttributes);
    }

    function editChapter($title, $stepAttributes)
    {
        $I = $this;
        $I->amGoingTo('edit a existing chapter');
        $I->amOnPage(ChapterBrowsePage::$URL);
        $I->click(ChapterBrowsePage::$editButtonText, ChapterBrowsePage::modelContext($title));
        $I->fillItemStepPages(ChapterEditPage::$steps, $stepAttributes);
    }
}
