<?php

/**
 * Properties available through the `I18nAttributeMessagesBehavior`:
 * @property $title
 */
abstract class BaseRestApiVisualization extends Visualization
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        // Implement only the behaviors we need instead of inheriting them to increase performance.
        return array(
            'i18n-attribute-messages' => array(
                'class' => 'I18nAttributeMessagesBehavior',
                'translationAttributes' => array(
                    'title',
                ),
                'languageSuffixes' => LanguageHelper::getCodes(),
                'behaviorKey' => 'i18n-attribute-messages',
                'displayedMessageSourceComponent' => 'displayedMessages',
                'editedMessageSourceComponent' => 'editedMessages',
            ),
            'RestrictedAccessBehavior' =>  array(
                'class' => '\RestrictedAccessBehavior',
            ),
        );
    }

    /**
     * Returns the `tool` relations composition data for this resource.
     *
     * @return array|null the data array or null if no tool is found.
     */
    public function getToolCompositionAttributes()
    {
        if ($this->tool !== null) {
            return array(
                'ref' => $this->tool->ref,
                'title' => $this->tool->title,
                'slug' => $this->tool->slug,
                'about' => $this->tool->about,
                'language' => array(
                    'id' => Yii::app()->language,
                    'strings' => array(
                        Yii::app()->language => array_merge(
                            array('title' => $this->title),
                            $this->getToolTranslationCompositionAttributes()
                        )
                    )
                ),
            );
        }
        return null;
    }

    /**
     * Returns the translations form the tool i18n catalog .po file.
     *
     * The result is formatted like:
     *
     * array(
     *    "buttons/find" => "Find",
     *    "buttons/colors" => "Colors",
     *    ...
     * )
     *
     * @return array the translations.
     */
    protected function getToolTranslationCompositionAttributes()
    {
        $result = array();
        if ($this->tool !== null && $this->tool->i18nCatalog !== null) {
            $messages = \neam\po2json\Po2Json::parseVariable($this->tool->i18nCatalog->po_contents);
            $translations = $this->tool->i18nCatalog->translatePoJsonMessages($messages, Yii::app()->language);
            if (!empty($translations)) {
                foreach ($translations as $key => $item) {
                    if (empty($key))
                        continue;

                    $context = explode("\x04", $key);
                    if (!isset($context[0]))
                        continue;

                    $result[$context[0]] = isset($item[1]) ? $item[1] : (isset($item[0]) ? $item[0] : null);
                }
            }
        }
        return $result;
    }
}
