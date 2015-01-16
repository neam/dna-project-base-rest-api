<?php

class RestApiCustomPageTranslation extends Page implements TranslatableResource
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

        $translatableAttributes = $this->getTranslatableAttributes();
        if (!empty($translatableAttributes) && !empty($params)) {
            foreach ($params as $attr => $value) {
                if (in_array($attr, $translatableAttributes)) {
                    if (is_string($value)) {
                        // regular model string attributes
                    } elseif (is_array($value)) {
                        if ($attr === 'composition' && isset($value['data'])) {
                            // sir trevor composition blocks
                        }
                    }
                }
            }
        }
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
