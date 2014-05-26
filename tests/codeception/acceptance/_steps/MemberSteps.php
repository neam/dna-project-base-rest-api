<?php
namespace WebGuy;

use Account;
use AccountAdminPage;
use AccountViewPage;
use Exception;
use HomePage;
use ItemEditPage;
use LoginPage;
use RegistrationPage;
use Symfony\Component\CssSelector\CssSelector;
use UploadPopupPage;
use VideoFileBrowsePage;
use VideoFileEditPage;

class MemberSteps extends AppSteps
{

    public $staff = array(
        array(
            'name' => 'ola',
            'password' => 'test',
            'email' => 'dev+ola@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupAdministrator'),
            ),
        ),
        array(
            'name' => 'max',
            'password' => 'test',
            'email' => 'dev+max@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupModerator'),
            ),
        ),
        array(
            'name' => 'ferdanda',
            'password' => 'test',
            'email' => 'dev+ferdanda@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupEditor'),
            ),
        ),
        array(
            'name' => 'julia',
            'password' => 'test',
            'email' => 'dev+julia@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupContributor'),
            ),
        ),
        array(
            'name' => 'mattias',
            'password' => 'test',
            'email' => 'dev+mattias@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupMember'),
            ),
        ),
    );

    public $externalUsers = array(
        array(
            'name' => 'jack',
            'password' => 'test',
            'email' => 'jack@example.com',
            'groupRoles' => array(
                'Proofreaders' => array('GroupReviewer'),
            ),
        ),
        array(
            'name' => 'martha',
            'password' => 'test',
            'email' => 'martha@example.com',
            'groupRoles' => array(
                'Translators' => array('GroupTranslator'),
            ),
        ),
    );

    function findAccountByUsername($username)
    {
        $account = Account::model()->findByAttributes(array('username' => $username));
        if ($account === null) {
            throw new Exception('Failed to find account with username "$username".');
        }
        return $account;
    }

    function login($username, $password)
    {
        $I = $this;
        $I->amOnPage(LoginPage::$URL);
        $I->fillField(LoginPage::$usernameField, $username);
        $I->fillField(LoginPage::$passwordField, $password);
        $I->click(LoginPage::$submitButton);
    }

    function logout()
    {
        $I = $this;
        $I->amOnPage(HomePage::$URL);
        $I->click(HomePage::$accountMenuLink);
        $I->click(HomePage::$logoutLink);
    }

    function register($username, $password, $verifyPassword, $email, $acceptTerms = true)
    {
        $I = $this;
        $I->amOnPage(RegistrationPage::$URL);
        $I->fillField(RegistrationPage::$usernameField, $username);
        $I->fillField(RegistrationPage::$passwordField, $password);
        $I->fillField(RegistrationPage::$verifyPasswordField, $verifyPassword);
        $I->fillField(RegistrationPage::$emailField, $email);
        $acceptTerms
            ? $I->checkOption(RegistrationPage::$acceptTermsField)
            : $I->uncheckOption(RegistrationPage::$acceptTermsField);

        $I->wait(1); // TODO: set a success/error class on the form to watch on instead
        $I->click(RegistrationPage::$submitButton);

        if ($this->scenario->running()) {
            $I->waitForText('Thank you for your registration.', 30); // secs
        }

        // TODO activate account using mailcatcher
    }

    function registerUsers(array $users)
    {
        $I = $this;

        foreach ($users as $person) {
            $I->register($person['name'], $person['password'], $person['password'], $person['email']);
        }


        $I->login('admin', 'admin');

        foreach ($users as $person) {
            $I->activateMember($person['name']);
            foreach ($person['groupRoles'] as $groupName => $rolesNames) {
                foreach ($rolesNames as $roleName) {
                    $I->toggleGroupRole($person['name'], $groupName, $roleName);
                }
            }
        }

        $I->logout();
    }

    function registerGapminderStaff()
    {
        $this->registerUsers($this->staff);
    }

    function registerExternalUsers()
    {
        $this->registerUsers($this->externalUsers);
    }

    function createVideoFile($stepAttributes)
    {
        $I = $this;
        $I->amOnPage(VideoFileBrowsePage::$URL);
        $I->click(VideoFileBrowsePage::$addButton);
        $this->fillVideoFileStepPages($stepAttributes);
    }

    function editVideoFile($title, $stepAttributes)
    {
        $I = $this;
        $I->amGoingTo('edit the video-file ' . $title);
        $I->amOnPage(VideoFileBrowsePage::$URL);
        $I->click('Edit', VideoFileBrowsePage::modelContext($title));
        $I->fillVideoFileStepPages($stepAttributes);
    }

    /**
     * Fills attributes on the videoFile editing pages.
     * I must be on the first page of editing/creating video before calling this method!
     * @param $stepAttributes
     */
    function fillVideoFileStepPages($stepAttributes)
    {
        $I = $this;
        foreach (VideoFileEditPage::$steps as $step) {
            $attributes = isset($stepAttributes[$step]) ? $stepAttributes[$step] : array();
            $I->fillFieldsOnPageAndSubmit($attributes);
        }
    }

    /**
     * Fills fields on the current page and submits
     *
     *
     * @param $attributes array associative array with structure: field-selector => value.
     * Value can be a anonymous function, or a scalar. If not a callable then fillField will be used
     *
     * @param $submit (optional) defaults to \ItemEditPage::$submitButton
     */
    function fillFieldsOnPageAndSubmit(array $attributes, $submit = null)
    {
        $I = $this;

        if (empty($submit)) {
            $submit = ItemEditPage::$submitButton;
        }

        foreach ($attributes as $id => $value) {

            // Support for anonymous functions when needed more than just fillField, eg multiple steps in file upload
            is_callable($value)
                ? $value()
                : $I->fillField($id, $value);
        }

        $I->click($submit);
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

    function activateMember($username)
    {
        $I = $this;
        $I->amOnPage(AccountAdminPage::$URL);
        $I->click(AccountAdminPage::generateActivateLinkSelector($username));
    }

    function toggleGroupRole($username, $group, $role)
    {
        $I = $this;
        $I->amOnPage(AccountAdminPage::$URL);
        $I->click(AccountAdminPage::generateViewLinkSelector($username));
        $I->click(AccountViewPage::generateToggleGroupRoleLinkSelector($group, $role));
    }

    function generateSelect2Selector($selectId)
    {
        // substr removes the hash-sign from the select-id
        $id = substr($selectId, 1, strlen($selectId) - 1);
        return '#s2id_' . $id;
    }

    /**
     * result of generateSelect2Selector + rest, where rest is:
     * if multiple: ul.select2-choices
     * if not multiple: a.select2-choice
     * @param string $selectElementId id of the select-element (not select2)
     * @param bool $multiple whether multiple choices can be selected
     * @return string
     */
    function generateSelect2ChoiceSelector($selectElementId, $multiple = false)
    {
        $append = ($multiple) ? ' .select2-choices' : ' .select2-choice';
        return $this->generateSelect2Selector($selectElementId) . $append;
    }

    /**
     * result of generateSelect2ChoiceSelector + rest, where rest is:
     * if multiple: li.select2-search-choice
     * if not multiple: span.select2-chosen (the selection as string can be read from this element)
     * @param string $selectElementId id of the select-element (not select2)
     * @param bool $multiple whether multiple choices can be selected
     * @return string
     */
    function generateSelect2ChosenSelector($selectElementId, $multiple = false)
    {
        $append = ($multiple) ? ' .select2-search-choice' : ' .select2-chosen';
        return $this->generateSelect2ChoiceSelector($selectElementId, $multiple) . $append;
    }

    function unselectSelect2Option($field, $option)
    {
        $I = $this;

        if (!is_array($option)) {
            $I->unselectOption($field, $option);
            return;
        }

        $css = $I->generateSelect2ChosenSelector($field, $multiple = true);

        $xpath = CssSelector::toXPath($css);

        foreach ($option as $opt) {
            $xpath .= "/div[contains(text(), '$opt')]/../" . CssSelector::toXPath('a.select2-search-choice-close');
            $I->click($xpath);
            $I->waitForElementNotVisible($xpath);
        }

        $I->dontSeeSelect2OptionIsSelected($field, $option);
    }

    /**
     * Checks if the option(s) is selected
     * @param $selectId
     * @param $option
     * @param bool $dont use dontSeeSelect2OptionIsSelected() instead of using this argument
     */
    function seeSelect2OptionIsSelected($selectId, $option, $dont = false)
    {
        $I = $this;

        if ($dont) {
            $I->amGoingTo('see option is not selected');
        } else {
            $I->amGoingTo('see option is selected');
        }

        $isMultiple = is_array($option);

        $selector = $I->generateSelect2ChosenSelector($selectId, $isMultiple);

        if (!$isMultiple) {
            $option = array($option);
        }

        foreach ($option as $opt) {
            ($dont)
                ? $I->dontSee($opt, $selector)
                : $I->see($opt, $selector);
        }
    }

    /**
     * Checks if the option(s) is selected
     * @param $selectId
     * @param $option
     */
    function dontSeeSelect2OptionIsSelected($selectId, $option)
    {
        return $this->seeSelect2OptionIsSelected($selectId, $option, true);
    }

    /**
     * Selects a option and then waits that the select2-widget bound to it changes its value (no assertion)
     * @param string $selectId id of the select-element (not select2)
     * @param string|array $option the option to be selected. Can be array of options to select multiple
     */
    function selectSelect2Option($selectId, $option)
    {
        $I = $this;

        $I->amGoingTo('select options using a select2 widget');

        $multiple = is_array($option);

        if (!$multiple ) {
            $option = array($option);
        }

        $select2ClickableSelector = $I->generateSelect2ChoiceSelector($selectId, $multiple);

        foreach ($option as $opt) {
            // Opens options
            $I->click($select2ClickableSelector);

            $css = ".select2-drop-active .select2-results .select2-result";
            $xpath = CssSelector::toXPath($css);
            $xpath .= "/div[contains(text(), '$opt')]";

            // Click the result
            $I->click($xpath);
        }
    }

    function addGroupRoleToAccount($username, $group, $role)
    {
        $I = $this;
        $I->login('admin', 'admin');
        $I->amOnPage(AccountAdminPage::$URL);
        $I->click(AccountAdminPage::generateViewLinkSelector($username));
        $I->see($username, 'h1');
        $I->click(AccountViewPage::generateToggleGroupRoleLinkSelector($group, $role));
        $I->logout();
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

        $I->click('Upload new', VideoFileEditPage::$webmUploadNewContext);

        $I->waitForElementVisible(VideoFileEditPage::$webmModalId, 30);

        // Modal content is in iframe
        $iframe = UploadPopupPage::iframeName(VideoFileEditPage::$webmModalFormId);
        $I->switchToIFrame($iframe);
        $I->attachFile(UploadPopupPage::$filesField, $file);
        $I->see($file);
        $I->click(UploadPopupPage::$uploadButton);
        // Switch back to parent page
        $I->switchToIFrame();

        $I->waitForElementNotVisible('#item-form-modal', 30);
        $I->waitForElementVisible(VideoFileEditPage::$submitButton);
        $I->waitForText('Uploaded file', 10, $I->generateSelect2ChosenSelector(VideoFileEditPage::$webmField));
        $I->seeSelect2OptionIsSelected(VideoFileEditPage::$webmField, 'Uploaded file');
    }

    function selectRelated($field, array $items)
    {
        $I = $this;
        $I->amGoingTo('select related items');
        $I->selectSelect2Option($field, $items);
        $I->seeSelect2OptionIsSelected($field, $items);
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

    function gotoStep($step, $steps, $submit = null)
    {
        $I = $this;

        if (empty($submit)) {
            $submit = ItemEditPage::$submitButton;
        }

        // times to submit to get to step
        $times = array_search($step, $steps);

        for ($index = 0; $index < $times; $index++) {
            $I->click($submit);
        }
    }

    function removeRelated($field, array $items)
    {
        $I = $this;
        $I->amGoingTo('remove related items');
        $I->unselectSelect2Option($field, $items);
    }

}
