FORMAT: 1A
HOST: http://develop-cms.gapminder.org/api/v1

# gapminder

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
            "first_name": "Anna-Mia",
            "last_name": "Ekström",
            "email": "user@example.com",
            "social_links": [
                {
                    "id": 1,
                    "name": "LinkedIn",
                    "url": "http://linkedin.com"
                },
                {
                    "id": 2,
                    "name": "Twitter",
                    "url": "http://twitter.com"
                },
                {
                    "id": 3,
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
            ]},
            "contributions": [
                {
                    "label": "Fact-checks for HIV trend",
                    "url": "http://example.com"
                },
                {
                    "label": "Reviewed Exercise",
                    "url": "http://example.com"
                }
            ],
            "profile_picture": "http://placehold.it/120x150",
            "groups": [
                {
                    "id": 1,
                    "name": "Teachers",
                    "member_label": "Teacher"
                },
                {
                    "id": 2,
                    "name": "DataCrunchers",
                    "member_label": "Data Cruncher"
                },
                {
                    "id": 3,
                    "name": "SeniorAdvisors",
                    "member_label": "Senior Advisor"
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
            "first_name": "Anna-Mia",
            "last_name": "Ekström",
            "email": "user@example.com",
            "social_links": [
                {
                    "id": 1,
                    "name": "LinkedIn",
                    "url": "http://linkedin.com"
                },
                {
                    "id": 2,
                    "name": "Twitter",
                    "url": "http://twitter.com"
                },
                {
                    "id": 3,
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
            ]},
            "contributions": [
                {
                    "label": "Fact-checks for HIV trend",
                    "url": "http://example.com"
                },
                {
                    "label": "Reviewed Exercise",
                    "url": "http://example.com"
                }
            ],
            "profile_picture": "http://placehold.it/120x150",
            "groups": [
                {
                    "id": 1,
                    "name": "Teachers",
                    "member_label": "Teacher"
                },
                {
                    "id": 2,
                    "name": "DataCrunchers",
                    "member_label": "Data Cruncher"
                },
                {
                    "id": 3,
                    "name": "SeniorAdvisors",
                    "member_label": "Senior Advisor"
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
                    "url_mp4": "http://172.17.42.1:11111/files-api/p3media/file/image?id=2&preset=original-public-mp4&title=saving-the-poor-children-gates-mp4-c73e4c2d0a-11.mp4&extension=.mp4&lang=en",
                    "url_webm": "http://172.17.42.1:11111/files-api/p3media/file/image?id=1&preset=original-public-webm&title=saving-the-poor-children-gates-webm-0037605f21-12.webm&extension=.webm&lang=en",
                    "url_youtube": null,
                    "url_subtitles": "http://172.17.42.1:11111/api/v1/videoFile/subtitles/1?lang=en",
                    "thumb": {
                        "original": "http://172.17.42.1:11111/files-api/p3media/file/image?id=5&preset=original-public&title=video.png&extension=.jpeg&lang=en",
                        "735x444": "http://172.17.42.1:11111/files-api/p3media/file/image?id=5&preset=735x444&title=video.png&extension=.jpg&lang=en",
                        "160x96": "http://172.17.42.1:11111/files-api/p3media/file/image?id=5&preset=160x96&title=video.png&extension=.jpg&lang=en",
                        "110x66": "http://172.17.42.1:11111/files-api/p3media/file/image?id=5&preset=110x66&title=video.png&extension=.jpg&lang=en"
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
                    "url_mp4": "http://172.17.42.1:11111/files-api/p3media/file/image?id=4&preset=original-public-mp4&title=q-inc-lex-static-countries-v10-mp4-mp4-1583575d67-21.mp4&extension=.mp4&lang=en",
                    "url_webm": "http://172.17.42.1:11111/files-api/p3media/file/image?id=3&preset=original-public-webm&title=q-inc-lex-static-countries-v10-webmsd-webm-426e265f5e-20.webm&extension=.webm&lang=en",
                    "url_youtube": null,
                    "url_subtitles": "http://172.17.42.1:11111/api/v1/videoFile/subtitles/2?lang=en",
                    "thumb": {
                        "original": "http://172.17.42.1:11111/files-api/p3media/file/image?id=6&preset=original-public&title=IncLexMini.png&extension=.jpeg&lang=en",
                        "735x444": "http://172.17.42.1:11111/files-api/p3media/file/image?id=6&preset=735x444&title=IncLexMini.png&extension=.jpg&lang=en",
                        "160x96": "http://172.17.42.1:11111/files-api/p3media/file/image?id=6&preset=160x96&title=IncLexMini.png&extension=.jpg&lang=en",
                        "110x66": "http://172.17.42.1:11111/files-api/p3media/file/image?id=6&preset=110x66&title=IncLexMini.png&extension=.jpg&lang=en"
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
                "url_mp4": "http://172.17.42.1:11111/files-api/p3media/file/image?id=2&preset=original-public-mp4&title=saving-the-poor-children-gates-mp4-c73e4c2d0a-11.mp4&extension=.mp4&lang=en",
                "url_webm": "http://172.17.42.1:11111/files-api/p3media/file/image?id=1&preset=original-public-webm&title=saving-the-poor-children-gates-webm-0037605f21-12.webm&extension=.webm&lang=en",
                "url_youtube": null,
                "url_subtitles": "http://172.17.42.1:11111/api/v1/videoFile/subtitles/1?lang=en",
                "thumb": {
                    "original": "http://172.17.42.1:11111/files-api/p3media/file/image?id=5&preset=original-public&title=video.png&extension=.jpeg&lang=en",
                    "735x444": "http://172.17.42.1:11111/files-api/p3media/file/image?id=5&preset=735x444&title=video.png&extension=.jpg&lang=en",
                    "160x96": "http://172.17.42.1:11111/files-api/p3media/file/image?id=5&preset=160x96&title=video.png&extension=.jpg&lang=en",
                    "110x66": "http://172.17.42.1:11111/files-api/p3media/file/image?id=5&preset=110x66&title=video.png&extension=.jpg&lang=en"
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

# Group Translation

Translation related resources

## Composition Items [/translation/composition/{id}/{language}]

+ Parameters

    + id (int) ... ID of the resource
    + language (string) ... Language code for the translations, e.g. es
    
### Get translation data for a composition item [GET]

+ Response 200 (application/json)

        {
            "itemType": "composition",
            "compositionType": "exercise",
            "id": 1,
            "targetLanguage": "es",
            "original": {
                "slug": "example-exercise",
                "heading": "Example Exercise",
                "subheading": "This is the subheading.",
                "about": "About this video.",
                "composition": {
                    "data": [
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "18MZmVDv7uo"
                            }
                        },
                        {
                            "type": "about",
                            "data": {
                                "renderHere": true
                            }
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "40978775"
                            }
                        },
                        {
                            "type": "html",
                            "data": {
                                "src": "<p>And below we have some responsive SlideShare presentations.</p>"
                            }
                        }
                    ]
                }
            },
            "translation": {
                "slug": "ejemplo-de-ejericicio",
                "heading": "Ejemplo de ejercicio",
                "subheading": "Este es el subtítulo.",
                "about": "Sobre este vídeo.",
                "composition": {
                    "data": [
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": ""
                            }
                        },
                        {
                            "type": "about",
                            "data": {
                                "renderHere": true
                            }
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": ""
                            }
                        },
                        {
                            "type": "html",
                            "data": {
                                "src": ""
                            }
                        }
                    ]
                }
            }
        }

### Save translations for a composition item [PUT]

+ Request (application/json)

        {
            "itemType": "composition",
            "compositionType": "exercise",
            "id": 1,
            "targetLanguage": "es",
            "translation": {
                "slug": "ejemplo-de-ejericicio",
                "heading": "Ejemplo de ejercicio",
                "subheading": "Este es el subtítulo.",
                "about": "Sobre este vídeo.",
                "composition": {
                    "data": [
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "PN2gYHJNT3Y"
                            }
                        },
                        {
                            "type": "about",
                            "data": {
                                "renderHere": true
                            }
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "39910208"
                            }
                        },
                        {
                            "type": "html",
                            "data": {
                                "src": "<p>Y abajo tenemos algunas presentaciones de SlideShare que son responsivas.</p>"
                            }
                        }
                    ]
                }
            }
        }
        
+ Response 200 (application/json)

## VideoFile Items [/translation/videoFile/{id}/{language}]

+ Parameters

    + id (int) ... ID of the resource
    + language (string) ... Language code for the translations, e.g. es

### Get translations for a VideoFile item [GET]
+ Response 200 (application/json)

        {
            "id": 1,
            "itemType": "VideoFile",
            "title": "Population Growth",
            "version": 1,
            "thumbnailUrl": "http://placehold.it/200x120",
            "progress": 33.33,
            "targetLanguage": {"code": "es", "label": "Spanish"},
            "sections": [
                {
                    "step": "info",
                    "label": "Info",
                    "fields": [
                        {
                            "property": "title",
                            "label": "Title",
                            "original": "Population Growth",
                            "translation": "",
                            "validators": [
                                {
                                    "validator": "required"
                                },
                                {
                                    "validator": "length",
                                    "min": 10,
                                    "max": 255
                                }
                            ]
                        },
                        {
                            "property": "slug",
                            "label": "Slug",
                            "original": "population-growth",
                            "translation": "",
                            "validators": [
                                {
                                    "validator": "length",
                                    "min": 10,
                                    "max": 255
                                }
                            ]
                        },
                        {
                            "property": "caption",
                            "label": "Caption",
                            "original": "A video on population growth",
                            "translation": "Un vídeo sobre el crecimiento de la población"
                        },
                        {
                            "property": "about",
                            "label": "About",
                            "original": "This is an in-depth analysis of population growth.",
                            "translation": ""
                        }
                    ]
                },
                {
                    "step": "subtitles",
                    "label": "Subtitles",
                    "fields": [
                        {
                            "id": 1,
                            "original": "Hi, this is a video about common misconceptions concerning population growth.",
                            "translation": "Hola, esto es un vídeo sobre los conceptos erróneos comunes sobre crecimiento de la población."
                        },
                        {
                            "id": 2,
                            "original": "My name is John Smith, and I will be your host.",
                            "translation": ""
                        }
                    ]
                }
            ]
        }

### Save translations for a VideoFile item [PUT]

+ Request (application/json)

        {
            "id": 1,
            "itemType": "VideoFile",
            "version": 1,
            "targetLanguage": {"code": "es", "label": "Spanish"},
            "sections": [
                {
                    "step": "info",
                    "fields": [
                        {   
                            "property": "title",
                            "original": "Population Growth",
                            "translation": "",
                        },
                        {
                            "property": "slug",
                            "original": "population-growth",
                            "translation": "",
                        },
                        {
                            "property": "caption",
                            "original": "A video on population growth",
                            "translation": "Un vídeo sobre el crecimiento de la población"
                        },
                        {
                            "property": "about",
                            "original": "This is an in-depth analysis of population growth.",
                            "translation": ""
                        }
                    ]
                },
                {
                    "step": "subtitles",
                    "fields": [
                        {
                            "id": 1,
                            "original": "Hi, this is a video about common misconceptions concerning population growth.",
                            "translation": "Hola, esto es un vídeo sobre los conceptos erróneos comunes sobre crecimiento de la población."
                        },
                        {
                            "id": 2,
                            "original": "My name is John Smith, and I will be your host.",
                            "translation": "Me llamo John Smith, y yo seré su anfitrión."
                        }
                    ]
                }
            ]
        }
        
+ Response 200 (application/json)

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

# Group File
File related resources

## Managing files [/files]

### Upload files [POST]

Curl example: curl -F "image[file]=@file.jpg" http://cms.gapminder.org/api/v1/files

+ Request (multipart/form-data; boundary=---BOUNDARY)

        -----BOUNDARY
        Content-Disposition: form-data; name="image[file]"; filename="image.jpg"
        Content-Type: image/jpeg
        Content-Transfer-Encoding: base64

        /9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAgGBgcGBQgHBwcJCQgKDBQNDAsLDBkSEw8UHRofHh0a
        HBwgJC4nICIsIxwcKDcpLDAxNDQ0Hyc5PTgyPC4zNDL/2wBDAQkJCQwLDBgNDRgyIRwhMjIyMjIy
        MjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjL/wAARCAABAAEDASIA
        AhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAf/xAAUEAEAAAAAAAAAAAAAAAAAAAAA/8QAFAEB
        AAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AL+AD//Z
        -----BOUNDARY

+ Response 201 (application/json)

# Group socialLink
Social link releated resources

## Existing social links [/socialLink/{id}]
Social link resource can only be accessed by the owner of the social link.

+ Parameters
    
    + id (int) ... the id of the social link resource

### Get a social link [GET]

+ Request (application/json)

    + Headers
    
            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35

+ Response 200 (application/json)

        {
            "id": "2",
            "name": "Facebook",
            "url": "facebook.com"
        }
        
### Update a social link [PUT]

+ Request (application/json)

    + Headers
    
            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35
            
    + Body
    
            {
                "id": "2",
                "name": "Facebook",
                "url": "facebook.fi"
            }

+ Response 200 (application/json)

        {
            "id": "2",
            "name": "Facebook",
            "url": "facebook.fi"
        }
        
### Delete a social link [DELETE]

+ Request (application/json)

    + Headers
    
            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35

+ Response 204 (application/json)

## New social links [/socialLink]
New social links are created for the currently authentcated user.

### Create a social link [POST]

+ Request (application/json)

    + Headers
    
            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35
            
    + Body
    
            {
                "name": "Twitter",
                "url": "twitter.fi"
            }

+ Response 200 (application/json)

        {
            "id": "3",
            "name": "Twitter",
            "url": "twitter.fi"
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
            "url": null,
            "attributes": {
                "composition_type": "qna",
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "slug": "test-go-item-slug",
                "thumb": {
                    "original": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=video.png&extension=.jpeg&lang=en",
                    "735x444": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=video.png&extension=.jpg&lang=en",
                    "160x96": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=video.png&extension=.jpg&lang=en",
                    "110x66": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=video.png&extension=.jpg&lang=en"
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
                                                "url": "http://172.17.42.1:11111/files-api/p3media/file/image?id=7&preset=original&title=Gapminder-World-2012.pdf&extension=.pdf&lang=en"
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
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=video.png&extension=.jpeg&lang=en_us",
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
                        }
                    ]
                }
            },
            "contributors": [
                {
                    "user_id": "1",
                    "username": "admin",
                    "thumbnail_url": null
                }
            ],
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
                            "original": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=video.png&extension=.jpeg&lang=en",
                            "735x444": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=video.png&extension=.jpg&lang=en",
                            "160x96": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=video.png&extension=.jpg&lang=en",
                            "110x66": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=video.png&extension=.jpg&lang=en"
                        }
                    }
                }
            ]
        }

+ Response 200 (application/json)

        {
            "node_id": 4,
            "item_type": "custom_page",
            "url": null,
            "nav_tree_to_use": "home",
            "attributes": {
                "composition_type": "presentation",
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
                                                "url": "http://172.17.42.1:11111/files-api/p3media/file/image?id=7&preset=original&title=Gapminder-World-2012.pdf&extension=.pdf&lang=en"
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
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=video.png&extension=.jpeg&lang=en_us",
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
                "url": null,
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
            "contributors": [
                {
                    "user_id": "1",
                    "username": "admin",
                    "thumbnail_url": null
                }
            ],
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
                            "original": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=video.png&extension=.jpeg&lang=en",
                            "735x444": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=video.png&extension=.jpg&lang=en",
                            "160x96": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=video.png&extension=.jpg&lang=en",
                            "110x66": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=video.png&extension=.jpg&lang=en"
                        }
                    }
                }
            ]
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
            "url": null,
            "attributes": {
                "composition_type": "qna",
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "slug": "test-go-item-slug",
                "thumb": {
                    "original": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=video.png&extension=.jpeg&lang=en",
                    "735x444": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=video.png&extension=.jpg&lang=en",
                    "160x96": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=video.png&extension=.jpg&lang=en",
                    "110x66": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=video.png&extension=.jpg&lang=en"
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
                                                "url": "http://172.17.42.1:11111/files-api/p3media/file/image?id=7&preset=original&title=Gapminder-World-2012.pdf&extension=.pdf&lang=en"
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
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=video.png&extension=.jpeg&lang=en_us",
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
                        }
                    ]
                }
            },
            "contributors": [
                {
                    "user_id": "1",
                    "username": "admin",
                    "thumbnail_url": null
                }
            ],
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
                            "original": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=video.png&extension=.jpeg&lang=en",
                            "735x444": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=video.png&extension=.jpg&lang=en",
                            "160x96": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=video.png&extension=.jpg&lang=en",
                            "110x66": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=video.png&extension=.jpg&lang=en"
                        }
                    }
                }
            ]
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
            "url": null,
            "nav_tree_to_use": "home",
            "attributes": {
                "composition_type": "presentation",
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
                                                "url": "http://172.17.42.1:11111/files-api/p3media/file/image?id=7&preset=original&title=Gapminder-World-2012.pdf&extension=.pdf&lang=en"
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
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=video.png&extension=.jpeg&lang=en_us",
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
                "url": null,
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
            "contributors": [
                {
                    "user_id": "1",
                    "username": "admin",
                    "thumbnail_url": null
                }
            ],
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
                            "original": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=video.png&extension=.jpeg&lang=en",
                            "735x444": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=video.png&extension=.jpg&lang=en",
                            "160x96": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=video.png&extension=.jpg&lang=en",
                            "110x66": "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=video.png&extension=.jpg&lang=en"
                        }
                    }
                }
            ]
        }

# Group Navbar

Navbar items.

## Navbar items [/navbar/{language}]

### Get navbar items [GET]

+ Response 200 (application/json)

        {
            "type": "menu_items",
            "data": [
                {
                    "node_id": 1,
                    "menu_label": "Top Level Item Label",
                    "caption": null,
                    "url": '/foo',
                    "children": [
                        {
                            "node_id": 2,
                            "menu_label": "Second Level Item Label",
                            "caption": null,
                            "url": "/foo/1"
                        },
                        {
                            "node_id": 3,
                            "menu_label": "Second Level Item Label",
                            "caption": null,
                            "url": "/foo/2",
                            "children": [
                                {
                                    "node_id": 4,
                                    "menu_label": "Third Level Item Label",
                                    "caption": null,
                                    "url": "/foo/2/1"
                                }
                            ]
                        }
                    ]
                },
                {
                    "node_id": 100,
                    "menu_label": "Top Level Item Label",
                    "caption": null,
                    "url": '/bar',
                    "children": [
                        {
                            "node_id": 102,
                            "menu_label": "Second Level Item Label",
                            "caption": null,
                            "url": "/bar/1"
                        },
                        {
                            "node_id": 103,
                            "menu_label": "Second Level Item Label",
                            "caption": null,
                            "url": "/bar/2",
                            "children": [
                                {
                                    "node_id": 104,
                                    "menu_label": "Third Level Item Label",
                                    "caption": null,
                                    "url": "/bar/2/1"
                                }
                            ]
                        }
                    ]
                }
            ]
        }

+ Response 200 (application/json)

        [
            {
                "title": "Learn",
                "categories": [
                    {
                        "category": "Realize",
                        "type": "icons",
                        "columnCount": 2,
                        "items": [
                            {
                                "title": "Massive Global Ignorance",
                                "description": "Among humans",
                                "icon": "",
                                "url": "http://www.gapminder.org/massive-global-ignorance"
                            },
                            {
                                "title": "Snail Trends",
                                "description": "What could never happen has already happened",
                                "icon": "",
                                "url": "http://www.gapminder.org/what-could-never-happen"
                            },
                            {
                                "title": "Important Money",
                                "description": "Most people need more money to lead a good life",
                                "icon": "",
                                "url": "http://www.gapminder.org/most-people-need-more-money"
                            }
                        ],
                        "more": {
                            "title": "More Insights",
                            "url": "http://www.gapminder.org/realize"
                        }
                    },
                    {
                        "category": "Explore",
                        "type": "icons",
                        "columnCount": 2,
                        "items": [
                            {
                                "title": "Dollar Street",
                                "description": "The world sorted by income",
                                "icon": "",
                                "url": "http://www.gapminder.org/dollar-street"
                            },
                            {
                                "title": "Visual Tools",
                                "description": "Explore global and local statistics",
                                "icon": "",
                                "url": "http://www.gapminder.org/visual-tools"
                            }
                        ],
                        "more": {
                            "title": "More Explorations",
                            "url": "http://www.gapminder.org/explorations"
                        }
                    }
                ]
            },
            {
                "title": "Teach",
                "categories": [
                    {
                        "category": "Getting Started",
                        "type": "bulletpoints",
                        "columnCount": 1,
                        "items": [
                            {
                                "title": "90-sec Intro Video",
                                "description": "In the classroom",
                                "url": "http://www.gapminder.org/90-sec-intro-video"
                            },
                            {
                                "title": "3 Simple Exercises",
                                "description": "1-minute Planning",
                                "url": "http://www.gapminder.org/3-simple-exercises"
                            },
                            {
                                "title": "Students' Favorites",
                                "description": "Teach your parents",
                                "url": "http://www.gapminder.org/students-favorites"
                            }
                        ]
                    },
                    {
                        "category": "Curriculum",
                        "type": "bulletpoints",
                        "columnCount": 1,
                        "items": [
                            {
                                "title": "Social Sciences",
                                "description": "Discuss based on facts",
                                "url": "http://www.gapminder.org/social-sciences"
                            }
                        ]
                    },
                    {
                        "category": "Curriculum",
                        "type": "bulletpoints",
                        "columnCount": 1,
                        "items": [
                            {
                                "title": "Quizzes",
                                "description": "Fun quizzes",
                                "url": "http://www.gapminder.org/quizzes"
                            },
                            {
                                "title": "Slideshows",
                                "description": "Entertainin slideshows",
                                "url": "http://www.gapminder.org/slideshows"
                            }
                        ]
                    }
                ]
            },
            {
                "title": "Participate",
                "categories": [
                    {
                        "type": "plain",
                        "columnCount": 1,
                        "items": [
                            {
                                "title": "News",
                                "description": "Follow our global activity",
                                "url": "http://www.gapminder.org/news"
                            }
                        ]
                    },
                    {
                        "type": "plain",
                        "columnCount": 1,
                        "items": [
                            {
                                "title": "Organization",
                                "description": "Mission, constitution, team, funding, and more",
                                "url": "http://www.gapminder.org/organization"
                            }
                        ]
                    },
                    {
                        "type": "plain",
                        "columnCount": 1,
                        "items": [
                            {
                                "title": "Projects",
                                "description": "About Dollar Street, Teaching Tools, and more",
                                "url": "http://www.gapminder.org/projects"
                            }
                        ]
                    },
                    {
                        "type": "plain",
                        "columnCount": 1,
                        "items": [
                            {
                                "title": "Friends",
                                "description": "Follow our global activity",
                                "url": "http://www.gapminder.org/friends"
                            }
                        ]
                    }
                ]
            },
            {
                "title": "About",
                "url": "http://www.gapminder.org/about"
            }
        ]


# Group Footer

Common footer items and links to be rendered by client apps.

## Footer items [/footer/{language}]

### Get footer items [GET]

+ Response 200 (application/json)

        {
            "socialLinks": [
                {
                    "label": "Twitter",
                    "url": "https://twitter.com/HansRosling"
                },
                {
                    "label": "Facebook",
                    "url": "https://www.facebook.com/gapminder.org"
                }
            ],
            "groupLinks": [
                {
                    "label": "Gapminder World",
                    "url": "http://www.gapminder.org/gapminder-world"
                },
                {
                    "label": "For Teachers",
                    "url": "http://www.gapminder.org/for-teachers"
                }
            ],
            "brandLinks": [
                {
                    "label": "About",
                    "url": "http://www.gapminder.org/about"
                },
                {
                    "label": "Help",
                    "url": "http://www.gapminder.org/help"
                },
                {
                    "label": "Contact",
                    "url": "http://www.gapminder.org/contact"
                },
                {
                    "label": "Blog",
                    "url": "http://www.gapminder.org/blog"
                },
                {
                    "label": "Terms",
                    "url": "http://www.gapminder.org/terms"
                },
                {
                    "label": "Privacy",
                    "url": "http://www.gapminder.org/privacy"
                },
                {
                    "label": "Donate",
                    "url": "http://www.gapminder.org/donate"
                },
                {
                    "label": "Media",
                    "url": "http://www.gapminder.org/media"
                }
            ]
        }

# Group Translate UI

Translated UI strings.

## Translation items [/translateui/{project}/{language}]

+ Parameters
    
    + project (string) ... the string ID of the project (e.g. pages)
    + language (string) ... the target language (e.g. fi)

### Get all translated UI strings for the given language items [GET]

+ Response 200 (application/json)

        {
            "navbar": {
                "login": "Kirjaudu",
                "logout": "Kirjaudu ulos"
            },
            "login-page": {
                "please-login-help": "Kirjaudu sisään syöttämällä käyttäjätunnuksesi",
                "site-uses-cookies": "(Tämä sivusto käyttää evästeitä)",
                "username-placeholder": "Käyttäjätunnus",
                "password-placeholder": "Salasana",
                "login-button-label": "Kirjaudu"
            },
            "item-page": {
                "item-not-found": "Sivua ei löydy",
                "share-heading": "Jaa",
                "thanks-to-heading": "Kiitokset",
                "participate-link-label": "Ota osaa",
                "related-heading": "Muita samanlaisia"
            },
            "page-title": {
                "home": "Etusivu",
                "login": "Kirjaudu"
            },
            "item-category": {
                "exercises": "Harjoitukset",
                "presentations": "Esitelmät",
                "qna": "Kysymykset ja vastaukset",
                "wall-charts": "Seinäkaaviot",
                "vizabi": "Vizabi"
            }
        }
        
# Group Route

Routing related resource end-points.

## Route [/route/{route}]

+ Parameters
    
    + route (string) ... the url encoded route for the item (e.g. %2Febola)
    
### Get routing info for an item [GET]

+ Response 200 (application/json)

        {
            "page_header_menu_tree": [
                {
                    "title": "Learn",
                    "categories": [
                        {
                            "category": "Realize",
                            "type": "icons",
                            "columnCount": 2,
                            "items": [
                                {
                                    "title": "Massive Global Ignorance",
                                    "description": "Among humans",
                                    "icon": "",
                                    "url": "http://www.gapminder.org/massive-global-ignorance"
                                },
                                {
                                    "title": "Snail Trends",
                                    "description": "What could never happen has already happened",
                                    "icon": "",
                                    "url": "http://www.gapminder.org/what-could-never-happen"
                                },
                                {
                                    "title": "Important Money",
                                    "description": "Most people need more money to lead a good life",
                                    "icon": "",
                                    "url": "http://www.gapminder.org/most-people-need-more-money"
                                }
                            ],
                            "more": {
                                "title": "More Insights",
                                "url": "http://www.gapminder.org/realize"
                            }
                        },
                        {
                            "category": "Explore",
                            "type": "icons",
                            "columnCount": 2,
                            "items": [
                                {
                                    "title": "Dollar Street",
                                    "description": "The world sorted by income",
                                    "icon": "",
                                    "url": "http://www.gapminder.org/dollar-street"
                                },
                                {
                                    "title": "Visual Tools",
                                    "description": "Explore global and local statistics",
                                    "icon": "",
                                    "url": "http://www.gapminder.org/visual-tools"
                                }
                            ],
                            "more": {
                                "title": "More Explorations",
                                "url": "http://www.gapminder.org/explorations"
                            }
                        }
                    ]
                },
                {
                    "title": "Teach",
                    "categories": [
                        {
                            "category": "Getting Started",
                            "type": "bulletpoints",
                            "columnCount": 1,
                            "items": [
                                {
                                    "title": "90-sec Intro Video",
                                    "description": "In the classroom",
                                    "url": "http://www.gapminder.org/90-sec-intro-video"
                                },
                                {
                                    "title": "3 Simple Exercises",
                                    "description": "1-minute Planning",
                                    "url": "http://www.gapminder.org/3-simple-exercises"
                                },
                                {
                                    "title": "Students' Favorites",
                                    "description": "Teach your parents",
                                    "url": "http://www.gapminder.org/students-favorites"
                                }
                            ]
                        },
                        {
                            "category": "Curriculum",
                            "type": "bulletpoints",
                            "columnCount": 1,
                            "items": [
                                {
                                    "title": "Social Sciences",
                                    "description": "Discuss based on facts",
                                    "url": "http://www.gapminder.org/social-sciences"
                                }
                            ]
                        },
                        {
                            "category": "Curriculum",
                            "type": "bulletpoints",
                            "columnCount": 1,
                            "items": [
                                {
                                    "title": "Quizzes",
                                    "description": "Fun quizzes",
                                    "url": "http://www.gapminder.org/quizzes"
                                },
                                {
                                    "title": "Slideshows",
                                    "description": "Entertainin slideshows",
                                    "url": "http://www.gapminder.org/slideshows"
                                }
                            ]
                        }
                    ]
                },
                {
                    "title": "Participate",
                    "categories": [
                        {
                            "type": "plain",
                            "columnCount": 1,
                            "items": [
                                {
                                    "title": "News",
                                    "description": "Follow our global activity",
                                    "url": "http://www.gapminder.org/news"
                                }
                            ]
                        },
                        {
                            "type": "plain",
                            "columnCount": 1,
                            "items": [
                                {
                                    "title": "Organization",
                                    "description": "Mission, constitution, team, funding, and more",
                                    "url": "http://www.gapminder.org/organization"
                                }
                            ]
                        },
                        {
                            "type": "plain",
                            "columnCount": 1,
                            "items": [
                                {
                                    "title": "Projects",
                                    "description": "About Dollar Street, Teaching Tools, and more",
                                    "url": "http://www.gapminder.org/projects"
                                }
                            ]
                        },
                        {
                            "type": "plain",
                            "columnCount": 1,
                            "items": [
                                {
                                    "title": "Friends",
                                    "description": "Follow our global activity",
                                    "url": "http://www.gapminder.org/friends"
                                }
                            ]
                        }
                    ]
                },
                {
                    "title": "About",
                    "url": "http://www.gapminder.org/about"
                }
            ],
            "mobile_menu_tree": {},
            "current_item": {
                "node_id": 896,
                "item_type": "custom_page",
                "url": null,
                "attributes": {
                    "composition_type": null,
                    "heading": null,
                    "subheading": null,
                    "about": null,
                    "caption": null
                },
                "page_hierarchy": {
                    "siblings": [],
                    "children": [],
                    "parent_path": []
                },
                "composition": null,
                "contributors": [],
                "related": []
            }
        }
        