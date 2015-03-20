<?php
$scenario->group('data:test-db,coverage:basic');
$I = new \ApiGuy\ApiClientSteps($scenario);

$I->wantTo('retrieve users public profile via the REST API as defined in api blueprint');
$I->sendGET('user/2/profile');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    'first_name' => 'Test',
    'last_name' => 'User',
    'email' => 'testuser@example.com',
    'social_links' => array(),
    'may_contact' => true,
    'professional_title' => array(
        'data' => array(
            array(
                'type' => 'text',
                'data' => array(
                    'text' => 'I\'m a professional',
                ),
            ),
        ),
    ),
    'lives_in' => 'Uganda',
    'language1' => 'en',
    'language2' => 'sv',
    'language3' => 'fi',
    'about_me' => array(
        'data' => array(
            array(
                'type' => 'text',
                'data' => array(
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet.',
                ),
            ),
        ),
    ),
    'my_links' => array(
        'data' => array(
            array(
                'type' => 'text',
                'data' => array(
                    'text' => 'http://gapminder.com',
                ),
            ),
        ),
    ),
    'contributions' => array(),
    'profile_picture' => 'http://172.17.42.1:11111/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg',
    'groups' => array(
        array(
            'id' => 16,
            'name' => 'Translators',
            'member_label' => 'Member',
            'roles' => array(
                'GroupTranslator'
            )
        ),
        array(
            'id' => 17,
            'name' => 'Reviewers',
            'member_label' => 'Member',
            'roles' => array(
                'GroupReviewer'
            )
        ),
        array(
            'id' => 1,
            'name' => 'GapminderOrg',
            'member_label' => 'Member',
            'roles' => array(
                'GroupTranslator',
                'GroupReviewer'
            )
        ),
        array(
            'id' => 15,
            'name' => 'SneakPeeks',
            'member_label' => 'Member',
            'roles' => array(
                'GroupMember'
            )
        )
    ),
));

// Log in to be able to see your own profile that is not public.
$accessToken = $I->authenticateAsTestUser();

$I->wantTo('retrieve logged in users via the REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendGET('user/profile');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    'first_name' => 'Test',
    'last_name' => 'User',
    'email' => 'testuser@example.com',
    'social_links' => array(),
    'may_contact' => true,
    'professional_title' => array(
        'data' => array(
            array(
                'type' => 'text',
                'data' => array(
                    'text' => 'I\'m a professional',
                ),
            ),
        ),
    ),
    'lives_in' => 'Uganda',
    'language1' => 'en',
    'language2' => 'sv',
    'language3' => 'fi',
    'about_me' => array(
        'data' => array(
            array(
                'type' => 'text',
                'data' => array(
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet.',
                ),
            ),
        ),
    ),
    'my_links' => array(
        'data' => array(
            array(
                'type' => 'text',
                'data' => array(
                    'text' => 'http://gapminder.com',
                ),
            ),
        ),
    ),
    'contributions' => array(),
    'profile_picture' => 'http://172.17.42.1:11111/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg',
    'groups' => array(
        array(
            'id' => 16,
            'name' => 'Translators',
            'member_label' => 'Member',
            'roles' => array(
                'GroupTranslator'
            )
        ),
        array(
            'id' => 17,
            'name' => 'Reviewers',
            'member_label' => 'Member',
            'roles' => array(
                'GroupReviewer'
            )
        ),
        array(
            'id' => 1,
            'name' => 'GapminderOrg',
            'member_label' => 'Member',
            'roles' => array(
                'GroupTranslator',
                'GroupReviewer'
            )
        ),
        array(
            'id' => 15,
            'name' => 'SneakPeeks',
            'member_label' => 'Member',
            'roles' => array(
                'GroupMember'
            )
        )
    ),
));
