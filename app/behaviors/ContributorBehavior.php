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
        $contributors = array();
        foreach ($this->owner->node->changesets as $changeset) {
            $contributor = RestApiContributor::model()->findByPk((int)$changeset->user_id);
            if ($contributor !== null && $contributor->profile !== null && !isset($contributors[$contributor->id])) {
                $contributors[$contributor->id] = $contributor->getAllAttributes();
            }
        }
        // The use of array_values gets rid of the account id key in the array, which is used to filter unique items.
        return array_values($contributors);
    }
}
