<?php

class RestApiSlideshowFile extends SlideshowFile implements SirTrevorBlock
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
                'RestrictedAccessBehavior' => array(
                    'class' => '\RestrictedAccessBehavior',
                ),
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
            // todo: add attributes once we know which they are
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionItemType()
    {
        return 'slideshow_file';
    }
}
