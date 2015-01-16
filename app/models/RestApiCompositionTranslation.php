<?php

class RestApiCompositionTranslation extends Composition implements TranslatableResource
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
    public function translate($params)
    {
        // todo: implement
    }

    /**
     * @inheritdoc
     */
    public function getTranslatableAttributes()
    {
        // todo: implement
        return array();
    }
}
