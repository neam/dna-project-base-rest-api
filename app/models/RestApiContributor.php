<?php

/**
 * Contributor resource model.
 *
 * @property Profile $profile
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 */
class RestApiContributor extends Account
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
     * The attributes that is returned by the REST api.
     *
     * @return array the response.
     */
    public function getAllAttributes()
    {
        return array(
            'user_id' => $this->id,
            'username' => $this->username,
            'first_name' => $this->profile->first_name,
            'last_name' => $this->profile->last_name,
            'thumbnail_url' => $this->profile->getPictureUrl(),
        );
    }
}
