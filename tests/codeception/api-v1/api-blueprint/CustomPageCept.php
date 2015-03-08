<?php
$scenario->group('data:test-db,coverage:basic');
$I = new ApiGuy($scenario);

$I->wantTo('retrieve custom page items via the REST API as defined in api blueprint');
$I->sendGET('item/4/test/page');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    "node_id" => 4,
    "item_type" => "custom_page",
    "url" => null,
    "nav_tree_to_use" => "home",
    "attributes" => array(
        "composition_type" => "presentation",
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
                    )
                ),
                array(
                    "type" => "text",
                    "data" => array(
                        "text" => "Test text"
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
                            "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=video.png&extension=.jpeg",
                            "p3_media_id" => "8"
                        )
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
                    "type" => "slideshare",
                    "data" => array(
                        "remote_id" => "42241898"
                    )
                )
            )
        )
    ),
    "root_page" => array(
        "node_id" => 4,
        "item_type" => "custom_page",
        "menu_label" => "Test page",
        "url" => null,
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
                "original" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                )
            )
        )
    )
));
