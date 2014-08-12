<?php

trait UsersTrait
{

    public $groupUsers = array(
        array(
            'name' => 'authenticated',
            'password' => 'test',
            'email' => 'dev+authenticated@gapminder.org',
            'groupRoles' => array(),
        ),
        array(
            'name' => 'member',
            'password' => 'test',
            'email' => 'dev+member@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupMember')),
        ),
        array(
            'name' => 'translator',
            'password' => 'test',
            'email' => 'dev+translator@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupTranslator')),
        ),
        array(
            'name' => 'reviewer',
            'password' => 'test',
            'email' => 'dev+reviewer@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupReviewer')),
        ),
        array(
            'name' => 'contributor',
            'password' => 'test',
            'email' => 'dev+contributor@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupContributor')),
        ),
        array(
            'name' => 'moderator',
            'password' => 'test',
            'email' => 'dev+moderator@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupModerator')),
        ),
        array(
            'name' => 'approver',
            'password' => 'test',
            'email' => 'dev+approver@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupApprover')),
        ),
        array(
            'name' => 'editor',
            'password' => 'test',
            'email' => 'dev+editor@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupEditor')),
        ),
        array(
            'name' => 'publisher',
            'password' => 'test',
            'email' => 'dev+publisher@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupPublisher')),
        ),
        array(
            'name' => 'administrator',
            'password' => 'test',
            'email' => 'dev+administrator@gapminder.org',
            'groupRoles' => array('GapminderOrg' => array('GroupAdministrator')),
        ),

    );

    public $staff = array(
        array(
            'name' => 'ola',
            'password' => 'test',
            'email' => 'dev+ola@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupAdministrator'),
                'GapminderOrg' => array('GroupAdministrator'), // For Snapshot publishing. Remove when publishing works for other groups too
            ),
        ),
        array(
            'name' => 'max',
            'password' => 'test',
            'email' => 'dev+max@gapminder.org',
            'groupRoles' => array(
                'GapminderInternal' => array('GroupModerator'),
                'GapminderOrg' => array('GroupModerator'), // For Snapshot publishing. Remove when publishing works for other groups too
            ),
        ),
        array(
            'name' => 'fernanda',
            'password' => 'test',
            'email' => 'dev+fernanda@gapminder.org',
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
            'email' => 'dev+jackexternal@gapminder.org',
            'groupRoles' => array(
                'Proofreaders' => array('GroupReviewer'),
            ),
        ),
        array(
            'name' => 'martha',
            'password' => 'test',
            'email' => 'dev+marthaexternal@gapminder.org',
            'groupRoles' => array(),
        ),
    );


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

        $I->executeInNavigation(function () use ($I) {
            $I->waitForElementVisible(HomePage::$accountMenuLink, 10);
            $I->click(HomePage::$accountMenuLink);
            $I->waitForElementVisible(HomePage::$logoutLink, 10);
            $I->click(HomePage::$logoutLink);
        });
    }

    function register($username, $password, $verifyPassword, $email, $acceptTerms = true)
    {
        $I = $this;
        $I->amGoingTo("Register user $username");
        $I->amOnPage(HomePage::$URL);
        $I->click(HomePage::$loginLink);
        $I->click(LoginPage::$signUpButtonText);
        $I->waitForText(RegistrationPage::$introText);
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

        $I->waitForText('Thank you for your registration.', 30); // secs

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
        $I->click(AccountViewPage::generateToggleGroupRoleLinkSelector($group, $role));
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
