<?php

// auto-loading
Yii::setPathOfAlias('I18nCatalog', dirname(__FILE__));
Yii::import('I18nCatalog.*');

class I18nCatalog extends BaseI18nCatalog
{
    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'For developers to manage GUI string po-files.');
        parent::init();
    }

    public function getItemLabel()
    {
        return (string)!empty($this->title) ? $this->title : "I18nCatalog #" . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function rules()
    {

        // The field po_contents is not itself translated, but contains translated contents, so need to add i18n validation rules manually for the field
        $attribute = "po_contents";
        $manualI18nRules = array();
        foreach (Yii::app()->params["languages"] as $language => $label) {
            $manualI18nRules[] = array($attribute, 'validatePoContentsTranslation', 'on' => 'translate_into_' . $language);

            foreach ($this->flowSteps() as $step => $fields) {
                $manualI18nRules[] = array($attribute, 'validatePoContentsTranslation', 'on' => "into_$language-step_$step");
            }
        }

        // Necessary to be able to set po_contents_{en} from the import step (po_contents_{en} is in i18n step, so this validation rule is not automatically generated)
        $manualI18nRules[] = array($attribute . '_' . $this->source_language, 'safe', 'on' => implode("-step_import,", array('temporary', 'draft', 'reviewable', 'publishable')) . "-step_import,step_import");

        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            $manualI18nRules,
            array(

                array('title', 'length', 'min' => 10, 'max' => 200),
                array('about', 'length', 'min' => 3, 'max' => 400),
                array('pot_import_media_id', 'validateFile', 'on' => implode("-step_import,", array('temporary', 'draft', 'reviewable', 'publishable')) . "-step_import,step_import"),
                array('po_contents', 'validatePoContents', 'on' => 'publishable'),

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateFile($attribute)
    {
        if (is_null($this->pot_import_media_id)) {
            $this->addError($attribute, Yii::t('app', '!validateFile'));
        }
    }

    public function validatePoContents($attribute)
    {

        if (!is_null($this->po_contents)) {
            $entries = $this->parsePoContents();
            if (!$entries) {
                $this->addError($attribute, Yii::t('app', 'Could not parse po contents'));
            }
        }

    }

    public function validatePoContentsTranslation($attribute)
    {
        if (true) {
            $this->addError($attribute, Yii::t('app', 'TODO: Po Contents translation validation'));
        }
    }

    /**
     * TODO html-length...
     * @return bool
     */
    public function htmlLength()
    {
        if (false) {
        }
    }

    /**
     * @return Array contains every string information in your pofile
     */
    public function parsePoContents()
    {

        $poparser = new Sepia\PoParser();
        $entries = $poparser->readVariable($this->po_contents);
        return $entries;

    }

    /**
     * Converts the parsed po entries to source messages in choiceformat (if plural_form entry) for translation
     * @return array
     * @throws CException
     */
    public function getParsedPoContentsForTranslation()
    {
        $entries = $this->parsePoContents();
        $parsedForTranslation = array();

        $i = 1;

        //$intoLocale = CLocale::getInstance($translateInto);
        //var_dump($sourceLocale->pluralRules, $intoLocale->pluralRules);

        foreach ($entries as $translationKey => $t) {

            $pft = new stdClass();
            $pft->id = $i;
            $pft->reference = $t['reference'];
            $pft->fuzzy = isset($t['fuzzy']) ? $t['fuzzy'] : null;

            $entry = array();
            if (isset($t["msgid_plural"])) {
                $entry[0] = isset($t["msgid_plural"]) ? $t["msgid_plural"][0] : null;
                $entry[1] = $t["msgstr"][0];
                isset($t["msgstr"][1]) ? ($entry[2] = $t["msgstr"][1]) : null;
                isset($t["msgstr"][2]) ? ($entry[3] = $t["msgstr"][2]) : null;
            } else {
                $entry[0] = null;
                $entry[1] = implode("", $t["msgstr"]);
            }

            // msg id json format
            if ($t["msgid"][0] == '' && isset($t["msgid"][1])) {
                array_shift($t["msgid"]);
                $msgid = implode("", $t["msgid"]);
            } else {
                $msgid = implode("", $t["msgid"]);
            }

            // source message context as metadata
            if (isset($t["msgctxt"][0])) {
                $pft->context = implode("", $t["msgctxt"]);
            }

            // convert to choice format if necessary
            if (isset($t["msgid_plural"])) {
                $sourceLocale = CLocale::getInstance($this->source_language);
                // Po format only supports two plural forms as source message (?) so we hard-code it for two plural forms
                $pft->sourceMessage = $sourceLocale->pluralRules[0] . "#" . $msgid . "|" . $sourceLocale->pluralRules[1] . "#" . $entry[0];
                $pft->plural_forms = true;
            } else {
                $pft->sourceMessage = $msgid;
                $pft->plural_forms = false;
            }

            /*
            // do not include fuzzy messages if not wanted
            if (!empty($t["fuzzy"])) {
                if (!$fuzzy) {
                    continue;
                } else {
                    // todo
                    // if (!fuzzy || options . fuzzy) {result}[translationKey] = [t . msgid_plural ? t . msgid_plural : null] . concat(t . msgstr);
                    throw new \CException("TODO");
                }
            }
            */

            $parsedForTranslation[] = $pft;
            $i++;
        }
        return $parsedForTranslation;
    }

    public function translatePoJsonMessages($messages, $lang)
    {
        $category = $this->getTranslationCategory('po_contents');
        $return = $messages;
        foreach ($return as $key => &$entry) {

            // Skip headers entry
            if (empty($key)) {
                continue;
            }

            // The entry has plural forms if the first array element is not null
            if (!is_null($entry[0])) {

                // The source content first plural form (the singular form) is the $key, the second plural form is the first $entry element
                $sourceMessage = ChoiceFormatHelper::toString(array($key, $entry[0]), $this->source_language);
                $message = Yii::t($category, $sourceMessage);

                // The translation should be sent as elements 1->end of array
                $entry = array($entry[0]);
                //var_dump($sourceMessage, $message, ChoiceFormatHelper::toArray($message, $lang));
                $translationChoiceFormatArray = ChoiceFormatHelper::toArray($message, $lang);
                foreach ($translationChoiceFormatArray as $pluralForm => $translation) {
                    //var_dump($pluralForm, $translation);

                    // Special fallback - in case the target language has more plural forms than the source language we'll supply the "true" plural form as fallback for the non-existing plural forms
                    if (is_null($translation)) {
                        $translation = $translationChoiceFormatArray["true"];
                    }

                    $entry[] = $translation;
                }

            } else {
                $sourceMessage = $key;
                $message = Yii::t($category, $sourceMessage);
                // The translation should be sent as element 1
                $entry[1] = $message;
            }

        }
        return $return;
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'title',
            ),
            'reviewable' => array(
                'po_contents_' . $this->source_language,
            ),
            'publishable' => array(
                'about',
            ),
        );
    }

    /**
     * Define step-dependent fields
     * @return array
     */
    public function flowSteps()
    {
        return array(
            'info' => array(
                'title',
                'about',
            ),
            'i18n' => array(
                'i18n_category',
                'po_contents_' . $this->source_language,
            ),
            'import' => array(
                'pot_import_media_id',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'i18n' => Yii::t('app', 'I18n'),
            'import' => Yii::t('app', 'Import'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'about' => Yii::t('model', 'About'),
                'file' => Yii::t('model', 'File'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Title'),
                'about' => Yii::t('model', 'What is this .po file for?'),
                'file' => Yii::t('model', 'The actual file'),
            )
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

    /**
     * Returns the PO files.
     * @return P3Media[]
     */
    public function getPoFiles()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition("mime_type IN ('text/x-po','text/plain')");
        $criteria->addCondition("t.type = 'file'");
        $criteria->addCondition("t.original_name LIKE '%.po%'");
        $criteria->limit = 100;
        $criteria->order = "t.created_at DESC";
        return P3Media::model()->findAll($criteria);
    }

    /**
     * Returns the PO file options.
     * @return array
     */
    public function getPoOptions()
    {
        return $this->getOptions($this->getPoFiles());
    }

    /**
     * Returns the translation category for the current model and attribute.
     * @return string
     */
    public function getTranslationCategory($attribute)
    {
        return 'i18n_catalog-' . $this->id . '-' . $attribute;
    }

}
