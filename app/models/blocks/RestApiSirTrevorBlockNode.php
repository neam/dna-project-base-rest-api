<?php

/**
 * Base class for Sir Trevor blocks that refer to a translatable node, e.g. video files, download links.
 */
abstract class RestApiSirTrevorBlockNode extends RestApiSirTrevorBlock
{
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
     * @return null|TranslatableResource the resource model.
     * @throws CException if the model cannot be found.
     */
    protected function loadReferredModel($nodeId)
    {
        $node = Node::model()->findByPk((int)$nodeId);
        if ($node === null) {
            throw new \CException('');
        }
        $item = $node->item();
        return RestApiModel::loadTranslatable($item);
    }
}
