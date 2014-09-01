<?php

trait UsersTrait
{

    public $groupUsers = array(
        array(
            'name' => 'authenticated',
            'password' => 'testtest',
            'email' => 'dev+authenticated@gapminder.org',
            'groupRoles' => array(),
        ),
        array(
            'name' => 'member',
            'password' => 'testtest',
            'email' => 'dev+member@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupMember')),
        ),
        array(
            'name' => 'translator',
            'password' => 'testtest',
            'email' => 'dev+translator@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupTranslator')),
        ),
        array(
            'name' => 'reviewer',
            'password' => 'testtest',
            'email' => 'dev+reviewer@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupReviewer')),
        ),
        array(
            'name' => 'contributor',
            'password' => 'testtest',
            'email' => 'dev+contributor@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupContributor')),
        ),
        array(
            'name' => 'moderator',
            'password' => 'testtest',
            'email' => 'dev+moderator@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupModerator')),
        ),
        array(
            'name' => 'approver',
            'password' => 'testtest',
            'email' => 'dev+approver@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupApprover')),
        ),
        array(
            'name' => 'editor',
            'password' => 'testtest',
            'email' => 'dev+editor@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupEditor')),
        ),
        array(
            'name' => 'publisher',
            'password' => 'testtest',
            'email' => 'dev+publisher@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupPublisher')),
        ),
        array(
            'name' => 'administrator',
            'password' => 'testtest',
            'email' => 'dev+administrator@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupAdministrator')),
        ),

    );

    public $staff = array(
        array(
            'name' => 'ola',
            'password' => 'testtest',
            'email' => 'dev+ola@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupAdministrator'),
                'GapminderOrg' => array('GroupAdministrator'), // For Snapshot publishing. Remove when publishing works for other groups too
            ),
        ),
        array(
            'name' => 'max',
            'password' => 'testtest',
            'email' => 'dev+max@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupModerator'),
                'GapminderOrg' => array('GroupModerator'), // For Snapshot publishing. Remove when publishing works for other groups too
            ),
        ),
        array(
            'name' => 'fernanda',
            'password' => 'testtest',
            'email' => 'dev+fernanda@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupEditor'),
            ),
        ),
        array(
            'name' => 'julia',
            'password' => 'testtest',
            'email' => 'dev+julia@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupContributor'),
            ),
        ),
        array(
            'name' => 'mattias',
            'password' => 'testtest',
            'email' => 'dev+mattias@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupMember'),
            ),
        ),
    );

    public $externalUsers = array(
        array(
            'name' => 'jack',
            'password' => 'testtest',
            'email' => 'dev+jackexternal@gapminder.org',
            'groupRoles' => array(
                'Proofreaders' => array('GroupReviewer'),
            ),
        ),
        array(
            'name' => 'martha',
            'password' => 'testtest',
            'email' => 'dev+marthaexternal@gapminder.org',
            'groupRoles' => array(),
        ),
    );


    function login($username, $password)
    {
        $I = $this;
        $I->amOnPage(HomePage::$URL);

        $I->executeInSmallScreen(function () use ($I) {
            $I->toggleMobileNavigation();
        });

        $I->waitForElementVisible(HomePage::$loginLink, 20);
        $I->click(HomePage::$loginLink);

        $I->waitForText(LoginPage::$submitButtonText, 20);
        $I->fillField(LoginPage::$usernameField, $username);
        $I->fillField(LoginPage::$passwordField, $password);
        $I->click(LoginPage::$submitButton);
        $I->waitForElementNotVisible(LoginPage::$submitButton, 30);
        $I->dontSeeInCurrentUrl(LoginPage::$URL);
    }

    function logout()
    {
        $I = $this;
        $I->amOnPage(HomePage::$URL);

        $iHaveASmallScreen = $I->haveASmallScreen();

        if ($iHaveASmallScreen) {

            $I->toggleMobileNavigation();
            $I->waitForElementVisible(HomePage::$logoutLinkMobile, 20);
            $I->click(HomePage::$logoutLinkMobile);

        } else {

            $I->waitForElementVisible(HomePage::$accountMenuLink, 20);
            $I->click(HomePage::$accountMenuLink);
            $I->waitForElementVisible(HomePage::$logoutLink, 20);
            $I->click(HomePage::$logoutLink);

        }

        $I->waitForText(HomePage::$homePageMessage, 20);

        if ($iHaveASmallScreen) {
            $I->toggleMobileNavigation();
        }
        $I->waitForElementVisible(HomePage::$loginLink, 20);
        $I->seeElement(HomePage::$loginLink);
    }

    function register($username, $password, $verifyPassword, $email, $acceptTerms = true)
    {
        $I = $this;
        $I->amGoingTo("Register user $username");
        $I->amOnPage(HomePage::$URL);

        $I->waitForText(HomePage::$joinButtonText, 20);
        $I->click(HomePage::$joinButtonText);

        $I->waitForElementVisible(RegistrationPage::$formId);

        $I->fillField(RegistrationPage::$usernameField, $username);
        $I->fillField(RegistrationPage::$emailField, $email);
        $I->fillField(RegistrationPage::$passwordField, $password);
        $I->fillField(RegistrationPage::$verifyPasswordField, $verifyPassword);
        $acceptTerms
            ? $I->checkOption(RegistrationPage::$acceptTermsField)
            : $I->uncheckOption(RegistrationPage::$acceptTermsField);

        /*
        // TODO: find out why administrator registering stalls
        // Wait until errors are cleared (ajax validation)
        $I->waitForElementChange(
            RegistrationPage::$formId,
            function (\WebDriverElement $element) use ($I) {
                try {
                    $element->findElement(WebDriverBy::cssSelector(RegistrationPage::$errorClass));
                } catch (NoSuchElementException $e) {
                    return true;
                }

                return false;
            },
            30
        );
        */
        $I->wait(1);

        $I->click(RegistrationPage::$submitButton);
        $I->waitForText(RegistrationPage::$afterRegistrationText, 30); // secs

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

    function registerUser($userInfo)
    {
        $this->registerUsers(array($userInfo));
    }

    function registerGroupUsers()
    {
        $I = $this;
        $I->amGoingTo('Register group users');
        $I->registerUsers($this->groupUsers);
    }

    function registerGapminderStaff()
    {
        $I = $this;
        $I->amGoingTo('Register Gapminder staff');
        $this->registerUsers($this->staff);
    }

    function registerExternalUsers()
    {
        $I = $this;
        $I->amGoingTo('Register external users');
        $this->registerUsers($this->externalUsers);
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
        $selector = AccountViewPage::generateToggleGroupRoleLinkSelector($group, $role);
        $I->waitForElementVisible($selector, 20);
        $I->click($selector);
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
     * Selects languages for the currently logged in user
     * @param $languages array of languages (max 3 languages)
     */
    function selectLanguages($languages)
    {
        $I = $this;

        $I->amOnPage(\ProfilePage::$URL);

        for ($i = 0, $num = 1; $i < count($languages); $i++, $num++) {
            $I->selectSelect2Option("#Profile_language{$num}", $languages[$i]);
        }

        $I->click('Save');

        $I->waitForText('Your account information has been updated.', 20);

        $I->amOnPage(\ProfilePage::$URL);

        for ($i = 0, $num = 1; $i < count($languages); $i++, $num++) {
            $I->seeSelect2OptionIsSelected("#Profile_language{$num}", $languages[$i]);
        }
    }

}
