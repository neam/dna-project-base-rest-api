<?php
namespace WebGuy;

use Account;
use AccountAdminPage;
use AccountViewPage;
use Exception;
use HomePage;
use LoginPage;
use RegistrationPage;
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

        $I->wait(1);
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
            $names[] = $person['name'];
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
     * @param $attributes
     * @param $submit (optional) defaults to \ItemEditPage::$submitButton
     */
    function fillFieldsOnPageAndSubmit(array $attributes, $submit = null)
    {
        $I = $this;

        if (empty($submit)) {
            $submit = \ItemEditPage::$submitButton;
        }

        foreach ($attributes as $id => $value) {

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

    function selectSelect2Option($selectId, $option)
    {
        $I = $this;

        $I->selectOption($selectId, $option);

        $select2ChosenSelector = '#s2id_' . substr($selectId, 1, strlen($selectId) - 1) . ' .select2-choice';

        $I->waitForElementChange($select2ChosenSelector, function (\WebDriverElement $element) use ($option) {
            return $element->getText() === $option;
        }, 10);

    }

    function seeSelect2OptionIsSelected($selectId, $option)
    {
        $I = $this;
        if ($selectId[0] === '#') {
            $selectId = substr($selectId, 1, strlen($selectId) - 1);
        }
        $selector = '#s2id_' . $selectId . ' .select2-choice .select2-chosen';
        $I->see($option, $selector);
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


}
