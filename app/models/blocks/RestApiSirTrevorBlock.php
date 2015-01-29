<?php

/**
 * Base class for all sir trevor block models used while translating.
 *
 * @see SirTrevorBlockTranslator
 */
abstract class RestApiSirTrevorBlock extends CModel
{
    /**
     * @var int the ID of the node in which this block is a part of.
     */
    public $contextId;

    /**
     * @var string the block id, md5 hash of the blocks data.
     */
    public $id;

    /**
     * @var string the block type, must be one of the following:
     *
     * - text
     * - heading
     * - quote
     * - list
     * - linked_image
     * - todo: add more
     */
    public $type;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array(
            array('contextId, id, type', 'required'),
            array('contextId', 'numerical', 'integerOnly' => true),
            array('id', 'length', 'is' => 32),
            array('type', 'in', 'range' => array('text', 'heading', 'quote', 'list', 'linked_image')), // todo: add more
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeNames()
    {
        return array(
            'contextId',
            'id',
            'type',
        );
    }

    /**
     * Returns the category string used for storing the block translation in the `SourceMessage` db table.
     *
     * @param string $attr the attribute to get the category for.
     * @return string the category.
     */
    public function getTranslationCategory($attr)
    {
        return "{$this->contextId}-composition-block-{$this->type}-{$attr}-{$this->id}";
    }

    /**
     * Translates the Sir Trevor block.
     *
     * @param array $block the translated Sir Trevor block data.
     * @throws CException if the block cannot be translated.
     */
    public function translate(array $block)
    {
        if (!isset($block['data']) || !is_array($block['data'])) {
            throw new \CException('Invalid block data. Missing or invalid `data` property.');
        }
        $this->setAttributes($block['data']);
        if (!$this->validate()) {
            throw new \CException('Invalid block data. Errors: ' . print_r($this->errors, true));
        }
        foreach ($this->getTranslatableAttributes() as $attr) {
            if (!isset($this->{$attr})) {
                continue;
            }
            $sourceMessage = ''; // todo: get the source message string by loading the item from db (remember the block id)
            $sourceLanguage = Yii::app()->sourceLanguage;
            $source = \SourceMessage::ensureSourceMessage(
                $this->getTranslationCategory($attr),
                $sourceMessage,
                $sourceLanguage
            );
            $message = \Message::model()->findByAttributes(array(
                'id' => $source->id,
                'language' => Yii::app()->language,
            ));
            if ($message === null) {
                $message = new Message();
                $message->id = $source->id;
                $message->language = Yii::app()->language;
            }
            $message->translation = $this->{$attr};
            if (!$message->save()) {
                throw new \CException('Failed to save block translation. Errors: ' . print_r($message->errors, true));
            }
        }
    }

    /**
     * Returns the attributes that are available for translation in this block.
     *
     * @return array the attributes.
     */
    abstract public function getTranslatableAttributes();
}
