<?php

class Metadata
{

    /**
     * Operations that affect the item's visibility within the context (own/group)
     * See "Item Visibility" tab in CMS Metadata spreadsheet
     * @return array
     */
    static public function itemVisibilityOperations()
    {

        return array(
            // group-dependent
            'List' => 'Lists an item in the group',
            'Unlist' => 'Unlists an item from the group',
            'Suggest' => 'Suggest an item to be listed in the group',
            'Publish/Replace' => 'Share with anyone, making the item public for the first time / Publishing this version as the official version, replacing a previous version',
            'Unpublish/Revert' => 'Unshare with anyone, revert to previous version if such exists',
        );

    }

    static public function itemInteractionOperations()
    {

        return array(
            // group-independent,own-dependent
            'Add' => 'Adds a temporary empty item to the database',
            'Remove' => 'Remove item from the database',
            // group/own-dependent
            'Browse' => 'Browse amongst items',
            'View' => 'View items',
            'PrepareForReview' => 'Prepare item for review, by stepping through fields required for IN_REVIEW',
            //'Review' => 'Preview, Evaluate, Proofread',
            'Preview' => 'Preview the current content',
            'Evaluate' => 'Evaluating an item in Preview-mode by grading and commenting on it\'s fields or the total itemVersion',
            'Proofread' => 'Review and improve language',
            'PrepareForPublishing' => 'Prepare for publishing, by stepping through fields required for PUBLIC',
            'Approve' => 'Approving the full content by stepping to next field approved==false',
            'Translate' => 'Translate to languages that you added to our profile',
            //'TranslateIntoLanguage1' => 'Translate to the primary language that you added to our profile',
            //'TranslateIntoLanguage2' => 'Translate to the secondary language that you added to our profile',
            //'TranslateIntoLanguage3' => 'Translate to the tertiary language that you added to our profile',
            'TranslateUnrestricted' => 'Translate to all languages',
            'Edit' => 'Look at and edit all fields, no obvious goal',
            'Clone' => 'Creates a new itemVersion with incremented version number and goes to "edit" workFlow',
        );

    }

    static public function itemTypes()
    {

        return array(
            "GoItem" => DataModel::goItemModels(),
            "EducationalItem" => DataModel::educationalItemModels(),
            "InternalItem" => DataModel::internalItemModels(),
            "WebsiteContentItem" => DataModel::websiteContentItemModels(),
            "WaffleItem" => DataModel::waffleItemModels(),
            "DollarStreetItem" => array(),
        );

    }

    static public function contextLessSuperRoles()
    {
        return array(
            "Developer",
            "Super Administrator",
        );
    }

    static public function groupBasedRoles()
    {

        return array(
            "Administrator",
            "Publisher",
            "Editor",
            "Approver",
            "Moderator",
            "Contributor",
            "Reviewer",
            "Translator",
            "Member",
        );

    }

    static public function contextLessDefaultRoles()
    {
        return array(
            "Member",
            "Anonymous",
        );
    }

    static public function groups()
    {
        return array(
            'GapminderInternal',
            'GapminderOrg',
            'GapminderOrgSuggest',
            'Proofreaders',
            'Translators',
        );
    }

    static public function assignableGroups()
    {
        return array(
            'GapminderInternal' => 'Gapminder Internal',
            'GapminderOrg' => 'Gapminder.org',
            'GapminderOrgSuggest' => 'Gapminder.org suggestions',
            'Proofreaders' => 'Proofreaders',
            'Translators' => 'Translators',
        );
    }

    static public function assignableGroupRoles()
    {
        return array(
            'Group Contributor' => 'contributors',
            'Group Editor' => 'editors',
            'Group Reviewer' => 'reviewers',
            'Group Translator' => 'translators'
        );
    }

    /**
     * Returns the operation to roles map.
     * @return array
     */
    static public function operationToRolesMap()
    {
        return array(
            'Edit' => array(Role::GROUP_EDITOR),
            'Translate' => array(Role::GROUP_TRANSLATOR),
            'Preview' => array(Role::GROUP_REVIEWER),
            'PrepareForReview' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR),
            'PrepareForPublishing' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR),
            'Evaluate' => array(Role::GROUP_REVIEWER),
            'Review' => array(Role::GROUP_REVIEWER),
            'Proofread' => array(Role::GROUP_REVIEWER),
            'Publish' => array(Role::GROUP_PUBLISHER),
            'Clone' => array(Role::GROUP_EDITOR),
            'Add' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR),
            'Approve' => array(Role::GROUP_APPROVER),
            'Remove' => array(Role::GROUP_CONTRIBUTOR), // TODO: One should be able to remove his own items only.
            'Replace' => array(Role::GROUP_MODERATOR), // TODO: One should be able to remove his own items only.
            'Browse' => array(Role::ANONYMOUS), // TODO: Everybody has the role in any case.
            'View' => array(Role::ANONYMOUS), // TODO: Everybody has the role in any case.
        );
    }

    /**
     * Returns the authorized roles for the given operation.
     * @param string $operation
     * @return array
     */
    static public function operationToRoles($operation)
    {
        $map = self::operationToRolesMap();
        return isset($map[$operation]) ? $map[$operation] : array();
    }
}
