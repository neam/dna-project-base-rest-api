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
                // todo: use $this->tool->i18nCatalog for something ?
            );
        }
        return null;
    }
}