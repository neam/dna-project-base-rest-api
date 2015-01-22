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
            array('type', 'in', 'range' => array('text', 'heading', 'quote')), // todo: add more
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeNames()
    {
        return array(
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
     * Returns the attributes that are available for translation in this block.
     *
     * @return array the attributes.
     */
    abstract public function getTranslatableAttributes();
}
