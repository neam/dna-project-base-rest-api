<?php

class ProgressCalculationsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \CodeGuy
     */
    protected $guy;

    protected $_snapshot;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    /**
     * @group data:clean-db,coverage:paranoid
     */
    public function testZeroProgressOnNewItem()
    {

        codecept_debug("");
        foreach (DataModel::qaModels() as $model => $table) {
            codecept_debug("== $model == ");

            $item = new $model;
            $scenarios = $item->qaStateBehavior()->scenarios;

            foreach ($scenarios as $scenario) {
                codecept_debug("    Running against scenario '$scenario'");
                $this->assertEquals(0, $item->calculateValidationProgress($scenario));
            }

        }

    }

    /**
     * @group data:clean-db,coverage:paranoid
     */
    public function testProgressAfterSingleAttributeEditAndTranslation()
    {

        // For each qa-enabled model
        codecept_debug("");
        foreach (DataModel::qaModels() as $model => $table) {
            codecept_debug("== $model == ");

            $item = new $model;

            // Using the current highest level edit-scenario which will include the attributes for the lower level edit-scenarios
            $scenario = 'publishable';

            // Get the required attributes for the scenario
            $attributes = $item->scenarioSpecificAttributes($scenario);

            foreach ($attributes as $requiredAttribute) {
                codecept_debug("    Running against required attribute '$requiredAttribute'");
                $sourceLanguageContentAttribute = str_replace('_' . $item->source_language, '', $requiredAttribute);
                codecept_debug("      ...which, stripped from app source language prefix, is '$sourceLanguageContentAttribute'");

                // Use $sourceLanguageContentAttribute as the basis of the tests
                $attribute = $sourceLanguageContentAttribute;

                // Assign the attribute a valid value. TODO: Stop guessing and instead work against a dataset/fixture of known valid values for each attribute
                $item->$attribute = "Not empty, hopefully this is valid";
                $valid = $item->validate();
                if (!$valid) {
                    codecept_debug("WARNING: Skipping attribute '$attribute' since we guessed an invalid value. TODO: Stop guessing and instead work against a dataset/fixture of known valid values for each attribute");
                    codecept_debug($item->getErrors());
                    $item->$attribute = null;
                    continue;
                }

                // TODO: Find out why codeception chokes on these and resume testing the attributes below
                if (($model == "I18nCatalog" && $attribute == 'po_contents')
                    || ($model == "I18nCatalog" && $attribute == 'about')
                ) {
                    codecept_debug("WARNING: Skipping attribute '$attribute' since codeception chokes when testing the attribute. TODO: Find out why and resume testing the attribute");
                    continue;
                }

                $this->assertEquals(true, $valid);

                // Verify that edit-scenario progress is non-zero now after we filled an attribute
                $scenarioProgress = $item->calculateValidationProgress($scenario);
                $this->assertGreaterThan(0, $scenarioProgress);

                // If this attribute is translatable, we attempt to translate it
                $behaviors = $item->behaviors();
                //codecept_debug($behaviors['i18n-attribute-messages']['translationAttributes']);
                //codecept_debug($behaviors['i18n-columns']['translationAttributes']);
                $translatable =
                    (isset($behaviors['i18n-attribute-messages']) && in_array($attribute, $behaviors['i18n-attribute-messages']['translationAttributes']))
                    ||
                    (isset($behaviors['i18n-columns']) && in_array($attribute, $behaviors['i18n-columns']['translationAttributes']));

                if ($translatable) {

                    codecept_debug("    Attribute is translatable");

                    foreach (LanguageHelper::getCodes() as $language) {

                        // Skip the source language since it should not be able to translate into the source language
                        if ($language == $item->source_language) {
                            continue;
                        }

                        codecept_debug("      language = '$language''");

                        // Verify that translation progress is still 0 since we haven't translated the attribute
                        $translationProgress = $item->calculateValidationProgress('translate_into_' . $language);
                        codecept_debug("      Translation progress before translation: $translationProgress");
                        $this->assertEquals(0, $translationProgress);

                        // Translate the attribute
                        codecept_debug("        (Translation)");
                        $item->{$attribute . "_" . $language} = "Hopefully a valid translation";

                        // Verify non-intuitive behavior: Since our validation rules depend on the contents of other attributes and Yii does not rebuild the validator list except when the item is created, we will now still have 0 translation progress
                        $translationProgress = $item->calculateValidationProgress('translate_into_' . $language);
                        codecept_debug("      Translation progress after translation but before save or refresh: $translationProgress");
                        $this->assertEquals(0, $translationProgress);

                        // Save the item
                        codecept_debug("        (Save)");
                        $saveSuccess = $item->save();
                        if (!$saveSuccess) {
                            throw new SaveException($item);
                        }
                        $this->assertEquals(true, $saveSuccess);

                        // Verify non-intuitive behavior: save() does not end up in an updated validator list
                        $translationProgress = $item->calculateValidationProgress('translate_into_' . $language);
                        codecept_debug("      Translation progress after translation and save: $translationProgress");
                        $this->assertEquals(0, $translationProgress);

                        // Refresh
                        codecept_debug("        (Refresh)");
                        $item->refresh();

                        // Verify non-intuitive behavior: refresh() does not end up in an updated validator list
                        codecept_debug("      Translation progress after translation, save and refresh: $translationProgress");
                        $this->assertEquals(0, $translationProgress);

                        // Re-read from db
                        codecept_debug("        (Recreation of the item object)");
                        $model::model()->enableRestriction = false; // Turn off access restrictions for the generic model used internally to load relations.
                        $newItem = $model::model()->findByPk($item->id);
                        $this->assertInstanceOf($model, $newItem);

                        // Verify that translation progress is more than 0 since we have translated and recreated the item
                        $translationProgress = $newItem->calculateValidationProgress('translate_into_' . $language);
                        codecept_debug("      Translation progress after translation and recreation of the item object: $translationProgress");
                        $this->assertGreaterThan(0, $translationProgress);

                        // Verify that translation progress is 100 percent since we have translated all attributes that are currently translatable
                        $this->assertEquals(100, $translationProgress);

                    }

                    // Verify that edit-scenario progress is still the same as before
                    $this->assertEquals($scenarioProgress, $item->calculateValidationProgress($scenario));

                } else {
                    codecept_debug("      Attribute is not translatable");
                }

            }

        }

    }

}