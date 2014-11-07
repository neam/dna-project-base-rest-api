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
        $languageScenarios = array();
        foreach (LanguageHelper::getCodes() as $language) {
            $languageScenarios[] = 'translate_into_' . $language;
        }

        return array_merge(
            parent::behaviors(),
            array(
                'rest-model-behavior' => array(
                    'class' => 'WRestModelBehavior',
                ),
                'RestrictedAccessBehavior' => array(
                    'class' => '\RestrictedAccessBehavior',
                ),
                'i18n-attribute-messages' => array(
                    'class' => 'I18nAttributeMessagesBehavior',
                    'translationAttributes' => array('title', 'caption', 'about'),
                    'languageSuffixes' => LanguageHelper::getCodes(),
                    'behaviorKey' => 'i18n-attribute-messages',
                    'displayedMessageSourceComponent' => 'displayedMessages',
                    'editedMessageSourceComponent' => 'editedMessages',
                ),
                'i18n-columns' => array(
                    'class' => 'I18nColumnsBehavior',
                    'translationAttributes' => array('slug'),
                    'multilingualRelations' => array('processedMedia' => 'processed_media_id'),
                ),
                'qa-state' => array(
                    'class' => 'QaStateBehavior',
                    'scenarios' => array_merge(
                        array(
                            'draft',
                            'reviewable',
                            'publishable',
                        ),
                        $languageScenarios
                    ),
                ),
                'owner-behavior' => array(
                    'class' => 'OwnerBehavior',
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
        return array(
            'id' => $this->id,
            'itemType' => 'videoFile',
            'title' => $this->title,
            'version' => 1,
            'thumbnailUrl' => $this->getThumbnailUrl(),
            'progress' => $this->getValidationProgress('translate_into_' . Yii::app()->language),
            'targetLanguage' => array(
                'code' => Yii::app()->language,
                'label' => LanguageHelper::getName(Yii::app()->language),
            ),
            'sections' => $this->getTranslationSections(),
        );
    }

    /**
     * Parses the given atrributes and updates them in the correct storage containers.
     *
     * @param array $attributes attribute structure.
     */
    public function setUpdateAttributes($attributes)
    {
        $supportedUpdateProperties = $this->getUpdateAttributes();
        if (!isset($attributes['sections']) || !is_array($attributes['sections'])) {
            throw new CHttpException(400, Yii::t('rest-api', 'Invalid input data.'));
        }
        $flowSteps = $this->flowSteps();
        foreach ($attributes['sections'] as $section) {
            if (!isset($section->step, $flowSteps[$section->step], $section->fields) || !is_array($section->fields)) {
                throw new CHttpException(400, Yii::t('rest-api', 'Invalid input data.'));
            }
            if ($section->step === 'subtitles') {
                // todo: save subtitles
            } else {
                foreach ($section->fields as $field) {
                    if (!isset($field->property, $field->translation)) {
                        throw new CHttpException(400, Yii::t('rest-api', 'Invalid input data.'));
                    }
                    $property = $field->property;
                    if (in_array($property, $supportedUpdateProperties)) {
                        // todo: do we need to specify the language?? $property .= '_' . Yii::app()->language;
                        $this->{$property} = $field->translation;
                    }
                }
            }
        }
    }

    /**
     * Returns the translatable fields per section (i.e. step).
     *
     * @return array
     */
    protected function getTranslationSections()
    {
        $sections = array();
        $translatableAttributes = $this->getTranslatableAttributes();
        $captions = $this->flowStepCaptions();
        foreach ($this->flowSteps() as $step => $stepFields) {
            $fields = array();
            foreach ($stepFields as $stepField) {
                if ($stepField === 'subtitles') {
                    $subtitles = $this->getParsedSubtitles();
                    if (is_array($subtitles)) {
                        foreach ($subtitles as $subtitle) {
                            $translation = Yii::t("video-{$this->id}-subtitles", $subtitle->sourceMessage, array(), 'displayedMessages');
                            $fields[] = array(
                                'id' => $subtitle->id,
                                'original' => $subtitle->sourceMessage,
                                'translation' => ($translation !== $subtitle->sourceMessage) ? $translation : '',
                            );
                        }
                    }
                } else {
                    $attribute = str_replace('_' . $this->source_language, '', $stepField);
                    if (!array_key_exists($attribute, $translatableAttributes)) {
                        continue;
                    }
                    if (isset($this->{$attribute})) {
                        $originalAttribute = $translatableAttributes[$attribute];
                        $fields[] = array(
                            'property' => $attribute,
                            'label' => $this->getAttributeLabel($attribute),
                            'original' => $this->{$originalAttribute},
                            'translation' => ($this->{$attribute} !== $this->{$originalAttribute}) ? $this->{$attribute} : '',
                            'validators' => $this->getFieldValidators($originalAttribute),
                        );
                    }
                }
            }
            if (!empty($fields)) {
                $sections[] = array(
                    'step' => $step,
                    'label' => isset($captions[$step]) ? $captions[$step] : $step,
                    'fields' => $fields,
                );
            }
        }
        return $sections;
    }

    /**
     * Gets validators for the field.
     * Currently, only the built in Yii validators are supported. The validators are parsed and only a selected set of
     * properties are included in the field validator response.
     *
     * @param string $attribute the attribute to get the validators for.
     * @return array the validators
     */
    protected function getFieldValidators($attribute)
    {
        $validators = array();
        $builtInValidators = array_flip(CValidator::$builtInValidators);
        // Only support the following validator attributes.
        $supportedValidatorAttributes = array(
            // Common
            'allowEmpty',
            // CValidator
            'skipOnError',
            // CDefaultValueValidator
            'value',
            // CStringValidator
            'min',
            'max',
            'is',
            // CRequiredValidator
            'requiredValue',
            // CRegularExpressionValidator
            'pattern',
            'not',
            // CEmailValidator
            'fullPattern',
            'allowName',
            // CNumberValidator
            'integerOnly',
            // CDateValidator
            'format',
            // CTypeValidator
            'type',
            'dateFormat',
            'timeFormat',
            'datetimeFormat',
        );
        foreach ($this->getValidators($attribute) as $validator) {
            if (isset($builtInValidators[get_class($validator)])) {
                $type = $builtInValidators[get_class($validator)];
                $validatorAttributes = array();
                foreach (get_object_vars($validator) as $var => $value) {
                    if (in_array($var, $supportedValidatorAttributes)) {
                        $validatorAttributes[$var] = $value;
                    }
                }
                if (!empty($validatorAttributes)) {
                    $validatorAttributes['validator'] = $type;
                    $validators[] = $validatorAttributes;
                }
            }
        }
        return $validators;
    }

    /**
     * Get the video file thumbnail url.
     * Returns a placeholder url if a real thumbnail cannot be found.
     *
     * @return string the url.
     */
    protected function getThumbnailUrl()
    {
        $url = isset($this->thumbnailMedia)
            ? $this->thumbnailMedia->createUrl('item-thumbnail', true)
            : null;
        // todo: provide a fallback profile picture when it is done/exists
        // Rewriting so that the temporary files-api app is used to serve the profile pictures
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }
} 