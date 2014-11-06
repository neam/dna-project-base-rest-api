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

# Group VideoFile
Video file related resources

## VideoFile collection [/videoFile]
### List all video files [GET]
+ Response 200 (application/json)

        [
            {
                "id": 1
            },
            {
                "id": 2
            }
        ]


## VideoFile [/videoFile/{slug}/{lang}]

+ Parameters

    + slug (string) ... the slug or id of the video file resource
    + lang (string) ... the language of the video file resource (translation)

### Get a video file [GET]
+ Response 200 (application/json)

        {
            "id": 1,
            "title": "El crecimiento de la población",
            "subheading": "Respuesta corta: no sé.",
            "youtubeId": "18MZmVDv7uo",
            "about": "En este video <a href=\"/#/\">Hans Rosling</a> señala conceptos erróneos comunes sobre crecimiento de la población. En un lugar de la Mancha, de cuyo nombre no quiero acordarme, no ha mucho tiempo que vivía un hidalgo de los de lanza en astillero, adarga antigua, rocín flaco y galgo corredor. Una olla de algo más vaca que carnero, salpicón las más noches, duelos y quebrantos los sábados, lantejas los viernes, algún palomino de añadidura los domingos, consumían las tres partes de su hacienda.",
            "contributors": [
                {
                    "userId": 1,
                    "username": "anna-mia-ekstrom",
                    "thumbnailUrl": "http://placehold.it/200x200"
                },
                {
                    "userId": 2,
                    "username": "olarosling",
                    "thumbnailUrl": "http://placehold.it/200x200"
                },
                {
                    "userId": 3,
                    "username": "fredrikwollsen",
                    "thumbnailUrl": "http://placehold.it/200x200"
                },
                {
                    "userId": 4,
                    "username": "jimipirila",
                    "thumbnailUrl": "http://placehold.it/200x200"
                },
                {
                    "userId": 5,
                    "username": "arthurcamara",
                    "thumbnailUrl": "http://placehold.it/200x200"
                },
                {
                    "userId": 6,
                    "username": "amirrahnama",
                    "thumbnailUrl": "http://placehold.it/200x200"
                },
                {
                    "userId": 7,
                    "username": "fernanda",
                    "thumbnailUrl": "http://placehold.it/200x200"
                },
                {
                    "userId": 8,
                    "username": "max",
                    "thumbnailUrl": "http://placehold.it/200x200"
                },
                {
                    "userId": 9,
                    "username": "mariosanchez",
                    "thumbnailUrl": "http://placehold.it/200x200"
                }
            ],
            "related": [
                {
                    "title": "Niños nacidos por mujer por región",
                    "thumbnailUrl": "http://placehold.it/200x160",
                    "itemType": "video",
                    "itemPermalink": "ninos-nacidos-por-mujer-por-region",
                    "itemLang": "es"
                },
                {
                    "title": "Salud, dinero y sexo en Suecia",
                    "thumbnailUrl": "http://placehold.it/200x160",
                    "itemType": "video",
                    "itemPermalink": "salud-dinero-y-sexo-en-suecia",
                    "itemLang": "es"
                }
            ]
        }

# Group Translate
Translation related resources

## Item translations [/translate/{itemType}/{id}/{language}]

+ Parameters

    + itemType (string) ... Type of resource, e.g. VideoFile
    + id (int) ... ID of the resource
    + language (string) ... Language code for the translations, e.g. es

### Get translations for an item [GET]
+ Response 200 (application/json)

        {
            "id": 1,
            "itemType": "VideoFile",
            "title": "Population Growth",
            "version": 1,
            "thumbnailUrl": "http://placehold.it/200x120",
            "progress": 33.33,
            "targetLanguage": {"code": "es", "label": "Spanish",
            "sections": [
                {
                    "label": "Info",
                    "fields": [
                        {
                            "label": "Title",
                            "original": "Population Growth",
                            "translation": "",
                            "validators": [
                                {
                                    "type": "required"
                                },
                                {
                                    "type": "minLength",
                                    "min": 10
                                },
                                {
                                    "type": "maxLength",
                                    "max": 255
                                }
                            ]
                        },
                        {
                            "label": "Slug",
                            "original": "population-growth",
                            "translation": "",
                            "validators": [
                                {
                                    "type": "minLength",
                                    "min": 10
                                },
                                {
                                    "type": "maxLength",
                                    "max": 255
                                }
                            ]
                            },
                        {
                            "label": "Caption",
                            "original": "A video on population growth",
                            "translation": "Un vídeo sobre el crecimiento de la población"
                        },
                        {
                            "label": "About",
                            "original": "This is an in-depth analysis of population growth.",
                            "translation": ""
                        }
                    ]
                },
                {
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

### Save translations for an item [PUT]
+ Request (application/json)

        {
            "id": 1,
            "itemType": "VideoFile",
            "version": 1,
            "targetLanguage": {"code": "es", "label": "Spanish",
            "sections": [
                {
                    "label": "Info",
                    "fields": [
                        {
                            "label": "Title",
                            "original": "Population Growth",
                            "translation": "",
                            "validators": [
                                {
                                    "type": "required"
                                },
                                {
                                    "type": "minLength",
                                    "min": 10
                                },
                                {
                                    "type": "maxLength",
                                    "max": 255
                                }
                            ]
                        },
                        {
                            "label": "Slug",
                            "original": "population-growth",
                            "translation": "",
                            "validators": [
                                {
                                    "type": "minLength",
                                    "min": 10
                                },
                                {
                                    "type": "maxLength",
                                    "max": 255
                                }
                            ]
                            },
                        {
                            "label": "Caption",
                            "original": "A video on population growth",
                            "translation": "Un vídeo sobre el crecimiento de la población"
                        },
                        {
                            "label": "About",
                            "original": "This is an in-depth analysis of population growth.",
                            "translation": ""
                        }
                    ]
                },
                {
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
                            "translation": "Me llamo John Smith, y yo seré su anfitrión."
                        }
                    ]
                }
            ]
        }

+ Response 200 (application/json)

# Group Language
Language related resources

## List of supported languages [/language/list]

### Get languages [GET]
+ Response 200 (application/json)

        {
            "en_us": {
                "name": "English (United States)",
                "direction": "ltr"
            },
            "es": {
                "name": "Spanish",
                "direction": "ltr"
            },
            "sv": {
                "name": "Swedish",
                "direction": "ltr"
            },
            "fi": {
                "name": "Finnish",
                "direction": "ltr"
            },
            "ja": {
                "name": "Japanese",
                "direction": "ltr"
            },
            "pt_br": {
                "name": "Portuguese (Brazil)",
                "direction": "ltr"
            },
            "fa": {
                "name": "Farsi",
                "direction": "rtl"
            },
            "zh_tw": {
                "name": "Chinese (Taiwan & Hong Kong)",
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

# Group Composition Items

A composition item consists of one or more *Sir Trevor* blocks. In order to render the primary visual
element on the *Go* page, composite item types will be evaluated differently. For example, a YouTube video
will be rendered as the main element if it is the first block in the item data array and if the
item type in question is a *QnA* item.

The *about* block type is a placeholder indicating that the about property should be rendered in its place,
and thus content creators get more granular control over block order.

## Composite item [/item/{id}]

+ Parameters

    + id (string) ... the slug or ID of the composition item

### Get a composite item [GET]

+ Response 200 (application/json)

        {
            "heading": "Example Item",
            "subheading": "This is the subheading.",
            "about": "<h2>Overview</h2>This is an <em>example item</em>.\n<h2>Sidenotes</h2><ul><li>Foo</li><li>Bar</li></ul>",
            "item_type": "composition",
            "composition_type": "exercise",
            "composition": [
                {
                    "type": "about",
                    "data": {
                        "renderHere": true
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
                    "type": "video-file",
                    "data": {
                        "title": "Example Video",
                        "about": "This is an example video.",
                        "id": 1
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
                    "type": "download-link",
                    "data": {
                        "title": "Example Report",
                        "url": "http://example.com/report.pdf"
                    }
                },
                {
                    "type": "download-links",
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
                    "type": "linked-image",
                    "data": {
                        "title": "Example Chart",
                        "image_url": "http://placehold.it/640x480",
                        "link_url": "http://example.com/chart.pdf"
                    }
                },
                {
                    "type": "slideshare",
                    "data": {
                        "remote_id": "12345678"
                    }
                },
                {
                    "type": "slideshow-item",
                    "data": {
                        "title": "Example Slideshow",
                        "about": "This is an example slideshow.",
                        "id": 1
                    }
                }
            ],
            "related": [
                {
                    "title": "Related Item #1",
                    "subheading": "This is an example item.",
                    "id": 2,
                    "slug": "related-item-1",
                    "item_type": "composition",
                    "composition_type: "exercise",
                },
                {
                    "title": "Related Item #2",
                    "subheading": "This is an example item.",
                    "id": 3,
                    "slug": "related-item-2",
                    "item_type": "composition",
                    "composition_type: "qna",
                }
            ]
        }

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
