<?php
$scenario->group('data:test-db,coverage:basic');
$I = new \ApiGuy\ApiClientSteps($scenario);

$expectedResponse = array(
    "node_id" => 6,
    "item_type" => "go_item",
    "url" => "/answers/test-go-item-slug/",
    "url_translations" => array(
        "en" => "/en/6",
        "ar" => "/ar/6",
        "bg" => "/bg/6",
        "ca" => "/ca/6",
        "cs" => "/cs/6",
        "da" => "/da/6",
        "de" => "/de/6",
        "en_gb" => "/en-gb/6",
        "en_us" => "/en-us/6",
        "el" => "/el/6",
        "es" => "/es/6",
        "fa" => "/fa/6",
        "fi" => "/fi/6",
        "fil" => "/fil/6",
        "fr" => "/fr/6",
        "he" => "/he/6",
        "hi" => "/hi/6",
        "hr" => "/hr/6",
        "hu" => "/hu/6",
        "id" => "/id/6",
        "it" => "/it/6",
        "ja" => "/ja/6",
        "ko" => "/ko/6",
        "lt" => "/lt/6",
        "lv" => "/lv/6",
        "nl" => "/nl/6",
        "no" => "/no/6",
        "pl" => "/pl/6",
        "pt" => "/pt/6",
        "pt_br" => "/pt-br/6",
        "pt_pt" => "/pt-pt/6",
        "ro" => "/ro/6",
        "ru" => "/ru/6",
        "sk" => "/sk/6",
        "sl" => "/sl/6",
        "sr" => "/sr/6",
        "sv" => "/sv/6",
        "th" => "/th/6",
        "tr" => "/tr/6",
        "uk" => "/uk/6",
        "vi" => "/vi/6",
        "zh" => "/zh/6",
        "zh_cn" => "/zh-cn/6",
        "zh_tw" => "/zh-tw/6"
    ),
    "source_language" => "en",
    "attributes" => array(
        "composition_type" => "qna",
        "heading" => "Test heading",
        "subheading" => null,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
        "caption" => "Test caption",
        "slug" => "test-go-item-slug",
        "thumb" => array(
            "original" => "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
            "735x444" => "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
            "160x96" => "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
            "110x66" => "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
        ),
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
                        "text" => "Test text\n"
                    ),
                    "id" => "3f6652553ac1cfd59c2d544202213945"
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
                            "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                            "p3_media_id" => "10"
                        )
                    ),
                    "id" => "7ac27a63a5ef487c8e54334989c98b41"
                ),
                array(
                    "type" => "slideshare",
                    "data" => array(
                        "remote_id" => "42268387"
                    ),
                    "id" => "a57ca60762865d426d73904a18ab8e4b"
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
                                        "original" => "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                            "735x444" => "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                            "160x96" => "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                            "110x66" => "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
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
                                        "original" => "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                            "735x444" => "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                            "160x96" => "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                            "110x66" => "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                                        )
                                    )
                                )
                            )
                        )
                    ),
                    "id" => "f9b53e29ed861e483ce6642a07baa8ce"
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
                                    "profile_picture" => "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                    "groups" => array(
                                        array(
                                            "id" => 16,
                                            "name" => "Translators",
                                            "member_label" => "Member",
                                            "roles" => array(
                                                "GroupTranslator"
                                            )
                                        ),
                                        array(
                                            "id" => 17,
                                            "name" => "Reviewers",
                                            "member_label" => "Member",
                                            "roles" => array(
                                                "GroupReviewer"
                                            )
                                        ),
                                        array(
                                            "id" => 1,
                                            "name" => "GapminderOrg",
                                            "member_label" => "Member",
                                            "roles" => array(
                                                "GroupTranslator",
                                                "GroupReviewer"
                                            )
                                        ),
                                        array(
                                            "id" => 15,
                                            "name" => "SneakPeeks",
                                            "member_label" => "Member",
                                            "roles" => array(
                                                "GroupMember"
                                            )
                                        )
                                    )
                                )
                            )
                        )
                    ),
                    "id" => "65821809c8b31557b57344abe34a7224"
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
                    ),
                    "id" => "d27605ace311f6d81d26ac184c74ef95"
                ),
                array(
                    "type" => "slideshow_file",
                    "data" => array(
                        "node_id" => 14,
                        "item_type" => "slideshow_file",
                        "attributes" => array(
                            "google_docs_id" => null,
                            "slideshare_id" => null,
                        ),
                    ),
                    "id" => "b3a06fa50ff950daed8b2448c94efc2e"
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
                    "original" => "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444" => "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96" => "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66" => "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
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

$expectedTranslatedResponse = array(
    "node_id" => 6,
    "item_type" => "go_item",
    "url" => "/answers/test-go-item-slug/",
    "url_translations" => array(
        "en" => "/en/6",
        "ar" => "/ar/6",
        "bg" => "/bg/6",
        "ca" => "/ca/6",
        "cs" => "/cs/6",
        "da" => "/da/6",
        "de" => "/de/6",
        "en_gb" => "/en-gb/6",
        "en_us" => "/en-us/6",
        "el" => "/el/6",
        "es" => "/es/6",
        "fa" => "/fa/6",
        "fi" => "/fi/6",
        "fil" => "/fil/6",
        "fr" => "/fr/6",
        "he" => "/he/6",
        "hi" => "/hi/6",
        "hr" => "/hr/6",
        "hu" => "/hu/6",
        "id" => "/id/6",
        "it" => "/it/6",
        "ja" => "/ja/6",
        "ko" => "/ko/6",
        "lt" => "/lt/6",
        "lv" => "/lv/6",
        "nl" => "/nl/6",
        "no" => "/no/6",
        "pl" => "/pl/6",
        "pt" => "/pt/6",
        "pt_br" => "/pt-br/6",
        "pt_pt" => "/pt-pt/6",
        "ro" => "/ro/6",
        "ru" => "/ru/6",
        "sk" => "/sk/6",
        "sl" => "/sl/6",
        "sr" => "/sr/6",
        "sv" => "/sv/6",
        "th" => "/th/6",
        "tr" => "/tr/6",
        "uk" => "/uk/6",
        "vi" => "/vi/6",
        "zh" => "/zh/6",
        "zh_cn" => "/zh-cn/6",
        "zh_tw" => "/zh-tw/6"
    ),
    "source_language" => "en",
    "attributes" => array(
        "composition_type" => "qna",
        "heading" => "título de teste",
        "subheading" => null,
        "about" => "om teste",
        "caption" => "caption teste",
        "slug" => null,
        "thumb" => array(
            "original" => "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
            "735x444" => "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
            "160x96" => "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
            "110x66" => "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
        ),
        "composition" => array(
            "data" => array(
                array(
                    "type" => "heading",
                    "data" => array(
                        "text" => "título de teste"
                    ),
                    "id" => "25cefe3f2d19b4784368c2f0ec4ee123"
                ),
                array(
                    "type" => "text",
                    "data" => array(
                        "text" => "teste texto"
                    ),
                    "id" => "3f6652553ac1cfd59c2d544202213945"
                ),
                array(
                    "type" => "quote",
                    "data" => array(
                        "cite" => "teste de crédito",
                        "text" => "> Citação de teste"
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
                            "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                            "p3_media_id" => "10"
                        )
                    ),
                    "id" => "7ac27a63a5ef487c8e54334989c98b41"
                ),
                array(
                    "type" => "slideshare",
                    "data" => array(
                        "remote_id" => "42268387"
                    ),
                    "id" => "a57ca60762865d426d73904a18ab8e4b"
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
                                        "slug" => null,
                                        "thumb" =>  array(
                                            "original" => "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                            "735x444" => "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                            "160x96" => "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                            "110x66" => "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
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
                                        "slug" => null,
                                        "thumb" =>  array(
                                            "original" => "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                            "735x444" => "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                            "160x96" => "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                            "110x66" => "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                                        )
                                    )
                                )
                            )
                        )
                    ),
                    "id" => "f9b53e29ed861e483ce6642a07baa8ce"
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
                                    "profile_picture" => "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                    "groups" => array(
                                        array(
                                            "id" => 16,
                                            "name" => "Translators",
                                            "member_label" => "Member",
                                            "roles" => array(
                                                "GroupTranslator"
                                            )
                                        ),
                                        array(
                                            "id" => 17,
                                            "name" => "Reviewers",
                                            "member_label" => "Member",
                                            "roles" => array(
                                                "GroupReviewer"
                                            )
                                        ),
                                        array(
                                            "id" => 1,
                                            "name" => "GapminderOrg",
                                            "member_label" => "Member",
                                            "roles" => array(
                                                "GroupTranslator",
                                                "GroupReviewer"
                                            )
                                        ),
                                        array(
                                            "id" => 15,
                                            "name" => "SneakPeeks",
                                            "member_label" => "Member",
                                            "roles" => array(
                                                "GroupMember"
                                            )
                                        )
                                    )
                                )
                            )
                        )
                    ),
                    "id" => "65821809c8b31557b57344abe34a7224"
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
                                "slug" => null,
                                "about" => null,
                                "language" => array (
                                    "id" => "pt_pt",
                                    "strings" => array (
                                        "pt_pt" => array (
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
                    ),
                    "id" => "d27605ace311f6d81d26ac184c74ef95"
                ),
                array(
                    "type" => "slideshow_file",
                    "data" => array(
                        "node_id" => 14,
                        "item_type" => "slideshow_file",
                        "attributes" => array(
                            "google_docs_id" => null,
                            "slideshare_id" => null,
                        ),
                    ),
                    "id" => "b3a06fa50ff950daed8b2448c94efc2e"
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
                "slug" => null,
                "thumb" => array(
                    "original" => "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444" => "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96" => "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66" => "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
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

$I->wantTo('retrieve composition items via the REST API as defined in api blueprint');
$I->sendGET('item/6/test/composition?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

$I->wantTo('retrieve composition items by route via the barebones php REST API as defined in api blueprint');
$I->sendGET('item/%2Fanswers%2Ftest-go-item-slug%2F/test-by-route/composition?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

$I->wantTo('retrieve translated (portuguese) composition items via the REST API as defined in api blueprint');
$I->sendGET('item/6/test/composition/pt-pt?_lang=pt_pt');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedTranslatedResponse);

$I->wantTo('retrieve translated (portuguese) composition items by route via the barebones php REST API as defined in api blueprint');
$I->sendGET('item/%2Fpt-pt%2F6/test-by-route/composition/pt-pt?_lang=pt_pt');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedTranslatedResponse);

// Same as above but as an authenticated user
$accessToken = $I->authenticateAsTestUser();

$I->wantTo('(authenticated request) retrieve composition items via the REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendGET('item/6/test/composition?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

$I->wantTo('(authenticated request) retrieve composition items by route via the barebones php REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendGET('item/%2Fanswers%2Ftest-go-item-slug%2F/test-by-route/composition?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

$I->wantTo('(authenticated request) retrieve translated (portuguese) composition items via the REST API as defined in api blueprint');
$I->sendGET('item/6/test/composition/pt-pt?_lang=pt_pt');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedTranslatedResponse);

$I->wantTo('(authenticated request) retrieve translated (portuguese) composition items by route via the barebones php REST API as defined in api blueprint');
$I->sendGET('item/%2Fpt-pt%2F6/test-by-route/composition/pt-pt?_lang=pt_pt');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedTranslatedResponse);
