<?php
$scenario->group('data:test-db,coverage:basic');
$I = new \ApiGuy\ApiClientSteps($scenario);

$expectedResponse = array(
    "node_id" => 4,
    "item_type" => "custom_page",
    "url" => "/test-page-slug/",
    "url_translations" => array(
        "en" => "/en/4",
        "ar" => "/ar/4",
        "bg" => "/bg/4",
        "ca" => "/ca/4",
        "cs" => "/cs/4",
        "da" => "/da/4",
        "de" => "/de/4",
        "en_gb" => "/en-gb/4",
        "en_us" => "/en-us/4",
        "el" => "/el/4",
        "es" => "/es/4",
        "fa" => "/fa/4",
        "fi" => "/fi/4",
        "fil" => "/fil/4",
        "fr" => "/fr/4",
        "he" => "/he/4",
        "hi" => "/hi/4",
        "hr" => "/hr/4",
        "hu" => "/hu/4",
        "id" => "/id/4",
        "it" => "/it/4",
        "ja" => "/ja/4",
        "ko" => "/ko/4",
        "lt" => "/lt/4",
        "lv" => "/lv/4",
        "nl" => "/nl/4",
        "no" => "/no/4",
        "pl" => "/pl/4",
        "pt" => "/pt/4",
        "pt_br" => "/pt-br/4",
        "pt_pt" => "/pt-pt/4",
        "ro" => "/ro/4",
        "ru" => "/ru/4",
        "sk" => "/sk/4",
        "sl" => "/sl/4",
        "sr" => "/sr/4",
        "sv" => "/sv/4",
        "th" => "/th/4",
        "tr" => "/tr/4",
        "uk" => "/uk/4",
        "vi" => "/vi/4",
        "zh" => "/zh/4",
        "zh_cn" => "/zh-cn/4",
        "zh_tw" => "/zh-tw/4"
    ),
    "source_language" => "en",
    "nav_tree_to_use" => "home",
    "attributes" => array(
        "composition_type" => "presentation",
        "icon_url" => null,
        "heading" => "Test heading",
        "subheading" => null,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
        "caption" => "Test caption",
        "composition" => array(
            "data" => array(
                array(
                    "type" => "heading",
                    "data" => array(
                        "text" => "Test heading"
                    ),
                    "id" => "25cefe3f2d19b4784368c2f0ec4ee123"
                ),
                array(
                    "type" => "text",
                    "data" => array(
                        "text" => "Test text"
                    ),
                    "id" => "ebd8341ac4f233251d1e7bd91f918e8b"
                ),
                array(
                    "type" => "quote",
                    "data" => array(
                        "cite" => "Test credit",
                        "text" => "> Test quote"
                    ),
                    "id" => "1db0bcb68d798b40ebaaca2e42737be2"
                ),
                array(
                    "type" => "download_links",
                    "data" => array(
                       "download_links" => array(
                            array(
                                "type" => "download_link",
                                "data" => array(
                                    "node_id" => 3,
                                    "item_type" => "download_link",
                                    "attributes" => array(
                                        "title" => "Gapminder World 2012",
                                        "url" => "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                    )
                                ),
                                "id" => "c6165892b571041826b6562311eebf48"
                            )
                       )
                    ),
                    "id" => "a6c6ff85dc6716fe5d3e6498d542829d"
                ),
                array(
                    "type" => "image",
                    "data" => array(
                        "message" => "File",
                        "file" => array(
                            "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                            "p3_media_id" => "8"
                        )
                    ),
                    "id" => "74582504d5ec5e4ad1cf1836ca10e41e"
                ),
                array(
                    "type" => "video",
                    "data" => array(
                        "source" => "youtube",
                        "remote_id" => "BkSO9pOVpRM"
                    ),
                    "id" => "f78b6d53bdf075b1f95a397010915c03"
                ),
                array(
                    "type" => "slideshare",
                    "data" => array(
                        "remote_id" => "42241898"
                    ),
                    "id" => "6e9923bf3a72248641143fc02eb1a23b"
                )
            )
        )
    ),
    "root_page" => array(
        "node_id" => 4,
        "item_type" => "custom_page",
        "menu_label" => "Test page",
        "url" => "/test-page-slug/",
        "children" => array(
            array(
                "node_id" => 5,
                "item_type" => "custom_page",
                "menu_label" => "Test page 2",
                "url" => null,
                "children" => array()
            )
        )
    ),
    "contributors" => array(),
    "related" => array(
        array(
            "node_id" => 7,
            "item_type" => "go_item",
            "url" => null,
            "attributes" => array(
            "composition_type" => "presentation",
                "heading" => "Test heading 2",
                "subheading" => null,
                "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption" => "Test caption 2",
                "slug" => "test-go-item-slug-2",
                "thumb" => array(
                    "original" => "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444"=> "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96"=> "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66"=> "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                    "130x77"=> "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                    "180x108"=> "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                    "735x444-retina"=> "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                    "160x96-retina"=> "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                    "110x66-retina"=> "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                    "130x77-retina"=> "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                    "180x108-retina"=> "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                )
            )
        )
    ),
    "groups" => array(
        "GapminderOrg"
    ),
    "home_navigation_tree" => array(
        "data" => array(
            array(
                "type" => "navigation_tree_item",
                "data" => array(
                    "node_id" => 16,
                    "item_type" => "navigation_tree_item",
                    "attributes" => array(
                        "ref" => "home",
                        "about" => "This is the root item of general home tree.",
                        "menu_label" => "Home",
                        "heading" => "Home",
                        "subheading" => "Gapminder.org - Start Here",
                        "url" => "/friends",
                        "icon_url" => "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                    ),
                    "children" => array(
                        array(
                            "type" => "navigation_tree_item",
                            "data" => array(
                                "node_id" => 17,
                                "item_type" => "navigation_tree_item",
                                "attributes" => array(
                                    "ref" => "health",
                                    "about" => "This tree item links to the main gapminder health page",
                                    "menu_label" => "Health",
                                    "heading" => "Health",
                                    "subheading" => "About health",
                                    "url" => null,
                                    "icon_url" => "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                ),
                                "children" => array(
                                    array(
                                        "type" => "navigation_tree_item",
                                        "data" => array(
                                            "node_id" => 18,
                                            "item_type" => "navigation_tree_item",
                                            "attributes" => array(
                                                "ref" => "ebola",
                                                "about" => "Most people need more money to lead a good life.",
                                                "menu_label" => "Ebola",
                                                "heading" => "Ebola",
                                                "subheading" => "Read more about ebola",
                                                "url" => "/ebola",
                                                "icon_url" => "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                            ),
                                            "children" => array()
                                        )
                                    )
                                )
                            )
                        ),
                        array(
                            "type" => "navigation_tree_item",
                            "data" => array(
                                "node_id" => 19,
                                "item_type" => "navigation_tree_item",
                                "attributes" => array(
                                    "ref" => "exercises",
                                    "about" => "This tree item links to the main starting page for exercises",
                                    "menu_label" => "Exercises",
                                    "heading" => "Exercises",
                                    "subheading" => "For teachers and tutors",
                                    "url" => "/exercises",
                                    "icon_url" => "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                ),
                                "children" => array()
                            )
                        )
                    )
                )
            )
        )
    ),
    "footer_navigation_tree_1" => array(
        "data" => array(
            array(
                "type" => "navigation_tree_item",
                "data" => array(
                    "node_id" => 21,
                    "item_type" => "navigation_tree_item",
                    "attributes" => array(
                        "ref" => "world",
                        "about" => null,
                        "menu_label" => "Gapminder World",
                        "heading" => "Gapminder World",
                        "subheading" => null,
                        "url" => "/world",
                        "icon_url" => "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                    ),
                    "children" => array()
                )
            ),
            array(
                "type" => "navigation_tree_item",
                "data" => array(
                    "node_id" => 22,
                    "item_type" => "navigation_tree_item",
                    "attributes" => array(
                        "ref" => "for-teachers",
                        "about" => null,
                        "menu_label" => "For teachers",
                        "heading" => "For teachers",
                        "subheading" => null,
                        "url" => "/for-teachers",
                        "icon_url" => "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                    ),
                    "children" => array()
                )
            )
        )
    ),
    "footer_navigation_tree_2" => array(
        "data" => array(
            array(
                "type" => "navigation_tree_item",
                "data" => array(
                    "node_id" => 24,
                    "item_type" => "navigation_tree_item",
                    "attributes" => array(
                        "ref" => "about",
                        "about" => "about",
                        "menu_label" => "About",
                        "heading" => "About",
                        "subheading" => null,
                        "url" => "/about",
                        "icon_url" => null
                    ),
                    "children" => array()
                )
            ),
            array(
                "type" => "navigation_tree_item",
                "data" => array(
                    "node_id" => 25,
                    "item_type" => "navigation_tree_item",
                    "attributes" => array(
                        "ref" => "help",
                        "about" => null,
                        "menu_label" => "Help",
                        "heading" => "Help",
                        "subheading" => null,
                        "url" => "/help",
                        "icon_url" => "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                    ),
                    "children" => array()
                )
            )
        )
    )
);

$I->wantTo('retrieve custom page items via the REST API as defined in api blueprint');
$I->sendGET('item/4/test/page?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

$I->wantTo('retrieve custom page items by route via the barebones php REST API as defined in api blueprint');
$I->sendGET('item/%2Ftest-page-slug%2F/test-by-route/page?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

// Same as above but as an authenticated user
$accessToken = $I->authenticateAsTestUser();

$I->wantTo('(authenticated request) retrieve custom page items via the REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendGET('item/4/test/page?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

$I->wantTo('(authenticated request) retrieve custom page items by route via the barebones php REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendGET('item/%2Ftest-page-slug%2F/test-by-route/page?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);
