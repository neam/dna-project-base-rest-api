<?php

/**
 * Properties available through the `I18nAttributeMessagesBehavior`:
 * @property $title
 */
class RestApiVisualization extends Visualization implements SirTrevorBlock
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
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionItemType()
    {
        return 'visualization';
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
            'state' => json_decode($this->state, true),
            'title' => $this->title,
            'tool' => $this->getToolCompositionAttributes(),
        );
    }

    /**
     * Returns the `tool` relations composition data for this resource.
     *
     * @return array|null the data array or null if no tool is found.
     */
    protected function getToolCompositionAttributes()
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