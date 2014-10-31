<?php

/**
 * Video file translation resource model.
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the WRestModelBehavior class:
 * @method array getCreateAttributes
 * @method array getUpdateAttributes
 */
class RestApiVideoFileTranslation extends VideoFile
{
    /**
     * @inheritdoc
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                'rest-model-behavior' => array(
                    'class' => 'WRestModelBehavior',
                ),
                'RestrictedAccessBehavior' => array(
                    'class' => '\RestrictedAccessBehavior',
                ),
            )
        );
    }

    /**
     * The attributes that is returned by the REST api.
     *
     * @return array the response.
     */
    public function getAllAttributes()
    {
        // todo: add real data
        return array(
            'id' => $this->id,
            'itemType' => 'videoFile',
            'title' => $this->title,
            'version' => '',
            'thumbnailUrl' => '',
            'progress' => '',
            'targetLanguage' => array(
                'code' => '',
                'label' => '',
            ),
            'sections' => array(
                array(
                    'label' => 'info',
                    'fields' => array(
                        array(
                            'label' => '',
                            'original' => '',
                            'translation' => '',
                            'validators' => array(
                                array(
                                    'type' => 'required',
                                )
                            ),
                        )
                    ),
                ),
                array(
                    'label' => 'subtitles',
                    'fields' => array(
                        array(
                            'id' => '',
                            'original' => '',
                            'translation' => '',
                            'validators' => array(
                                array(
                                    'type' => 'required',
                                )
                            ),
                        )
                    ),
                ),
            ),
        );

//        {
//            "id": 1,
//            "itemType": "VideoFile",
//            "title": "Population Growth",
//            "version": 1,
//            "thumbnailUrl": "http://placehold.it/200x120",
//            "progress": 33.33,
//            "targetLanguage": {"code": "es", "label": "Spanish",
//            "sections": [
//                {
//                    "label": "Info",
//                    "fields": [
//                        {
//                            "label": "Title",
//                            "original": "Population Growth",
//                            "translation": "",
//                            "validators": [
//                                {
//                                    "type": "required"
//                                },
//                                {
//                                    "type": "minLength",
//                                    "min": 10
//                                },
//                                {
//                                    "type": "maxLength",
//                                    "max": 255
//                                }
//                            ]
//                        },
//                        {
//                            "label": "Slug",
//                            "original": "population-growth",
//                            "translation": "",
//                            "validators": [
//                                {
//                                    "type": "minLength",
//                                    "min": 10
//                                },
//                                {
//                                    "type": "maxLength",
//                                    "max": 255
//                                }
//                            ]
//                            },
//                        {
//                            "label": "Caption",
//                            "original": "A video on population growth",
//                            "translation": "Un vÃ­deo sobre el crecimiento de la poblaciÃ³n"
//                        },
//                        {
//                            "label": "About",
//                            "original": "This is an in-depth analysis of population growth.",
//                            "translation": ""
//                        }
//                    ]
//                },
//                {
//                    "label": "Subtitles",
//                    "fields": [
//                        {
//                            "id": 1,
//                            "original": "Hi, this is a video about common misconceptions concerning population growth.",
//                            "translation": "Hola, esto es un vÃ­deo sobre los conceptos errÃ³neos comunes sobre crecimiento de la poblaciÃ³n."
//                        },
//                        {
//                            "id": 2,
//                            "original": "My name is John Smith, and I will be your host.",
//                            "translation": ""
//                        }
//                    ]
//                }
//            ]
//        }
    }
} 