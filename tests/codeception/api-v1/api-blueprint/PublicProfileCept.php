<?php
$scenario->group('data:clean-db,coverage:basic');
$I = new ApiGuy($scenario);
$I->wantTo('retrieve public profile items via the REST API as defined in api blueprint');

$I->sendGET('user/1/profile', array());
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseEquals('{
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
');
