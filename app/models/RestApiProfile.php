<?php

/**
 * Profile resource model.
 *
 * @property string $first_name
 * @property string $last_name
 * @property int $may_contact
 * @property string $professional_title
 * @property string $lives_in
 * @property string $language1
 * @property string $language2
 * @property string $language3
 * @property string $about_me
 * @property string $my_links
 *
 * @property Account $account
 * @property SocialLink[] $socialLinks
 * @property Contribution[] $contributions
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 */
class RestApiProfile extends Profile
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => (bool)$this->may_contact ? $this->account->email : null,
            'social_links' => $this->getSocialLinkData(),
            'may_contact' => (bool)$this->may_contact,
            'professional_title' => json_decode($this->professional_title),
            'lives_in' => $this->lives_in,
            'language1' => $this->language1,
            'language2' => $this->language2,
            'language3' => $this->language3,
            // hack for fixing sir trevor urls where every "-" is a "\\-". (https://github.com/madebymany/sir-trevor-js/issues/248)
            'about_me' => json_decode(str_replace('\\\-', '-', $this->about_me)),
            'my_links' => json_decode(str_replace('\\\-', '-', $this->my_links)),
            'contributions' => $this->getContributionData(),
            'profile_picture' => $this->getPictureUrl(),
            'groups' => $this->getGroupData(),
        );
    }

    /**
     * Gets the social link data to include in response.
     *
     * Format:
     *
     * array(
     *     array(
     *         'name' => 'LinkedIn',
     *         'url' => 'http://linkedin.com/profile'
     *     ),
     *     ...
     * )
     *
     * @return array the data.
     */
    protected function getSocialLinkData()
    {
        $data = array();
        foreach ($this->socialLinks as $socialLink) {
            $data[] = array(
                'name' => MetaData::socialLinkRefToLabel($socialLink->ref),
                'url' => $socialLink->url,
            );
        }
        return $data;
    }

    /**
     * Gets the contribution data to include in the response.
     *
     * Format:
     *
     * array(
     *     array(
     *         'label' => 'I did something',
     *         'url' => 'http://some.url.com',
     *         'datetime' => '2015-01-01 00:00:00',
     *     ),
     *     ...
     * )
     *
     *
     * @return array the data.
     */
    protected function getContributionData()
    {
        $data = array();
        foreach ($this->contributions as $contribution) {
            $data[] = array(
                'label' => $contribution->label,
                'url' => $contribution->url,
                'datetime' => $contribution->datetime,
            );
        }
        return $data;
    }

    /**
     * Gets the group data to include in the response.
     *
     * Format:
     *
     * array(
     *     array(
     *         'id' => 1,
     *         'name' => 'Translators',
     *         'member_label' => 'Member',
     *         'roles' => array(
     *             'GroupTranslator'
     *         )
     *     ),
     *     ...
     * )
     *
     * @return array the data.
     */
    protected function getGroupData()
    {
        $groups = array();
        foreach ($this->account->groupHasAccounts as $gha) {
            if (!isset($groups[$gha->group->id])) {
                $groups[$gha->group->id] = array(
                    'id' => (int)$gha->group->id,
                    'name' => $gha->group->title,
                    'member_label' => 'Member', // todo: this is hard-coded for now (ask Fredrik & ChrisL for solution)
                    'roles' => array()
                );
            }
            $groups[$gha->group->id]['roles'][] = $gha->role->title;
        }
        return array_values($groups);
    }
}
