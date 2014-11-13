<?php
$scenario->group('data:clean-db,coverage:basic');
$I = new ApiGuy($scenario);
$I->wantTo('retrieve video file translations via the REST API as defined in api blueprint');

$I->sendGET('translation/videoFile/1/es', array());

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseEquals('{
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
}');