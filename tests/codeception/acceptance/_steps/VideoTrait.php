<?php

trait VideoTrait
{
    function createVideoFile($stepAttributes)
    {
        $I = $this;
        $I->amGoingTo('create a new video');
        $I->amOnPage(VideoFileBrowsePage::$URL);
        $I->click(VideoFileBrowsePage::$addButton);
        $I->fillItemStepPages(VideoFileEditPage::$steps, $stepAttributes);
    }

    function editVideoFile($title, $stepAttributes)
    {
        $I = $this;
        $I->amGoingTo('edit a existing video');
        $I->amOnPage(VideoFileBrowsePage::$URL);
        $I->click(VideoFileBrowsePage::$editButtonText, VideoFileBrowsePage::modelContext($title));
        $I->fillItemStepPages(VideoFileEditPage::$steps, $stepAttributes);
    }

    function seeVideoFile($title)
    {
        $I = $this;
        $I->amOnPage(VideoFileBrowsePage::$URL);
        $I->see($title, 'h2');
    }

    function dontSeeVideoFile($title)
    {
        $I = $this;
        $I->amOnPage(VideoFileBrowsePage::$URL);
        $I->dontSee($title, 'h2');
    }

    function seeVideoRelatedItems($title, $items)
    {
        $I = $this;
        $I->expectTo('see a video has related items');
        $I->amOnPage(VideoFileBrowsePage::$URL);
        $I->click('Edit', VideoFileBrowsePage::modelContext($title));
        $I->gotoStep('related', VideoFileEditPage::$steps);
        $I->seeSelect2OptionIsSelected(VideoFileEditPage::$relatedField, $items);
    }

    /**
     * Uploads a videofile using attachFile (file must be in _data).
     * I must be on correct page before calling this method (ie does not change page)
     * @param string $file
     */
    function uploadWebmFile($file = 'big-buck-bunny_trailer.webm')
    {
        $I = $this;

        $I->amGoingTo('upload a webm-file');

        $I->click('Upload', VideoFileEditPage::$webmUploadNewContext);

        $I->waitForElementVisible(VideoFileEditPage::$webmModalId, 30);

        // Modal content is in iframe
        $iframe = UploadPopupPage::iframeName(VideoFileEditPage::$webmModalFormId);
        $I->switchToIFrame($iframe);
        $I->attachFile(UploadPopupPage::$filesField, $file);
        $I->see($file);
        $I->click(UploadPopupPage::$uploadButton);
        $I->waitForElementNotVisible('.fileupload-progressbar', 10);

        // Workaround due to switchToIFrame() not working in Chrome Saucelabs (and we have yet to make the other tests pass in other browsers)
        if (false) {
            // Switch back to parent page
            $I->switchToIFrame();
            $I->click('Close');
            $I->waitForElementNotVisible('#item-form-modal', 30);
            $I->waitForText('Uploaded file', 10, $I->generateSelect2ChosenSelector(VideoFileEditPage::$webmField));
            $I->seeSelect2OptionIsSelected(VideoFileEditPage::$webmField, 'Uploaded file');
        } else {
            $I->reloadPage();
            $I->amOnPage(ProfilePage::$URL);
            $I->selectSelect2Option(VideoFileEditPage::$webmField, $file);
        }

        $I->waitForElementVisible(VideoFileEditPage::$submitButton);
    }
}
