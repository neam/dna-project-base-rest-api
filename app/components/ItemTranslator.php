<?php

/**
 * Translator app component for translating item resources, including composition (sir trevor) blocks.
 */
class ItemTranslator extends CApplicationComponent
{
    /**
     * @var array map of sir trevor block models indexed on block type (must extend the RestApiSirTrevorBlock base class).
     */
    protected static $modelMap = array(
        'text' => 'RestApiSirTrevorBlockText',
    );

    /**
     * @param TranslatableResource $model
     * @param array $params
     */
    public function translate(TranslatableResource $model, array $params)
    {
        $attributes = $model->getTranslatableAttributes();
        if (!empty($attributes) && !empty($params)) {
            foreach ($params as $attr => $value) {
                if (!in_array($attr, $attributes)) {
                    continue;
                }
                if (is_string($value)) {
                    // regular model string attributes
                    // todo: how on earth do you translate these? assign the new value to $model->heading or $model->_heading or $model->heading_sv or what?
                } elseif (is_array($value)) {
                    if ($attr === 'composition' && isset($value['data']) && is_array($value['data'])) {
                        // sir trevor composition blocks
                        foreach ($value['data'] as $block) {
                            $this->translateSirTrevorBlock($model, $block);
                        }
                    }
                }
            }
        }
    }

    /**
     * Translates a sir trevor block using Yii::t(), i.e. writes the new translation into the `Message` db table.
     *
     * @param TranslatableResource $model the resource model where the block is defined.
     * @param array $block the block data to translate
     * @throws CException if the passed block data is invalid.
     */
    protected function translateSirTrevorBlock(TranslatableResource $model, array $block)
    {
        $model = $this->loadSirTrevorBlockModel($block);
        if ($model !== null) {
            $model->attributes = $block;
            $model->contextId = $model->node_id; // todo: create getter that is defined in the interface
            if (!$model->validate()) {
                throw new CException('Invalid sir trevor block data passed to translator. Errors: ' . print_r($model->errors, true));
            }
            foreach ($model->getTranslatableAttributes() as $attr) {
                if (!isset($model->data[$attr])) {
                    continue;
                }
                $sourceMessage = ''; // todo: get the source message string by loading the item from db (remember the block id)
                $sourceLanguage = '';  // todo: get the source language from somewhere
                $source = SourceMessage::ensureSourceMessage(
                    $model->getTranslationCategory($attr),
                    $sourceMessage,
                    $sourceLanguage
                );
                $message = Message::model()->findByAttributes(array(
                    'id' => $source->id,
                    'language' => Yii::app()->language,
                ));
                if ($message === null) {
                    $message = new Message();
                    $message->id = $source->id;
                    $message->language = Yii::app()->language;
                }
                $message->translation = $model->data[$attr];
                if (!$message->save()) {
                    throw new CException('Failed to save block translation. Errors: ' . print_r($message->errors, true));
                }
            }
        }
    }

    /**
     * Loads a `RestApiSirTrevorBlock` model based on passed data.
     *
     * @param array $block the block data.
     * @return RestApiSirTrevorBlock|null the block model or null if we do not support translation of the block type.
     * @throws CException if the passed data is insufficient to create a block model of.
     */
    protected function loadSirTrevorBlockModel(array $block)
    {
        if (!isset($block['type'])) {
            throw new CException('Invalid sir trevor block data passed to translator. Block `type` missing.');
        }
        if (!isset(self::$modelMap[$block['type']])) {
            return null;
        }
        $className = self::$modelMap[$block['type']];
        $model = new $className();
        return $model;
    }
}
