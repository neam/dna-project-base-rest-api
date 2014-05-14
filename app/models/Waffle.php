<?php

// auto-loading
Yii::setPathOfAlias('Waffle', dirname(__FILE__));
Yii::import('Waffle.*');

class Waffle extends BaseWaffle
{
    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', '');
        parent::init();
    }

    public function getItemLabel()
    {
        return (string) !empty($this->title) ? $this->title : "Waffle #" . $this->id;
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

        // Add i18n validation rules manually for the related item translations
        $attribute = "po_contents";
        $manualI18nRules = array();
        foreach (LanguageHelper::getCodes() as $language) {
            $manualI18nRules[] = array($attribute, 'validateWaffleTranslation', 'on' => 'translate_into_' . $language);

            foreach ($this->flowSteps() as $step => $fields) {
                $manualI18nRules[] = array($attribute, 'validateWaffleTranslation', 'on' => "into_$language-step_$step");
            }
        }

        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            $manualI18nRules,
            array(
                array('title', 'length', 'min' => 3, 'max' => 200),
                array('json_import_media_id', 'validateFile', 'on' => 'publishable'),

            )
        );
        //Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateFile($attribute)
    {
        if (is_null($this->json_import_media_id)) {
            $this->addError($attribute, Yii::t('app', '!validateFile'));
        }
    }

    public function validateWaffleTranslation($attribute)
    {
        if (false) {
            $this->addError($attribute, Yii::t('app', 'TODO: Waffle translation validation'));
        }
    }

    public function importFromWaffleJson($waffleJson)
    {
        // only allow for existing waffles
        if (empty($this->id)) {
            throw new CException("Waffle json-based import only viable with existing Waffles");
        }

        // json decode
        $waffle = json_decode($waffleJson);

        // start transaction
        $transaction = Yii::app()->db->beginTransaction();

        try {

            // Waffle attributes
            $this->file_format = json_encode($waffle->body->file_format);
            $this->_title = $waffle->info->title;
            $this->slug_en = $waffle->info->id;
            $this->_short_title = $waffle->info->short_title;
            $this->_description = $waffle->info->description;
            $this->link = $waffle->info->link;
            $this->publishing_date = $waffle->info->publishing_date;
            $this->url = $waffle->info->url;
            $this->license = $waffle->info->license;
            $this->license_link = $waffle->info->license_link;
            /*
             * TODO: support adding p3 medias through urls
            $model-> = $waffle->info->image_small;
            $model-> = $waffle->info->image_large;
            */

            $model = new WafflePublisher();
            $model->ref = $waffle->info->publisher->id;
            $model->_name = $waffle->info->publisher->name;
            $model->_description = $waffle->info->publisher->description;
            $model->url = $waffle->info->publisher->url;
            /*
             * TODO: support adding p3 medias through urls
            $model-> = $waffle->info->publisher->image_small;
            $model-> = $waffle->info->publisher->image_large;
            */
            if (!$model->save()) {
                throw new SaveException($model);
            }

            $this->waffle_publisher_id = $model->id;
            if (!$this->save()) {
                throw new SaveException($this);
            }

            // waffleCategories
            if (count($this->waffleCategories) > 0) {
                throw new CException("Waffle already has at least one WaffleCategory. Waffle json-based import only supported for empty Waffles");
            }
            foreach ($waffle->definitions->categories as $category) {
                $model = new WaffleCategory();
                $model->ref = $category->id;
                $model->_list_name = isset($category->list_name) ? $category->list_name : null;
                $model->_property_name = isset($category->property_name) ? $category->property_name : null;
                $model->_possessive = isset($category->possessive) ? $category->possessive : null;
                $model->_choice_format = isset($category->choice_format_expanded) ? ChoiceFormatHelper::toString($category->choice_format_expanded, $waffle->i18n->lang) : null;
                $model->_description = isset($category->description) ? $category->description : null;
                $model->waffle_id = $this->id;
                if (!$model->save()) {
                    throw new SaveException($model);
                }
                $waffleCategory = $model;
                foreach ($category->things as $thing) {
                    $model = new WaffleCategoryThing();
                    $model->ref = $thing->id;
                    $model->_name = $thing->name;
                    $model->waffle_category_id = $waffleCategory->id;
                    if (!$model->save()) {
                        throw new SaveException($model);
                    }
                }
            }

            // waffleIndicators
            if (count($this->waffleIndicators) > 0) {
                throw new CException("Waffle already has at least one WaffleIndicator. Waffle json-based import only supported for empty Waffles");
            }
            foreach ($waffle->definitions->indicators as $indicator) {
                $model = new WaffleIndicator();
                $model->ref = $indicator->id;
                $model->_name = $indicator->name;
                $model->waffle_id = $this->id;
                if (!$model->save()) {
                    throw new SaveException($model);
                }
            }

            // waffleUnits
            if (count($this->waffleUnits) > 0) {
                throw new CException("Waffle already has at least one WaffleUnit. Waffle json-based import only supported for empty Waffles");
            }
            foreach ($waffle->definitions->units as $unit) {
                $model = new WaffleUnit();
                $model->ref = $unit->id;
                $model->_name = $unit->name;
                $model->_description = isset($unit->description) ? $unit->description : null;
                $model->waffle_id = $this->id;
                if (!$model->save()) {
                    throw new SaveException($model);
                }
            }

            // waffleTags
            if (count($this->waffleTags) > 0) {
                throw new CException("Waffle already has at least one WaffleTag. Waffle json-based import only supported for empty Waffles");
            }
            foreach ($waffle->definitions->tags as $tag) {
                $model = new WaffleTag();
                $model->ref = $tag->id;
                $model->_name = $tag->name;
                $model->_description = $tag->description;
                $model->waffle_id = $this->id;
                if (!$model->save()) {
                    throw new SaveException($model);
                }
            }

            // waffleDataSources
            if (count($this->waffleDataSources) > 0) {
                throw new CException("Waffle already has at least one WaffleDataSource. Waffle json-based import only supported for empty Waffles");
            }
            foreach ($waffle->sources as $dataSource) {
                $model = new WaffleDataSource();
                $model->waffle_id = $this->id;
                throw new CException("TODO");
                if (!$waffleCategory->save()) {
                    throw new SaveException($waffleCategory);
                }
            }

            // commit transaction
            Yii::log("Commit import transaction", "trace", __METHOD__);
            $transaction->commit();

        } catch (Exception $e) {
            Yii::log("Rolling back import transaction", "trace", __METHOD__);
            $transaction->rollback();
            throw $e;
        }

    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'title_' . $this->source_language,
            ),
            'reviewable' => array(
                'slug_' . $this->source_language,
                'short_title_' . $this->source_language,
            ),
            'publishable' => array(
                'file_format',
                'license',
                'license_link',
                'waffle_publisher_id',
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
                'title_' . $this->source_language,
                'slug_' . $this->source_language,
                'short_title_' . $this->source_language,
                'description_' . $this->source_language,
                'link',
                'publishing_date',
                'url',
                'license',
                'license_link',
                'waffle_publisher_id',
            ),
            'metadata' => array(
                'file_format',
            ),
            'logo' => array(
                'image_small_media_id',
                'image_large_media_id',
            ),
            'import' => array(
                'json_import_media_id',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'metadata' => Yii::t('app', 'Metadata'),
            'logo' => Yii::t('app', 'Logo'),
            'import' => Yii::t('app', 'Import'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'slug' => Yii::t('model', 'Nice link'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', ''),
                'slug' => Yii::t('model', ''),
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
     * Returns the JSON files.
     * @return P3Media[]
     */
    public function getJsonFiles()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition("mime_type IN ('application/json','text/plain')"); // TODO: Fix JSON file mime type when uploading.
        $criteria->addCondition("t.type = 'file'");
        $criteria->addCondition("t.original_name LIKE '%.json%'");
        $criteria->limit = 100;
        $criteria->order = "t.created_at DESC";
        return P3Media::model()->findAll($criteria);
    }

    /**
     * Returns the JSON file options.
     * @return array
     */
    public function getJsonFileOptions()
    {
        return $this->getOptions($this->getJsonFiles());
    }
}
