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
                'RestrictedAccessBehavior' => array(
                    'class' => '\RestrictedAccessBehavior',
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
        $data = array(
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        );
        if ((bool)$this->may_contact) {
            $data['email'] = $this->account->email;
        }
        $data['social_links'] = array();
        foreach ($this->socialLinks as $socialLink) {
            $data['social_links'][] = array(
                'name' => MetaData::socialLinkRefToLabel($socialLink->ref),
                'url' => $socialLink->url,
            );
        }
        $data['may_contact'] = (bool)$this->may_contact;

        $data['professional_title'] = json_decode($this->professional_title);
        $data['lives_in'] = $this->lives_in;
        $data['language1'] = $this->language1;
        $data['language2'] = $this->language2;
        $data['language3'] = $this->language3;
        // hack for fixing sir trevor urls where every "-" is a "\\-". (https://github.com/madebymany/sir-trevor-js/issues/248)
        $data['about_me'] = json_decode(str_replace('\\\-', '-', $this->about_me));
        $data['my_links'] = json_decode(str_replace('\\\-', '-', $this->my_links));

        $data['contributions'] = array();
        foreach ($this->contributions as $contribution) {
            $data['contributions'][] = array(
                'label' => $contribution->label,
                'url' => $contribution->url,
                'datetime' => $contribution->datetime,
            );
        }
        $data['profile_picture'] = $this->getPictureUrl();

        $groups = array();
        foreach ($this->account->groupHasAccounts as $gha) {
            if (!isset($groups[$gha->group->id])) {
                $groups[$gha->group->id] = array(
                    'id' => $gha->group->id,
                    'name' => $gha->group->title,
                    'member_label' => 'Member', // todo: this is hard-coded for now (ask Fredrik & ChrisL for solution)
                    'roles' => array()
                );
            }
            $groups[$gha->group->id]['roles'][] = $gha->role->title;
        }
        $data['groups'] = array_values($groups);

        return $data;
    }
}
