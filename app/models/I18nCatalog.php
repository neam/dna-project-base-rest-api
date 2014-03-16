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
        return (string) !empty($this->title) ? $this->title : "I18nCatalog #" . $this->id;
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

        if (!is_null($this->pot_import_media_id)) {
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

        $p3media = $this->potImportMedia;
        $fullPath = $p3media->fullPath;

        $entries = $poparser->read($fullPath);

        return $entries;

    }

    public function getParsedPoContentsForTranslation()
    {
        $entries = $this->parsePoContents();
        $parsedForTranslation = array();
        $i = 1;
        foreach ($entries as $k => $entry) {
            $pft = new stdClass();
            $pft->id = $i;
            $pft->sourceMessage = "foo";
            $parsedForTranslation[] = $pft;
            $i++;
        }
        return $parsedForTranslation;
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
