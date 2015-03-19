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
     * @var TranslatableResource the context model that includes this block in it's composition.
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
     * - item_list_config
     * - slideshow_file
     * - visualization
     */
    public $type;

    /**
     * @var string
     */
    public $mode = self::MODE_DEFAULT;

    /**
     * @var int
     */
    protected $countTranslated = 0;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array(
            array('context, id, type', 'required'),
            array('id', 'length', 'is' => 32),
            array('type', 'in', 'range' => array('text', 'heading', 'quote', 'list', 'linked_image', 'html_chunk', 'download_link', 'video_file', 'item_list_config', 'slideshow_file', 'visualization')),
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

        $sourceBlock = SirTrevorParser::getSirTrevorBlockById($this->context->composition, $this->id, array('parent' => $this->context));
        foreach ($this->getTranslatableAttributes() as $attr) {
            if (!isset($this->{$attr}, $sourceBlock['data'][$attr]) || empty($sourceBlock['data'][$attr])) {
                continue;
            }
            $sourceMessage = $sourceBlock['data'][$attr];
            $message = $this->{$attr};
            $sourceMessageModel = \SourceMessage::ensureSourceMessage(
                $this->getTranslationCategory($attr),
                $sourceMessage,
                Yii::app()->sourceLanguage
            );
            $messageModel = \Message::model()
                ->findByAttributes(array('id' => $sourceMessageModel->id, 'language' => Yii::app()->language));

            $dirty = false;
            if ($messageModel === null) {
                if ($sourceMessage !== $message) {
                    $messageModel = new Message();
                    $messageModel->id = $sourceMessageModel->id;
                    $messageModel->language = Yii::app()->language;
                    $messageModel->translation = $message;
                    $dirty = true;
                }
            } else if ($messageModel->translation !== $message) {
                $messageModel->translation = $message;
                $dirty = true;
            }

            if ($dirty && !$messageModel->save()) {
                throw new \CException('Failed to save block translation. Errors: ' . print_r($messageModel->errors, true));
            }
        }
    }

    /**
     * Applies the translations to this block and returns the translated attributes.
     * By default, only the attributes marked as `translatable` will be returned.
     * Override method `applyTranslations` and/or `getBlockData` for specific implementations.
     *
     * @return array the translated attributes.
     */
    public function getTranslatedBlockData()
    {
        $this->applyTranslations();
        return $this->getBlockData();
    }

    /**
     * Returns the un-translated attributes for this block.
     * By default, only the attributes marked as `translatable` will be returned.
     * Override method `getBlockData` for specific implementations.
     *
     * @return array the un-translated attributes.
     */
    public function getRawBlockData()
    {
        return $this->getBlockData();
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
        $countTranslated = $this->countTranslated;
        if ($countTranslated > 0) {
            return (int)round(($countTranslated / $countAttributes) * 100);
        }
        return 0;
    }

    /**
     * Applies the translations to the blocks and updates the `$this->countTranslated` accordingly.
     */
    protected function applyTranslations()
    {
        foreach ($this->getTranslatableAttributes() as $attr) {
            if (isset($this->{$attr})) {
                $source = $this->{$attr};
                $translation = \Yii::t($this->getTranslationCategory($attr), $source, array(), 'displayedMessages');
                if ($translation !== $source) {
                    $this->{$attr} = $translation;
                    $this->countTranslated++;
                }
            }
        }
    }

    /**
     * Returns the block data.
     *
     * @return array the data.
     */
    protected function getBlockData()
    {
        $data = array();
        foreach ($this->getTranslatableAttributes() as $attr) {
            if (isset($this->{$attr})) {
                $data[$attr] = $this->{$attr};
            }
        }
        return $data;
    }

    /**
     * Returns the attributes that are available for translation in this block.
     *
     * @return array the attributes.
     */
    abstract public function getTranslatableAttributes();
}
