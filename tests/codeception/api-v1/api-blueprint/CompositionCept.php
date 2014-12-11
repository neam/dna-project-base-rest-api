<?php
$scenario->group('data:clean-db,coverage:basic');
$I = new ApiGuy($scenario);

$I->wantTo('retrieve composition items via the REST API as defined in api blueprint');
$I->sendGET('item/1024/test/composition');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseEquals('{
    "node_id": 1024,
    "item_type": "go_item",
    "url": "//www.gapminder.org/exercises/item-1204",
    "attributes": {
        "composition_type": "exercise",
        "heading": "Example Composition Item",
        "subheading": "This is the subheading.",
        "about": "<h2>Overview</h2>This is an <em>example item</em>.\n<h2>Sidenotes</h2><ul><li>Foo</li><li>Bar</li></ul>",
        "caption": "a caption",
        "slug": "item-1204",
        "thumb": {
            "200x120": "http://placehold.it/200x120.png",
            "400x240": "http://placehold.it/400x240.png",
            "600x360": "http://placehold.it/400x360.png",
            "original": "http://placehold.it/original.png"
        }
    },
    "composition": {
        "data": [
            {
                "type": "video_file",
                "data": {
                    "node_id": 653,
                    "item_type": "video_file",
                    "attributes": {
                        "title": "How large is the gap between the richest and the poorest?",
                        "about": "Here we explain that there is no gap in the traditional sense.",
                        "caption": null,
                        "slug": null,
                        "url_mp4": "http://url_to_file.mp4",
                        "url_webm": "http://url_to_file.webm",
                        "url_youtube": "http://url_to_youtube_video",
                        "url_subtitles": "http://url_to_the_video_file_subtitles_api_endpoint",
                        "thumb": {
                            "original": "http://thumbnail_image_original.jpg"
                        }
                    }
                }
            },
            {
                "type": "html_chunk",
                "data": {
                    "node_id": 900,
                    "item_type": "html_chunk",
                    "attributes": {
                        "markup": "<b>the html</b>"
                    }
                }
            },
            {
                "type": "download_link",
                "data": {
                    "node_id": 1248,
                    "item_type": "download_link",
                    "attributes": {
                        "title": "Link for download Gapminder World 2013",
                        "url": "http://url_to_the_file.ext"
                    }
                }
            },
            {
                "type": "about",
                "data": {
                    "render_here": true
                }
            },
            {
                "type": "video",
                "data": {
                    "source": "youtube",
                    "remote_id": "hcFLFpmc4Pg"
                }
            },
            {
                "type": "text",
                "data": {
                    "text": "Hello, I’m **Sir Trevor**.\nCreate some new blocks and see _what I can do_.\n"
                }
            },
            {
                "type": "html",
                "data": {
                    "src": "<h1>First Paragraph</h1><p>This is a <em>paragraph</em>.</p>"
                }
            },
            {
                "type": "download_links",
                "data": {
                    "title": "Multiple Download Links",
                    "links": [
                        {
                            "title": "PDF File",
                            "url": "http://example.com/example.pdf"
                        },
                        {
                            "title": "Animated GIF",
                            "url": "http://example.com/example.gif"
                        }
                    ]
                }
            },
            {
                "type": "linked_image",
                "data": {
                    "title": "Example Chart",
                    "image_url": "http://placehold.it/640x480",
                    "link_url": "http://example.com/chart.pdf"
                }
            },
            {
                "type": "slideshare",
                "data": {
                    "remote_id": "5896443"
                }
            }
        ]
    },
    "contributors": [
        {
            "user_id": 1,
            "username": "anna-mia-ekstrom",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 2,
            "username": "olarosling",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 3,
            "username": "fredrikwollsen",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 4,
            "username": "jimipirila",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 5,
            "username": "arthurcamara",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 6,
            "username": "amirrahnama",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 7,
            "username": "fernanda",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 8,
            "username": "max",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 9,
            "username": "mariosanchez",
            "thumbnail_url": "http://placehold.it/200x200"
        }
    ],
    "related": [
        {
            "node_id": 357,
            "item_type": "go_item",
            "url": "//www.gapminder.org/exercises/item-1207",
            "attributes": {
                "composition_type": "exercise",
                "heading": "The heading of #1207",
                "subheading": "This is an example item.",
                "about": "The item about text",
                "caption": "a caption",
                "slug": "item-1205",
                "thumb": {
                    "200x120": "http://placehold.it/200x120.png",
                    "400x240": "http://placehold.it/400x240.png",
                    "600x360": "http://placehold.it/400x360.png",
                    "original": "http://placehold.it/original.png"
                }
            }
        }
    ]
}
');
