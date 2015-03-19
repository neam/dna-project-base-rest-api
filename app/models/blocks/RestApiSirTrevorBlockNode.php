<?php

/**
 * Base class for Sir Trevor blocks that refer to a translatable node, e.g. video files, download links.
 */
abstract class RestApiSirTrevorBlockNode extends RestApiSirTrevorBlock
{
    /**
     * @var int the referred node id.
     */
    public $nodeId;

    /**
     * @inheritdoc
     */
    public function translate(array $block)
    {
        if (!isset($block['data'], $block['data']['node_id'], $block['data']['attributes'])) {
            throw new \CException('Invalid block data. Missing or invalid properties.');
        }

        $this->setAttributes($block['data']['attributes']);
        if (!$this->validate()) {
            throw new \CException('Invalid block data. Errors: ' . print_r($this->errors, true));
        }

        $model = $this->loadReferredModel((int)$block['data']['node_id']);
        if (is_null($model)) {
            return;
        }

        $dirty = false;
        foreach ($this->getTranslatableAttributes() as $attr) {
            if (!isset($this->{$attr}, $model->{$attr})) {
                continue;
            }
            $model->{$attr} = $this->{$attr};
            $dirty = true;
        }
        if ($dirty && !$model->save()) {
            throw new \CException('Failed to save block node translation. Errors: ' . print_r($model->errors, true));
        }
    }

    /**
     * Loads the translatable node resource that acts as a Sir Trevor block.
     *
     * @param int|string $nodeId the node id of the referred resource.
     * @return TranslatableResource|ActiveRecord|null the resource model or null if not found.
     */
    protected function loadReferredModel($nodeId)
    {
        $model = RestApiModel::loadSirTrevorBlockById($nodeId);
        if (is_null($model)) {
            return null;
        }
        return $model;
    }

    /**
     * Returns a list of attribute labels for the block.
     *
     * @return array list of attribute labels.
     */
    public function getBlockAttributeLabels()
    {
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return array();
        } else {
            $labels = array();
            foreach ($this->getTranslatableAttributes() as $attr) {
                $labels[$attr] = $model->getAttributeLabel($attr);
            }
            return $labels;
        }
    }

    /**
     * Returns the "item_type" to be shown for this block in a composition.
     *
     * @return string the item type.
     */
    abstract public function getItemType();

    /**
     * Applies any raw untranslated data from the referred node to this block.
     *
     * @return void
     */
    abstract public function applyData();
}
