<?php

/**
 * Profile resource model.
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
     * @return object the response object as a stdClass.
     */
    public function getAllAttributes()
    {
        $response = new stdClass();

        $response->first_name = $this->first_name;
        $response->last_name = $this->last_name;
        if ((bool)$this->may_contact) {
            $response->email = $this->account->email;
        }
        $response->social_links = array();
        foreach ($this->socialLinks as $socialLink) {
            $response->social_links[] = array(
                'name' => MetaData::socialLinkRefToLabel($socialLink->ref),
                'url' => $socialLink->url,
            );
        }
        $response->may_contact = (bool)$this->may_contact;
        $response->professional_title = json_decode($this->professional_title);
        $response->lives_in = $this->lives_in;
        $response->language1 = $this->language1;
        $response->language2 = $this->language2;
        $response->language3 = $this->language3;
        // hack for fixing sir trevor urls where every "-" is a "\\-". (https://github.com/madebymany/sir-trevor-js/issues/248)
        $response->about_me = json_decode(str_replace('\\\-', '-', $this->about_me));
        $response->my_links = json_decode(str_replace('\\\-', '-', $this->my_links));

        $response->contributions = array();
        foreach ($this->contributions as $contribution) {
            $response->contributions[] = array(
                'label' => $contribution->label,
                'url' => $contribution->url,
                'datetime' => $contribution->datetime,
            );
        }
        $response->profile_picture = $this->getPictureUrl();

        $groups = array();
        foreach ($this->account->groupHasAccounts as $gha) {
            if (!isset($groups[$gha->group->id])) {
                $groups[$gha->group->id] = array(
                    'id' => $gha->group->id,
                    'name' => $gha->group->title,
                    'member_label' => 'Member' // todo: this is hard-coded for now (ask Fredrik & ChrisL for solution)
                );
            }
        }
        $response->groups = array_values($groups);

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getRelatedAttributes()
    {
        return $this->getAllAttributes();
    }
}
