<?php

/**
 * Video file translation resource model.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $title
 * @property string $caption
 * @property string $about
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the WRestModelBehavior class:
 * @method array getCreateAttributes
 *
 * Methods made available through the ItemTrait class:
 * @method array getTranslatableAttributes
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
     * @inheritdoc
     */
    public function getUpdateAttributes()
    {
        return array(
            'title',
            'caption',
            'about',
            'slug',
            'subtitles',
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
            'version' => 1,
            'thumbnailUrl' => 'http://placehold.it/200x120', // todo
            'progress' => '33.33', // todo
            'targetLanguage' => array(
                'code' => Yii::app()->language,
                'label' => 'Spanish', // todo
            ),
            'sections' => $this->getTranslationSections(),
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

    /**
     * @return array
     */
    protected function getTranslationSections()
    {
        // todo: subtitles
        $sections = array();
        $translatableAttributes = $this->getTranslatableAttributes();
        $captions = $this->flowStepCaptions();
        foreach ($this->flowSteps() as $step => $stepFields) {
            $fields = array();
            foreach ($stepFields as $stepField) {
                $attribute = str_replace('_' . $this->source_language, '', $stepField);
                if (!array_key_exists($attribute, $translatableAttributes)) {
                    continue;
                }
                if (isset($this->{$attribute})) {
                    $originalAttribute = $translatableAttributes[$attribute];
                    $fields[] = array(
                        'label' => $this->getAttributeLabel($attribute),
                        'original' => $this->{$originalAttribute},
                        'translation' => $this->{$attribute},
                        'validators' => $this->getValidators($originalAttribute), // todo
                    );
                }
            }
            if (!empty($fields)) {
                $sections[] = array(
                    'label' => isset($captions[$step]) ? $captions[$step] : $step,
                    'fields' => $fields,
                );
            }
        }
        return $sections;
    }
} 