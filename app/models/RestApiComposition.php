<?php

/**
 * Composite item resource model.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string heading
 * @property string sub_heading
 * @property string about
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the WRestModelBehavior class:
 * @method array getCreateAttributes
 * @method array getUpdateAttributes
 */
class RestApiComposition extends Composition
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
                'i18n-attribute-messages' => array(
                    'class' => 'I18nAttributeMessagesBehavior',
                    'translationAttributes' => array('heading', 'sub_heading', 'caption', 'about'),
                    'languageSuffixes' => LanguageHelper::getCodes(),
                    'behaviorKey' => 'i18n-attribute-messages',
                    'displayedMessageSourceComponent' => 'displayedMessages',
                    'editedMessageSourceComponent' => 'editedMessages',
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
            'heading' => $this->heading,
            'subheading' => $this->sub_heading,
            'about' => $this->about,
            'item_type' => 'composition',
            'composition_type' => $this->compositionType->ref,
            'composition' => json_decode($this->composition),
            'contributors' => $this->getContributorsItems(),
            'related' => null, // todo: add the related items once needed.
        );
    }

    /**
     * Returns a list of contributors for the composition.
     * These are parsed into a format that can be used directly int he response.
     *
     * @return array
     */
    public function getContributorsItems()
    {
        $contributors = array();
        foreach ($this->node->changesets as $changeset) {
            $account = $changeset->user;
            if ($account !== null && !isset($contributors[$account->id])) {
                $contributors[$account->id] = array(
                    'userId' => $account->id,
                    'username' => $account->username,
                    'thumbnailUrl' => ($account->profile !== null) ? $account->profile->getPictureUrl() : null,
                );
            }
        }
        // The use of array_values gets rid of the account id key in the array, which is used to filter unique items.
        return array_values($contributors);
    }
} 