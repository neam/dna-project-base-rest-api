<?php

class ContributorBehavior extends CActiveRecordBehavior
{
    /**
     * Returns a list of contributors for the owner node.
     *
     * @return array
     */
    public function getContributors()
    {
        // todo: refactor this to use the RestApiContributor model once "CMSAPI-9-..." has been merged.

        $contributors = array();
        foreach ($this->owner->node->changesets as $changeset) {
            $account = $changeset->user;
            if ($account !== null && !isset($contributors[$account->id])) {
                $contributors[$account->id] = array(
                    'user_id' => $account->id,
                    'username' => $account->username,
                    'thumbnail_url' => ($account->profile !== null) ? $account->profile->getPictureUrl() : null,
                );
            }
        }
        // The use of array_values gets rid of the account id key in the array, which is used to filter unique items.
        return array_values($contributors);
    }
}
