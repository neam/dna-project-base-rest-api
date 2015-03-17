<?php
$scenario->group('data:test-db,coverage:basic');
$I = new \ApiGuy\ApiClientSteps($scenario);

$expectedResponse = array(
    "node_id" => 6,
    "item_type" => "go_item",
    "url" => "/answers/test-go-item-slug/",
    "attributes" => array(
        "composition_type" => "qna",
        "heading" => "Test heading",
        "subheading" => null,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
        "caption" => "Test caption",
        "slug" => "test-go-item-slug",
        "thumb" => array(
            "original" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
            "735x444" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
            "160x96" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
            "110x66" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
        ),
        "composition" => array(
            "data" => array(
                array(
                    "type" => "heading",
                    "data" => array(
                        "text" => "Test heading"
                    )
                ),
                array(
                    "type" => "text",
                    "data" => array(
                        "text" => "Test text\n"
                    )
                ),
                array(
                    "type" => "quote",
                    "data" => array(
                        "cite" => "Test credit",
                        "text" => "> Test quote"
                    )
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
                                        "url" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                    )
                                )
                            )
                        )
                    )
                ),
                array(
                    "type" => "image",
                    "data" => array(
                        "message" => "File",
                        "file" => array(
                            "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                            "p3_media_id" => "10"
                        )
                    )
                ),
                array(
                    "type" => "slideshare",
                    "data" => array(
                        "remote_id" => "42268387"
                    )
                ),
                array(
                    "type" => "video",
                    "data" => array(
                        "source" => "youtube",
                        "remote_id" => "BkSO9pOVpRM"
                    )
                ),
                array(
                    "type" => "item_list",
                    "data" => array(
                        "node_id" => 9,
                        "item_type" => "item_list",
                        "attributes" => array(
                            "display_extent" => "titles-only",
                            "query" => array(
                                "item_type" => "composition",
                                "composition_type" => null,
                                "sort" => null,
                                "pageSize" => 0
                            ),
                            "items" => array(
                                array(
                                    "node_id" => 6,
                                    "item_type" => "go_item",
                                    "url" => "/answers/test-go-item-slug/",
                                    "attributes" => array(
                                    "composition_type" => "qna",
                                        "heading"=> "Test heading",
                                        "subheading" => null,
                                        "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                        "caption" => "Test caption",
                                        "slug" => "test-go-item-slug",
                                        "thumb" =>  array(
                                        "original" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                            "735x444" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                            "160x96" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                            "110x66" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                                        )
                                    )
                                ),
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
                                        "thumb" =>  array(
                                        "original" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                            "735x444" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                            "160x96" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                            "110x66" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                                        )
                                    )
                                )
                            )
                        )
                    )
                ),
                array(
                    "type" => "item_list",
                    "data" => array(
                    "node_id" => 10,
                    "item_type" => "item_list",
                    "attributes" => array(
                        "display_extent" => "titles-only",
                            "query" => array(
                                "item_type" => "profile",
                                "composition_type" => null,
                                "sort" => null,
                                "pageSize" => 0
                            ),
                            "items" => array(
                                array(
                                    "first_name" => "Test",
                                    "last_name" => "User",
                                    "email" => "testuser@example.com",
                                    "social_links" => array(),
                                    "may_contact" => true,
                                    "professional_title" => array(
                                        "data" => array(
                                            array(
                                                "type" => "text",
                                                "data" => array(
                                                    "text" => "I'm a professional"
                                                )
                                            )
                                        )
                                    ),
                                    "lives_in" => "Uganda",
                                    "language1" => "en",
                                    "language2" => "sv",
                                    "language3" => "fi",
                                    "about_me" => array(
                                    "data" => array(
                                            array(
                                                "type" => "text",
                                                "data" => array(
                                                "text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                                                )
                                            )
                                        )
                                    ),
                                    "my_links" => array(
                                    "data" => array(
                                            array(
                                                "type" => "text",
                                                "data" => array(
                                                "text" => "http://gapminder.com"
                                                )
                                            )
                                        )
                                    ),
                                    "contributions" => array(),
                                    "profile_picture" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                    "groups" => array(
                                        array(
                                            "id" => "16",
                                            "name" => "Translators",
                                            "member_label" => "Member"
                                        ),
                                        array(
                                            "id" => "17",
                                            "name" => "Reviewers",
                                            "member_label" => "Member"
                                        ),
                                        array(
                                            "id" => "1",
                                            "name" => "GapminderOrg",
                                            "member_label" => "Member"
                                        ),
                                        array(
                                            "id" => "15",
                                            "name" => "SneakPeeks",
                                            "member_label" => "Member"
                                        )
                                    )
                                )
                            )
                        )
                    )
                ),
                array(
                    "type" => "visualization",
                    "data" => array(
                        "node_id" => 12,
                        "item_type" => "visualization",
                        "attributes" => array(
                            "state" => array(
                                "time" => array(
                                    "start" => 1990,
                                    "end" => 2012,
                                    "value" => 1995,
                                    "step" => 1,
                                    "speed" => 300,
                                    "formatInput" => "%Y"
                                ),
                                "entities" => array(
                                    "show" => array(
                                        "dim" => "geo",
                                        "filter" => array(
                                            "geo" => array(
                                                "swe",
                                                "nor",
                                                "fin",
                                                "bra",
                                                "usa",
                                                "chn",
                                                "jpn",
                                                "zaf",
                                                "ind",
                                                "ago"
                                            ),
                                            "geo.category" => array(
                                                "country"
                                            )
                                        )
                                    )
                                ),
                                "marker" => array(
                                    "hook_to" => array(
                                        "entities",
                                        "time",
                                        "data",
                                        "language"
                                    ),
                                    "type" => "geometry",
                                    "shape" => "circle",
                                    "label" => array(
                                        "hook" => "property",
                                        "value" => "geo.name"
                                    ),
                                    "axis_y" => array(
                                        "hook" => "indicator",
                                        "value" => "lex",
                                        "scale" => "linear"
                                    ),
                                    "axis_x" => array(
                                        "hook" => "indicator",
                                        "value" => "gdp_per_cap",
                                        "scale" => "linear",
                                        "unit" => 100
                                    ),
                                    "size" => array(
                                        "hook" => "indicator",
                                        "value" => "pop",
                                        "scale" => "log"
                                    ),
                                    "color" => array(
                                        "hook" => "indicator",
                                        "value" => "lex",
                                        "domain" => array(
                                            "#F77481",
                                            "#E1CE00",
                                            "#B4DE79"
                                        )
                                    )
                                )
                            ),
                            "title" => "Test visualization",
                            "tool" => array(
                                "ref" => "test-tool",
                                "title" => "Test Tool",
                                "slug" => "test-tool",
                                "about" => null,
                                "language" => array (
                                    "id" => "en",
                                    "strings" => array (
                                        "en" => array (
                                            "title" => "Test visualization",
                                            "buttons/find" => "Find",
                                            "buttons/colors" => "Colors",
                                            "buttons/size" => "Size",
                                            "buttons/more_options" => "Options",
                                            "indicator/lex" => "Life expectancy",
                                            "indicator/gdp_per_cap" => "GDP per capita",
                                            "indicator/pop" => "Population",
                                            "indicator/geo.region" => "Region",
                                            "indicator/geo" => "Geo code",
                                            "indicator/time" => "Time",
                                            "indicator/geo.category" => "Geo category",
                                        )
                                    )
                                )
                            )
                        )
                    )
                ),
                array(
                    'type' => 'slideshow_file',
                    'data' =>
                        array(
                            'node_id' => 14,
                            'item_type' => 'slideshow_file',
                            'attributes' =>
                                array(
                                    'google_docs_id' => NULL,
                                    'slideshare_id' => NULL,
                                ),
                        ),
                ),
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
                    "original" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                )
            )
        )
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
                        "icon_url" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
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
                                    "icon_url" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
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
                                                "icon_url" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
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
                                    "icon_url" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
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
                        "icon_url" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
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
                        "icon_url" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
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
                        "icon_url" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                    ),
                    "children" => array()
                )
            )
        )
    )
);

$I->wantTo('retrieve composition items via the REST API as defined in api blueprint');
$I->sendGET('item/6/test/composition?lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

$I->wantTo('retrieve composition items by route via the barebones php REST API as defined in api blueprint');
$I->sendGET('item/%2Fanswers%2Ftest-go-item-slug%2F/test-by-route/composition?lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

// Same as above but as an authenticated user
$accessToken = $I->authenticateAsTestUser();

$I->wantTo('(authenticated request) retrieve composition items via the REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendGET('item/6/test/composition?lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

$I->wantTo('(authenticated request) retrieve composition items by route via the barebones php REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendGET('item/%2Fanswers%2Ftest-go-item-slug%2F/test-by-route/composition?lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);
