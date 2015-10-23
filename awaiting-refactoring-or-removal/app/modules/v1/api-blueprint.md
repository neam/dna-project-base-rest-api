FORMAT: 1A
HOST: http://develop-cms.gapminder.org/api/v1

# Gapminder

# Group User
User related resources

## Login [/user/login]
### Authenticates a user [POST]
+ Request (application/json)

        {
            "grant_type": "password",
            "client_id": "TestClient",
            "username": "admin",
            "password": "admin"
        }

+ Response 200 (application/json)

        {
            "access_token": "03807cb390319329bdf6c777d4dfae9c0d3b3c35",
            "token_type": "bearer",
            "expires_in": 3600,
            "scope":null
        }

## Authentication [/user/authenticate]
### Uses the authentication header to check whether the user is authenticated [POST]
+ Request

    + Headers
        
                Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35
        
+ Response 200

## Public profile [/user/{accountId}/profile]

### Returns the users public profile [GET]

The profile is only returned if it is marked as "published", e.g. public.

+ Request

    + Headers
        
            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35

+ Response 200 (application/json)

        {
            "first_name": "Test",
            "last_name": "User",
            "email": "testuser@example.com",
            "social_links": [ ],
            "may_contact": true,
            "professional_title": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                            "text": "I'm a professional"
                        }
                    }
                ]
            },
            "lives_in": "Uganda",
            "language1": "en",
            "language2": "sv",
            "language3": "fi",
            "about_me": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                        "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                        }
                    }
                ]
            },
            "my_links": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                            "text": "http://gapminder.com"
                        }
                    }
                ]
            },
            "contributions": [ ],
            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
            "groups": [
                {
                    "id": 16,
                    "name": "Translators",
                    "member_label": "Member",
                    "roles": [
                        "GroupTranslator"
                    ]
                },
                {
                    "id": 17,
                    "name": "Reviewers",
                    "member_label": "Member",
                    "roles": [
                        "GroupReviewer"
                    ]
                },
                {
                    "id": 1,
                    "name": "GapminderOrg",
                    "member_label": "Member",
                    "roles": [
                        "GroupTranslator",
                        "GroupReviewer"
                    ]
                },
                {
                    "id": 15,
                    "name": "SneakPeeks",
                    "member_label": "Member",
                    "roles": [
                        "GroupMember"
                    ]
                }
            ]
        }

## Profile [/user/profile]
### Returns the authenticated users profile [GET]
+ Request (application/json)

    + Headers
    
            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35
        
+ Response 200 (application/json)

        {
            "first_name": "Test",
            "last_name": "User",
            "email": "testuser@example.com",
            "social_links": [ ],
            "may_contact": true,
            "professional_title": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                            "text": "I'm a professional"
                        }
                    }
                ]
            },
            "lives_in": "Uganda",
            "language1": "en",
            "language2": "sv",
            "language3": "fi",
            "about_me": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                        "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                        }
                    }
                ]
            },
            "my_links": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                            "text": "http://gapminder.com"
                        }
                    }
                ]
            },
            "contributions": [ ],
            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
            "groups": [
                {
                    "id": 16,
                    "name": "Translators",
                    "member_label": "Member",
                    "roles": [
                        "GroupTranslator"
                    ]
                },
                {
                    "id": 17,
                    "name": "Reviewers",
                    "member_label": "Member",
                    "roles": [
                        "GroupReviewer"
                    ]
                },
                {
                    "id": 1,
                    "name": "GapminderOrg",
                    "member_label": "Member",
                    "roles": [
                        "GroupTranslator",
                        "GroupReviewer"
                    ]
                },
                {
                    "id": 15,
                    "name": "SneakPeeks",
                    "member_label": "Member",
                    "roles": [
                        "GroupMember"
                    ]
                }
            ]
        }

### Saves the authenticated users profile [PUT]
+ Request (application/json)

    + Headers
    
            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35

    + Body
    
            {
                "first_name": "Anna-Mia",
                "last_name": "Ekström",
                "email": "user@example.com",
                "social_links": [
                    {
                        "id": "1",
                        "name": "LinkedIn",
                        "url": "http://linkedin.com"
                    },
                    {
                        "id": "2",
                        "name": "Twitter",
                        "url": "http://twitter.com"
                    },
                    {
                        "name": "Facebook",
                        "url": "http://facebook.com"
                    }
                ],
                "may_contact": true,
                "professional_title": {"data": [
                    {"type": "list", "data": {"text": " - Filmmaker\n - Filmtator\n - Whattookyousolong.org\n"}}
                ]},
                "lives_in": "Stockholm, Sweden",
                "language1": "sv",
                "language2": null,
                "language3": null,
                "about_me": {"data": [
                    {"type": "text", "data": {"text": "I contribute to the Dollar Street project lorem ipsum. I contribute to the Dollar Street project lorem ipsum. I contribute to the Dollar Street project lorem ipsum. I contribute to the Dollar Street project lorem ipsum. I contribute to the Dollar Street project lorem ipsum. I contribute to the Dollar Street project lorem ipsum.\n"}},
                    {"type": "text", "data": {"text": "Cambiae bid scriptum libro. Dolores veci!\n"}}
                ]},
                "my_links": {"data": [
                    {"type": "heading", "data": {"text": "Here is my video"}},
                    {"type": "video", "data": {"source": "youtube", "remote_id": "w33hPL4tdNg"}},
                    {"type": "text", "data": {"text": "[www.gapminder.org](http://www.gapminder.org)"}},
                    {"type": "heading", "data": {"text": "My other project"}},
                    {"type": "text", "data": {"text": "[www.example.com](http://www.example.com)"}}
                ]}
            }
        
+ Response 200

## Info [/user/info]
### Returns the authenticated users user-info [GET]
+ Request (application/json)

    + Headers
    
            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35

+ Response 200 (application/json)

        {
            "id": 25,
            "username": "bob",
            "email": "bob@example.com"
        }


# Group VideoFile
Video file related resources

## VideoFile collection [/videoFile]
### List all video files [GET]
+ Response 200 (application/json)

        [
            {
                "node_id": 1,
                "item_type": "video_file",
                "url": null,
                "attributes": {
                    "title": "Will saving poor children lead to overpopulation?",
                    "about": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.",
                    "caption": "No. Its the opposite.",
                    "slug": "will-saving-poor-children-lead-to-overpopulation",
                    "url_mp4": "http://web/files-api/p3media/file/image?id=2&preset=original-public-mp4&title=media&extension=.mp4",
                    "url_webm": "http://web/files-api/p3media/file/image?id=1&preset=original-public-webm&title=media&extension=.webm",
                    "url_youtube": null,
                    "url_subtitles": "http://web/api/v1/videoFile/subtitles/1?lang=en",
                    "thumb": {
                        "original": "http://web/files-api/p3media/file/image?id=5&preset=original-public&title=media&extension=.jpeg",
                        "735x444": "http://web/files-api/p3media/file/image?id=5&preset=735x444&title=media&extension=.jpg",
                        "160x96": "http://web/files-api/p3media/file/image?id=5&preset=160x96&title=media&extension=.jpg",
                        "110x66": "http://web/files-api/p3media/file/image?id=5&preset=110x66&title=media&extension=.jpg"
                    }
                },
                "related": [ ]
            },
            {
                "node_id": 2,
                "item_type": "video_file",
                "url": null,
                "attributes": {
                    "title": "Are income and lifespan related?",
                    "about": "In this video Hans talks about how income and lifespan are related to each other.",
                    "caption": null,
                    "slug": "are-income-and-lifespan-related",
                    "url_mp4": "http://web/files-api/p3media/file/image?id=4&preset=original-public-mp4&title=media&extension=.mp4",
                    "url_webm": "http://web/files-api/p3media/file/image?id=3&preset=original-public-webm&title=media&extension=.webm",
                    "url_youtube": null,
                    "url_subtitles": "http://web/api/v1/videoFile/subtitles/2?lang=en",
                    "thumb": {
                        "original": "http://web/files-api/p3media/file/image?id=6&preset=original-public&title=media&extension=.jpeg",
                        "735x444": "http://web/files-api/p3media/file/image?id=6&preset=735x444&title=media&extension=.jpg",
                        "160x96": "http://web/files-api/p3media/file/image?id=6&preset=160x96&title=media&extension=.jpg",
                        "110x66": "http://web/files-api/p3media/file/image?id=6&preset=110x66&title=media&extension=.jpg"
                    }
                },
                "related": [ ]
            }
        ]

## VideoFile [/videoFile/{id}]

+ Parameters

    + id (string|int) ... the id or slug of the video file resource

### Get a video file [GET]
+ Response 200 (application/json)

        {
            "node_id": 1,
            "item_type": "video_file",
            "url": null,
            "attributes": {
                "title": "Will saving poor children lead to overpopulation?",
                "about": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.",
                "caption": "No. Its the opposite.",
                "slug": "will-saving-poor-children-lead-to-overpopulation",
                "url_mp4": "http://web/files-api/p3media/file/image?id=2&preset=original-public-mp4&title=media&extension=.mp4",
                "url_webm": "http://web/files-api/p3media/file/image?id=1&preset=original-public-webm&title=media&extension=.webm",
                "url_youtube": null,
                "url_subtitles": "http://web/api/v1/videoFile/subtitles/1?lang=en",
                "thumb": {
                    "original": "http://web/files-api/p3media/file/image?id=5&preset=original-public&title=media&extension=.jpeg",
                    "735x444": "http://web/files-api/p3media/file/image?id=5&preset=735x444&title=media&extension=.jpg",
                    "160x96": "http://web/files-api/p3media/file/image?id=5&preset=160x96&title=media&extension=.jpg",
                    "110x66": "http://web/files-api/p3media/file/image?id=5&preset=110x66&title=media&extension=.jpg"
                }
            },
            "related": [ ]
        }

## VideoFile subtitles [/videoFile/subtitles/{id}]

+ Parameters

    + id (int) ... the id of the video file resource

### Get video file subtitles [GET]

+ Response 200 (text/html)

        1
        00:00:03,399 --> 00:00:10,800
        A common misunderstanding is that if we save all the poor children: the world will become overpopulated.

        2
        00:00:10,800 --> 00:00:13,599
        This may sound logical, but it's wrong.

        3
        00:00:13,599 --> 00:00:16,199
        Its the other way around!

        4
        00:00:16,199 --> 00:00:22,000
        Saving the poor childrens lives is required to end population growth.

        5
        00:00:22,000 --> 00:00:24,699
        Now! Look at the UN numbers.

        6
        00:00:24,699 --> 00:00:30,199
        Poor parents on avarage have five children. And one dies.

        7
        00:00:30,199 --> 00:00:36,100
        Look! Two parents are replaced by four surviving children in the next generation.

        8
        00:00:36,100 --> 00:00:39,600
        This means the population is growing very fast among the poorest.

        9
        00:00:39,600 --> 00:00:46,200
        This is the avarage family in the worst of places like Congo and Afghanistan.

        10
        00:00:46,200 --> 00:00:55,399
        Today, where child mortality is highest, that's where the population is growing faster than anywhere else.

        11
        00:00:55,399 --> 00:00:57,700
        How many people live like this?

        12
        00:00:57,700 --> 00:01:03,899
        There are seven billion people in the world. One block: one billion.

        13
        00:01:03,899 --> 00:01:07,400
        The poorest two billion...

        14
        00:01:07,400 --> 00:01:08,799
        ...they live like this.

        15
        00:01:08,799 --> 00:01:11,500
        The other five billion...

        16
        00:01:13,799 --> 00:01:20,900
        ...they have this avarage family. Two parents having two children and there are few child deaths.

        17
        00:01:20,900 --> 00:01:25,000
        This is the majority of the world population, not only Europe and the US.

        18
        00:01:25,000 --> 00:01:32,293
        It's throughout religions and cultures: China, Iran, Mexico, large cities in Africa.

        19
        00:01:32,293 --> 00:01:38,199
        Today in most populations children just replace parents.

        20
        00:01:38,199 --> 00:01:42,099
        And the size of generations are no longer increasing.

        21
        00:01:42,099 --> 00:01:46,700
        This means: the population will stop growing.

        22
        00:01:46,700 --> 00:01:51,500
        How did so many people end up with small families?

        23
        00:01:51,500 --> 00:01:54,700
        Well,  their children stopped dying.

        24
        00:01:54,700 --> 00:02:00,500
        As they left extreme poverty and girls got education: parents no longer had to

        25
        00:02:00,500 --> 00:02:06,500
        compensate for child death by having many babies. And a large family stopped being

        26
        00:02:06,500 --> 00:02:09,199
        an economic necessity or a social status symbol.

        27
        00:02:09,199 --> 00:02:15,000
        And with modern contraceptives: parents across the world, the majority

        28
        00:02:15,000 --> 00:02:18,000
        decided to have a small family.

        29
        00:02:18,000 --> 00:02:26,000
        So by saving the lives of poor children and helping the last two billion out of poverty:

        30
        00:02:26,000 --> 00:02:33,199
        These parents will also decide to have fewer children.

        31
        00:02:33,199 --> 00:02:37,199
        And fewer.

        32
        00:02:37,199 --> 00:02:39,099
        Eventually...

        33
        00:02:39,099 --> 00:02:43,000
        ...reaching the two child family

        34
        00:02:43,000 --> 00:02:48,400
        That showed the UN family size forcast up to the end of the century.

        35
        00:02:48,400 --> 00:02:52,900
        Then the world population is expected to stop growing.

        36
        00:02:52,900 --> 00:03:01,599
        Before it stops: another four billion people will be added to the world population.

        37
        00:03:01,599 --> 00:03:06,400
        Four billion more. That's a lot of people!

        38
        00:03:06,400 --> 00:03:15,300
        But the longer poor children keeps dying and this change is delayed:

        39
        00:03:15,300 --> 00:03:20,699
        the more billions will be added.

        40
        00:03:20,699 --> 00:03:28,099
        So ending population growth starts by saving the poorest children.

# Group Language
Language related resources

## List of supported languages [/language]

### Get languages [GET]
+ Response 200 (application/json)

        {
            "en": {
                "name": "English",
                "direction": "ltr"
            },
            "ar": {
                "name": "العربية",
                "direction": "rtl"
            },
            "bg": {
                "name": "Български",
                "direction": "ltr"
            },
            "ca": {
                "name": "Català",
                "direction": "ltr"
            },
            "cs": {
                "name": "Čeština",
                "direction": "ltr"
            },
            "da": {
                "name": "Dansk",
                "direction": "ltr"
            },
            "de": {
                "name": "Deutsch",
                "direction": "ltr"
            },
            "en_gb": {
                "name": "UK English",
                "direction": "ltr"
            },
            "en_us": {
                "name": "US English",
                "direction": "ltr"
            },
            "el": {
                "name": "Ελληνικά",
                "direction": "ltr"
            },
            "es": {
                "name": "Español",
                "direction": "ltr"
            },
            "fa": {
                "name": "فارسی",
                "direction": "rtl"
            },
            "fi": {
                "name": "Suomi",
                "direction": "ltr"
            },
            "fil": {
                "name": "Filipino",
                "direction": "ltr"
            },
            "fr": {
                "name": "Français",
                "direction": "ltr"
            },
            "he": {
                "name": "עברית",
                "direction": "rtl"
            },
            "hi": {
                "name": "हिंदी",
                "direction": "ltr"
            },
            "hr": {
                "name": "Hrvatski",
                "direction": "ltr"
            },
            "hu": {
                "name": "Magyar",
                "direction": "ltr"
            },
            "id": {
                "name": "Bahasa Indonesia",
                "direction": "ltr"
            },
            "it": {
                "name": "Italiano",
                "direction": "ltr"
            },
            "ja": {
                "name": "日本語",
                "direction": "ltr"
            },
            "ko": {
                "name": "한국어",
                "direction": "ltr"
            },
            "lt": {
                "name": "Lietuvių",
                "direction": "ltr"
            },
            "lv": {
                "name": "Latviešu valoda",
                "direction": "ltr"
            },
            "nl": {
                "name": "Nederlands",
                "direction": "ltr"
            },
            "no": {
                "name": "Norsk",
                "direction": "ltr"
            },
            "pl": {
                "name": "Polski",
                "direction": "ltr"
            },
            "pt": {
                "name": "Português",
                "direction": "ltr"
            },
            "pt_br": {
                "name": "Português (Brasil)",
                "direction": "ltr"
            },
            "pt_pt": {
                "name": "Português (Portugal)",
                "direction": "ltr"
            },
            "ro": {
                "name": "Română",
                "direction": "ltr"
            },
            "ru": {
                "name": "Русский",
                "direction": "ltr"
            },
            "sk": {
                "name": "Slovenský",
                "direction": "ltr"
            },
            "sl": {
                "name": "Slovenščina",
                "direction": "ltr"
            },
            "sr": {
                "name": "Српски",
                "direction": "ltr"
            },
            "sv": {
                "name": "Svenska",
                "direction": "ltr"
            },
            "th": {
                "name": "ไทย",
                "direction": "ltr"
            },
            "tr": {
                "name": "Türkçe",
                "direction": "ltr"
            },
            "uk": {
                "name": "Українська",
                "direction": "ltr"
            },
            "vi": {
                "name": "Tiếng Việt",
                "direction": "ltr"
            },
            "zh": {
                "name": "中文",
                "direction": "ltr"
            },
            "zh_cn": {
                "name": "中文 (简体)",
                "direction": "ltr"
            },
            "zh_tw": {
                "name": "中文 (繁體)",
                "direction": "ltr"
            }
        }

# Group Items

+ Trait Composable ... For items composed using *Sir Trevor*

    Implies that the the item has a JSON structured created by *Sir Trevor*

    + Properties
        + composition_type = "exercise" (string) ... the composition type is a string that hints about how it should be rendered
        + data = `[]` (json) ... consists of one or more *Sir Trevor* blocks. In order to render the primary visual element on the *Go* page, the individual blocks will be evaluated differently. For example, a YouTube video will be rendered as the main element if it is the first block in the item data array and if the item type in question is a *QnA* item. The *about* block type is a placeholder indicating that the about property should be rendered in its place, and thus content creators get more granular control over block order.


## Item [/item/{node_id}]

+ Parameters

    + node_id (string) ... the node ID of the item (note: currently it will only work if the item is an item in the composition table)

### Get an item [GET]

+ Traits

    + [Composable][]

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "attributes": {
                "composition_type": "qna",
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "slug": "test-go-item-slug",
                "thumb": {
                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                },
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            }
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            }
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            }
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        }
                                    }
                                ]
                            }
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            }
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            }
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            }
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "composition",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "node_id": 6,
                                            "item_type": "go_item",
                                            "url": "/answers/test-go-item-slug/",
                                            "attributes": {
                                                "composition_type": "qna",
                                                "heading": "Test heading",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption",
                                                "slug": "test-go-item-slug",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                                                }
                                            }
                                        },
                                        {
                                            "node_id": 7,
                                            "item_type": "go_item",
                                            "url": null,
                                            "attributes": {
                                                "composition_type": "presentation",
                                                "heading": "Test heading 2",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption 2",
                                                "slug": "test-go-item-slug-2",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                                                }
                                            }
                                        }
                                    ]
                                }
                            }
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "profile",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "first_name": "Test",
                                            "last_name": "User",
                                            "email": "testuser@example.com",
                                            "social_links": [],
                                            "may_contact": true,
                                            "professional_title": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "I'm a professional"
                                                        }
                                                    }
                                                ]
                                            },
                                            "lives_in": "Uganda",
                                            "language1": "en",
                                            "language2": "sv",
                                            "language3": "fi",
                                            "about_me": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                                                        }
                                                    }
                                                ]
                                            },
                                            "my_links": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "http://gapminder.com"
                                                        }
                                                    }
                                                ]
                                            },
                                            "contributions": [],
                                            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                            "groups": [
                                                {
                                                    "id": 16,
                                                    "name": "Translators",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator"
                                                    ]
                                                },
                                                {
                                                    "id": 17,
                                                    "name": "Reviewers",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 1,
                                                    "name": "GapminderOrg",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator",
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 15,
                                                    "name": "SneakPeeks",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupMember"
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                }
                            }
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": {
                                    "state": {
                                        "time": {
                                            "start": 1990,
                                            "end": 2012,
                                            "value": 1995,
                                            "step": 1,
                                            "speed": 300,
                                            "formatInput": "%Y"
                                        },
                                        "entities": {
                                            "show": {
                                                "dim": "geo",
                                                "filter": {
                                                    "geo": [
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
                                                    ],
                                                    "geo.category": [
                                                        "country"
                                                    ]
                                                }
                                            }
                                        },
                                        "marker": {
                                            "hook_to": [
                                                "entities",
                                                "time",
                                                "data",
                                                "language"
                                            ],
                                            "type": "geometry",
                                            "shape": "circle",
                                            "label": {
                                                "hook": "property",
                                                "value": "geo.name"
                                            },
                                            "axis_y": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "scale": "linear"
                                            },
                                            "axis_x": {
                                                "hook": "indicator",
                                                "value": "gdp_per_cap",
                                                "scale": "linear",
                                                "unit": 100
                                            },
                                            "size": {
                                                "hook": "indicator",
                                                "value": "pop",
                                                "scale": "log"
                                            },
                                            "color": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "domain": [
                                                    "#F77481",
                                                    "#E1CE00",
                                                    "#B4DE79"
                                                ]
                                            }
                                        }
                                    },
                                    "title": "Test visualization",
                                    "tool": {
                                        "ref": "test-tool",
                                        "title": "Test Tool",
                                        "slug": "test-tool",
                                        "about": null,
                                        "language": {
                                            "id": "en",
                                            "strings": {
                                                "en": {
                                                    "title": "Test visualization",
                                                    "buttons/find": "Find",
                                                    "buttons/colors": "Colors",
                                                    "buttons/size": "Size",
                                                    "buttons/more_options": "Options",
                                                    "indicator/lex": "Life expectancy",
                                                    "indicator/gdp_per_cap": "GDP per capita",
                                                    "indicator/pop": "Population",
                                                    "indicator/geo.region": "Region",
                                                    "indicator/geo": "Geo code",
                                                    "indicator/time": "Time",
                                                    "indicator/geo.category": "Geo category"
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc",
                                    "slideshare_id": null
                                }
                            }
                        }
                    ]
                }
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

+ Response 200 (application/json)

        {
            "node_id": 4,
            "item_type": "custom_page",
            "url": "/test-page-slug/",
            "nav_tree_to_use": "home",
            "attributes": {
                "composition_type": "presentation",
                "icon_url": null,
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            }
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text"
                            }
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            }
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        }
                                    }
                                ]
                            }
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "8"
                                }
                            }
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            }
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42241898"
                            }
                        }
                    ]
                }
            },
            "root_page": {
                "node_id": 4,
                "item_type": "custom_page",
                "menu_label": "Test page",
                "url": "/test-page-slug/",
                "children": [
                    {
                        "node_id": 5,
                        "item_type": "custom_page",
                        "menu_label": "Test page 2",
                        "url": null,
                        "children": [ ]
                    }
                ]
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

## Composition [/item/{node_id}/test/composition]

+ Parameters

    + node_id (string) ... the node ID of the item (note: currently it will only work if the item is an item in the composition table)

### Get a composition item for testing [GET]

This endpoint is for testing purposes only and will not be available in the real API.
It is a workaround for not being able to choose the response when multiple are defined per request when testing the API format.

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "attributes": {
                "composition_type": "qna",
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "slug": "test-go-item-slug",
                "thumb": {
                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                },
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            }
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            }
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            }
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        }
                                    }
                                ]
                            }
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            }
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            }
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            }
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "composition",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "node_id": 6,
                                            "item_type": "go_item",
                                            "url": "/answers/test-go-item-slug/",
                                            "attributes": {
                                                "composition_type": "qna",
                                                "heading": "Test heading",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption",
                                                "slug": "test-go-item-slug",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                                                }
                                            }
                                        },
                                        {
                                            "node_id": 7,
                                            "item_type": "go_item",
                                            "url": null,
                                            "attributes": {
                                                "composition_type": "presentation",
                                                "heading": "Test heading 2",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption 2",
                                                "slug": "test-go-item-slug-2",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                                                }
                                            }
                                        }
                                    ]
                                }
                            }
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "profile",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "first_name": "Test",
                                            "last_name": "User",
                                            "email": "testuser@example.com",
                                            "social_links": [],
                                            "may_contact": true,
                                            "professional_title": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "I'm a professional"
                                                        }
                                                    }
                                                ]
                                            },
                                            "lives_in": "Uganda",
                                            "language1": "en",
                                            "language2": "sv",
                                            "language3": "fi",
                                            "about_me": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                                                        }
                                                    }
                                                ]
                                            },
                                            "my_links": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "http://gapminder.com"
                                                        }
                                                    }
                                                ]
                                            },
                                            "contributions": [],
                                            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                            "groups": [
                                                {
                                                    "id": 16,
                                                    "name": "Translators",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator"
                                                    ]
                                                },
                                                {
                                                    "id": 17,
                                                    "name": "Reviewers",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 1,
                                                    "name": "GapminderOrg",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator",
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 15,
                                                    "name": "SneakPeeks",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupMember"
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                }
                            }
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": {
                                    "state": {
                                        "time": {
                                            "start": 1990,
                                            "end": 2012,
                                            "value": 1995,
                                            "step": 1,
                                            "speed": 300,
                                            "formatInput": "%Y"
                                        },
                                        "entities": {
                                            "show": {
                                                "dim": "geo",
                                                "filter": {
                                                    "geo": [
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
                                                    ],
                                                    "geo.category": [
                                                        "country"
                                                    ]
                                                }
                                            }
                                        },
                                        "marker": {
                                            "hook_to": [
                                                "entities",
                                                "time",
                                                "data",
                                                "language"
                                            ],
                                            "type": "geometry",
                                            "shape": "circle",
                                            "label": {
                                                "hook": "property",
                                                "value": "geo.name"
                                            },
                                            "axis_y": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "scale": "linear"
                                            },
                                            "axis_x": {
                                                "hook": "indicator",
                                                "value": "gdp_per_cap",
                                                "scale": "linear",
                                                "unit": 100
                                            },
                                            "size": {
                                                "hook": "indicator",
                                                "value": "pop",
                                                "scale": "log"
                                            },
                                            "color": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "domain": [
                                                    "#F77481",
                                                    "#E1CE00",
                                                    "#B4DE79"
                                                ]
                                            }
                                        }
                                    },
                                    "title": "Test visualization",
                                    "tool": {
                                        "ref": "test-tool",
                                        "title": "Test Tool",
                                        "slug": "test-tool",
                                        "about": null,
                                        "language": {
                                            "id": "en",
                                            "strings": {
                                                "en": {
                                                    "title": "Test visualization",
                                                    "buttons/find": "Find",
                                                    "buttons/colors": "Colors",
                                                    "buttons/size": "Size",
                                                    "buttons/more_options": "Options",
                                                    "indicator/lex": "Life expectancy",
                                                    "indicator/gdp_per_cap": "GDP per capita",
                                                    "indicator/pop": "Population",
                                                    "indicator/geo.region": "Region",
                                                    "indicator/geo": "Geo code",
                                                    "indicator/time": "Time",
                                                    "indicator/geo.category": "Geo category"
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc",
                                    "slideshare_id": null
                                }
                            }
                        }
                    ]
                }
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

## Page [/item/{node_id}/test/page]

+ Parameters

    + node_id (string) ... the node ID of the item (note: currently it will only work if the item is an item in the composition table)

### Get a page item for testing [GET]

This endpoint is for testing purposes only and will not be available in the real API.
It is a workaround for not being able to choose the response when multiple are defined per request when testing the API format.

+ Response 200 (application/json)

        {
            "node_id": 4,
            "item_type": "custom_page",
            "url": "/test-page-slug/",
            "nav_tree_to_use": "home",
            "attributes": {
                "composition_type": "presentation",
                "icon_url": null,
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            }
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text"
                            }
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            }
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        }
                                    }
                                ]
                            }
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "8"
                                }
                            }
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            }
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42241898"
                            }
                        }
                    ]
                }
            },
            "root_page": {
                "node_id": 4,
                "item_type": "custom_page",
                "menu_label": "Test page",
                "url": "/test-page-slug/",
                "children": [
                    {
                        "node_id": 5,
                        "item_type": "custom_page",
                        "menu_label": "Test page 2",
                        "url": null,
                        "children": [ ]
                    }
                ]
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

## Composition [/item/{route}/test-by-route/composition]

### Get a composition item for testing the barebones api override [GET]

This endpoint is included in this api blueprint for testing purposes. It's output should be identical to the corresponding /{node_id}/test/composition endpoint above.

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "attributes": {
                "composition_type": "qna",
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "slug": "test-go-item-slug",
                "thumb": {
                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                },
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            }
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            }
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            }
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        }
                                    }
                                ]
                            }
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            }
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            }
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            }
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "composition",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "node_id": 6,
                                            "item_type": "go_item",
                                            "url": "/answers/test-go-item-slug/",
                                            "attributes": {
                                                "composition_type": "qna",
                                                "heading": "Test heading",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption",
                                                "slug": "test-go-item-slug",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                                                }
                                            }
                                        },
                                        {
                                            "node_id": 7,
                                            "item_type": "go_item",
                                            "url": null,
                                            "attributes": {
                                                "composition_type": "presentation",
                                                "heading": "Test heading 2",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption 2",
                                                "slug": "test-go-item-slug-2",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                                                }
                                            }
                                        }
                                    ]
                                }
                            }
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "profile",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "first_name": "Test",
                                            "last_name": "User",
                                            "email": "testuser@example.com",
                                            "social_links": [],
                                            "may_contact": true,
                                            "professional_title": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "I'm a professional"
                                                        }
                                                    }
                                                ]
                                            },
                                            "lives_in": "Uganda",
                                            "language1": "en",
                                            "language2": "sv",
                                            "language3": "fi",
                                            "about_me": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                                                        }
                                                    }
                                                ]
                                            },
                                            "my_links": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "http://gapminder.com"
                                                        }
                                                    }
                                                ]
                                            },
                                            "contributions": [],
                                            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                            "groups": [
                                                {
                                                    "id": 16,
                                                    "name": "Translators",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator"
                                                    ]
                                                },
                                                {
                                                    "id": 17,
                                                    "name": "Reviewers",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 1,
                                                    "name": "GapminderOrg",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator",
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 15,
                                                    "name": "SneakPeeks",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupMember"
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                }
                            }
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": {
                                    "state": {
                                        "time": {
                                            "start": 1990,
                                            "end": 2012,
                                            "value": 1995,
                                            "step": 1,
                                            "speed": 300,
                                            "formatInput": "%Y"
                                        },
                                        "entities": {
                                            "show": {
                                                "dim": "geo",
                                                "filter": {
                                                    "geo": [
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
                                                    ],
                                                    "geo.category": [
                                                        "country"
                                                    ]
                                                }
                                            }
                                        },
                                        "marker": {
                                            "hook_to": [
                                                "entities",
                                                "time",
                                                "data",
                                                "language"
                                            ],
                                            "type": "geometry",
                                            "shape": "circle",
                                            "label": {
                                                "hook": "property",
                                                "value": "geo.name"
                                            },
                                            "axis_y": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "scale": "linear"
                                            },
                                            "axis_x": {
                                                "hook": "indicator",
                                                "value": "gdp_per_cap",
                                                "scale": "linear",
                                                "unit": 100
                                            },
                                            "size": {
                                                "hook": "indicator",
                                                "value": "pop",
                                                "scale": "log"
                                            },
                                            "color": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "domain": [
                                                    "#F77481",
                                                    "#E1CE00",
                                                    "#B4DE79"
                                                ]
                                            }
                                        }
                                    },
                                    "title": "Test visualization",
                                    "tool": {
                                        "ref": "test-tool",
                                        "title": "Test Tool",
                                        "slug": "test-tool",
                                        "about": null,
                                        "language": {
                                            "id": "en",
                                            "strings": {
                                                "en": {
                                                    "title": "Test visualization",
                                                    "buttons/find": "Find",
                                                    "buttons/colors": "Colors",
                                                    "buttons/size": "Size",
                                                    "buttons/more_options": "Options",
                                                    "indicator/lex": "Life expectancy",
                                                    "indicator/gdp_per_cap": "GDP per capita",
                                                    "indicator/pop": "Population",
                                                    "indicator/geo.region": "Region",
                                                    "indicator/geo": "Geo code",
                                                    "indicator/time": "Time",
                                                    "indicator/geo.category": "Geo category"
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc",
                                    "slideshare_id": null
                                }
                            }
                        }
                    ]
                }
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

## Page [/item/{route}/test-by-route/page]

### Get a page item by route for testing the barebones api override [GET]

This endpoint is included in this api blueprint for testing purposes. It's output should be identical to the corresponding /{node_id}/test/page endpoint above.

+ Response 200 (application/json)

        {
            "node_id": 4,
            "item_type": "custom_page",
            "url": "/test-page-slug/",
            "nav_tree_to_use": "home",
            "attributes": {
                "composition_type": "presentation",
                "icon_url": null,
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            }
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text"
                            }
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            }
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        }
                                    }
                                ]
                            }
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "8"
                                }
                            }
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            }
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42241898"
                            }
                        }
                    ]
                }
            },
            "root_page": {
                "node_id": 4,
                "item_type": "custom_page",
                "menu_label": "Test page",
                "url": "/test-page-slug/",
                "children": [
                    {
                        "node_id": 5,
                        "item_type": "custom_page",
                        "menu_label": "Test page 2",
                        "url": null,
                        "children": [ ]
                    }
                ]
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }
