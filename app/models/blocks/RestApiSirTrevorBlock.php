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
     * @param TranslatableResource $parent the parent node where this block is located.
     * @throws CException if the block cannot be translated.
     */
    public function translate(array $block, TranslatableResource $parent)
    {
        /** @var SirTrevorBehavior $parent */
        if ($parent->asa('sir-trevor-behavior') === null) {
            throw new \CException('Invalid parent node. Must implement `SirTrevorBehavior` keyed by `sir-trevor-behavior` in behaviors list.');
        }
        if (!isset($block['data']) || !is_array($block['data'])) {
            throw new \CException('Invalid block data. Missing or invalid `data` property.');
        }

        $this->setAttributes($block['data']);
        if (!$this->validate()) {
            throw new \CException('Invalid block data. Errors: ' . print_r($this->errors, true));
        }

        // We need the "untranslated" block for parent, so we fool it by resetting the app language that
        // is used to localize the strings, and once we have the data we set the language back to the target language.
        $targetLanguage = Yii::app()->language;
        Yii::app()->language = Yii::app()->sourceLanguage;
        $sourceBlock = $parent->getSirTrevorBlockById($this->id);
        Yii::app()->language = $targetLanguage;

        foreach ($this->getTranslatableAttributes() as $attr) {
            if (!isset($this->{$attr}, $sourceBlock['data'][$attr])) {
                continue;
            }
            $sourceMessage = \SourceMessage::ensureSourceMessage(
                $this->getTranslationCategory($attr),
                $sourceBlock['data'][$attr],
                Yii::app()->sourceLanguage
            );
            $message = \Message::model()
                ->findByAttributes(array('id' => $sourceMessage->id, 'language' => Yii::app()->language));
            if ($message === null) {
                $message = new Message();
                $message->id = $sourceMessage->id;
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
