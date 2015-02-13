<?php

/**
 * Base class for all sir trevor block models used while translating.
 *
 * @see SirTrevorBlockTranslator
 */
abstract class RestApiSirTrevorBlock extends CModel
{
    const MODE_DEFAULT = 'default';
    const MODE_TRANSLATION = 'translation';

    /**
     * @var TranslatableResource|SirTrevorBehavior the context model that includes this block in it's composition.
     */
    public $context;

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
     * - html_chunk
     * - download_link
     * - video_file
     */
    public $type;

    public $mode = self::MODE_DEFAULT;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array(
            array('context, id, type', 'required'),
            array('id', 'length', 'is' => 32),
            array('type', 'in', 'range' => array('text', 'heading', 'quote', 'list', 'linked_image', 'html_chunk', 'download_link', 'video_file')),
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeNames()
    {
        return array(
            'context',
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
        $contextId = (int)$this->context->id;
        $contextClass = get_class($this->context);
        return "{$contextId}-a-{$contextClass}-composition-{$this->type}-{$attr}-{$this->id}";
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

        $sourceBlock = $this->context->getSirTrevorBlockById($this->id);
        foreach ($this->getTranslatableAttributes() as $attr) {
            if (!isset($this->{$attr}, $sourceBlock['data'][$attr]) || empty($sourceBlock['data'][$attr])) {
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
     * Applies the translations to this block and returns the translated attributes.
     * By default, only the attributes marked as `translatable` will be returned.
     * Override this method if more data is needed.
     *
     * @return array the translated attributes.
     */
    public function getTranslatedBlockData()
    {
        $translations = array();
        foreach ($this->getTranslatableAttributes() as $attr) {
            if (isset($this->{$attr})) {
                $source = $this->{$attr};
                $translation = \Yii::t($this->getTranslationCategory($attr), $source, array(), 'displayedMessages');
                $translations[$attr] = $this->{$attr} = $translation;
            }
        }
        return $translations;
    }

    /**
     * Returns the progress of translation for this block.
     *
     * @return int the progress percent as an integer.
     */
    public function getTranslationProgress()
    {
        $attributes = $this->getTranslatableAttributes();
        $countAttributes = count($attributes);
        $countTranslated = 0; // todo: get this
        if ($countTranslated > 0) {
            return (int)round(($countTranslated / $countAttributes) * 100);
        }
        return 0;
    }

    /**
     * Returns the un-translated attributes for this block.
     * By default, only the attributes marked as `translatable` will be returned.
     * Override this method if more data is needed.
     *
     * @return array the un-translated attributes.
     */
    public function getRawBlockData()
    {
        $attributes = array();
        foreach ($this->getTranslatableAttributes() as $attr) {
            if (isset($this->{$attr})) {
                $attributes[$attr] = $this->{$attr};
            }
        }
        return $attributes;
    }

    /**
     * Returns the attributes that are available for translation in this block.
     *
     * @return array the attributes.
     */
    abstract public function getTranslatableAttributes();
}
