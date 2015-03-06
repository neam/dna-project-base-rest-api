<?php
$scenario->group('data:test-db,coverage:basic');
$I = new ApiGuy($scenario);

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
    'profile_picture' => 'http://172.17.42.1:11111/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg&lang=en',
    'groups' => array(
        array(
            'id' => '16',
            'name' => 'Translators',
            'member_label' => 'Member',
        ),
        array(
            'id' => '17',
            'name' => 'Reviewers',
            'member_label' => 'Member',
        ),
        array(
            'id' => '1',
            'name' => 'GapminderOrg',
            'member_label' => 'Member',
        ),
        array(
            'id' => '15',
            'name' => 'SneakPeeks',
            'member_label' => 'Member',
        )
    ),
));

// Log in to be able to see your own profile that is not public.
$I->wantTo('login user via the REST API as defined in api blueprint');
$I->sendPOST('user/login', array(
    'grant_type' => 'password',
    'client_id' => 'TestClient',
    'username' => 'testuser',
    'password' => 'demo1234Q'
));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
// We cannot check the access_token here, as we don't know it when testing against real db.
$I->seeResponseContainsJson(array('token_type' => 'bearer', 'expires_in' => 3600, 'scope' => null));
// But we can grab it, which will fail if is not present, and use it in the next request.
$accessToken = $I->grabDataFromJsonResponse('access_token');

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
    'profile_picture' => 'http://172.17.42.1:11111/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg&lang=en',
    'groups' => array(
        array(
            'id' => '16',
            'name' => 'Translators',
            'member_label' => 'Member',
        ),
        array(
            'id' => '17',
            'name' => 'Reviewers',
            'member_label' => 'Member',
        ),
        array(
            'id' => '1',
            'name' => 'GapminderOrg',
            'member_label' => 'Member',
        ),
        array(
            'id' => '15',
            'name' => 'SneakPeeks',
            'member_label' => 'Member',
        )
    ),
));
