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
class RestApiProfile extends Profile implements RelatedResource
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
        // Implement only the behaviors we need instead of inheriting them to increase performance.
        return array(
            'RestrictedAccessBehavior' => array(
                'class' => '\RestrictedAccessBehavior',
            ),
        );
    }

    /**
     * Returns "all" attributes for this resource.
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
            'profile_picture' => $this->getProfilePictureUrl(),
            'groups' => $this->getGroupData(),
        );
    }

    /**
     * @inheritdoc
     */
    public function getRelatedAttributes()
    {
        return $this->getAllAttributes();
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
        // todo: refactor with barebones
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
        // todo: refactor with barebones
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
        // todo: refactor with barebones
        $groups = array();
        foreach ($this->account->groupHasAccounts as $gha) {
            $group = $gha->group;
            if (!isset($groups[$group->id])) {
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

    /**
     * Returns absolute url for the profile picture image.
     *
     * @param string $preset the image preset to use when generating the url.
     * @return null|string the url or null if not found.
     */
    public function getProfilePictureUrl($preset = 'user-profile-picture')
    {
        $mediaId = $this->profile_picture_media_id;
        if (!empty($mediaId)) {
            return \barebones\Barebones::createMediaUrl($mediaId, $preset);
        }
        // TODO: provide a fallback profile picture when it is done/exists
        return null;
    }
}
