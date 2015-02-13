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
     * @var array runtime cache for Node models.
     */
    private static $_nodeCache = array();

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
     * @inheritdoc
     */
//    public function applyTranslations(array &$block)
//    {
//        $countTranslated = 0;
//        if (isset($block['data']['node_id'])) {
//            $model = $this->loadReferredModel((int)$block['data']['node_id']);
//            if ($model !== null) {
//                foreach ($this->getTranslatableAttributes() as $attr) {
//                    if (isset($this->{$attr}, $model->{"_{$attr}"}, $block['data']['attributes'][$attr])) {
//                        /*
//                         * Blocks with node references are already translated during populate.
//                         * @see SirTrevorBehavior::recPopulateSirTrevorBlock
//                         */
//                        $source = $model->{"_{$attr}"};
//                        $translation = $block['data']['attributes'][$attr];
//                        if ($translation !== $source) {
//                            $this->{$attr} = $translation;
//                            $countTranslated++;
//                        }
//                    }
//                }
//            }
//        }
//        return $countTranslated;
//    }

    /**
     * Loads the translatable node resource that acts as a Sir Trevor block.
     *
     * @param int|string $nodeId the node id of the referred resource.
     * @return null|TranslatableResource the resource model.
     * @throws CException if the model cannot be found.
     */
    protected function loadReferredModel($nodeId)
    {
        $node = isset(self::$_nodeCache[$nodeId])
            ? self::$_nodeCache[$nodeId]
            : (self::$_nodeCache[$nodeId] = Node::model()->findByPk((int)$nodeId));
        if ($node === null) {
            throw new \CException(sprintf('Failed to find node #%s.', $nodeId));
        }
        $item = $node->item();
        return RestApiModel::loadSirTrevorBlockNode($item);
    }

    /**
     * Returns the "item_type" to be shown for this block in a composition.
     *
     * @return string the item type.
     */
    abstract public function getItemType();

    abstract public function applyData();
}
