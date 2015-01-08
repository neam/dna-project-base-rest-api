<?php

class ContributorBehavior extends CActiveRecordBehavior
{
    /**
     * Returns a list of contributors for the owner node.
     * Only contributors who's profile has been made "public" will be included.
     *
     * @return array the list of contributors.
     */
    public function getContributors()
    {
        // todo: refactor this to use the RestApiContributor model once "CMSAPI-9-..." has been merged.

        $contributors = array();
        foreach ($this->owner->node->changesets as $changeset) {
            $account = $changeset->user;
            if ($account !== null && $account->profile !== null && !isset($contributors[$account->id])) {
                $contributors[$account->id] = array(
                    'user_id' => $account->id,
                    'username' => $account->username,
                    'first_name' => $account->profile->first_name,
                    'last_name' => $account->profile->last_name,
                    'thumbnail_url' => $account->profile->getPictureUrl(),
                );
            }
        }
        // The use of array_values gets rid of the account id key in the array, which is used to filter unique items.
        return array_values($contributors);
    }
}
