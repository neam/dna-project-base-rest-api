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
            'GoItem' => DataModel::goItemModels(),
            'EducationalItem' => DataModel::educationalItemModels(),
            'InternalItem' => DataModel::internalItemModels(),
            'WebsiteContentItem' => DataModel::websiteContentItemModels(),
            'WaffleItem' => DataModel::waffleItemModels(),
            'DollarStreetItem' => array(),
        );

    }

    /**
     * Returns the system roles as name => label.
     * @return array
     */
    static public function systemRoles()
    {
        return array(
            Role::DEVELOPER => 'Developer',
            Role::SUPER_ADMINISTRATOR => 'Super Administrator',
        );
    }

    /**
     * Returns the group roles as name => label.
     * @return array
     */
    static public function groupRoles()
    {
        return array(
            Role::GROUP_ADMINISTRATOR => 'Administrator',
            Role::GROUP_PUBLISHER => 'Publisher',
            Role::GROUP_EDITOR => 'Editor',
            Role::GROUP_APPROVER => 'Approver',
            Role::GROUP_MODERATOR => 'Moderator',
            Role::GROUP_CONTRIBUTOR => 'Contributor',
            Role::GROUP_REVIEWER => 'Reviewer',
            Role::GROUP_TRANSLATOR => 'Translator',
            Role::GROUP_MEMBER => 'Member',
        );
    }

    /**
     * Returns the default roles as name => label.
     * @return array
     */
    static public function defaultRoles()
    {
        return array(
            Role::AUTHENTICATED => 'Authenticated',
            Role::GUEST => 'Guest',
        );
    }

    static public function systemGroups()
    {
        return array(
            Group::SYSTEM => 'System',
        );
    }

    /**
     * Returns the project groups as name => label.
     * @return array
     */
    static public function projectGroups()
    {
        return array(
            Group::GAPMINDER_ORG => 'Gapminder.org',
            Group::SCHOOL => 'School',
            Group::DOLLAR_STREET => 'Dollar Street',
            Group::HUMAN_NUMBERS => 'Human Numbers',
            Group::IGNORANCE_PROJECT => 'Ignorance Project',
        );
    }

    /**
     * Returns the topic groups as name => label.
     * @return array
     */
    static public function topicGroups()
    {
        return array(
            Group::GAPMINDER_INTERNAL => 'Gapminder Internal',
            Group::GAPMINDER_GLOBAL => 'Gapminder Global',
            Group::GAPMINDER_SVERIGE => 'Gapminder Sverige',
            Group::GAPMINDER_ESPANA_SALUD => 'Gapminder España Salud',
            Group::GAPMINDER_ESPANA_BARCELONA => 'Gapminder España Barcelona',
            Group::GAPMINDER_UNITED_KINGDOM => 'Gapminder United Kingdom',
            Group::GAPMINDER_RUSSIA => 'Gapminder Russia',
            Group::GAPMINDER_STATEMINDER => 'Gapminder Stateminder',
            Group::GAPMINDER_NORGE => 'Gapminder Norge',
        );
    }

    /**
     * Returns the skill groups as name => label.
     * @return array
     */
    static public function skillGroups()
    {
        return array(
            Group::TRANSLATORS => 'Translators',
            Group::REVIEWERS => 'Reviewers',
            Group::PROOFREADERS => 'Proofreaders',
        );
    }

    static public function assignableGroups()
    {
        return array(
            'GapminderInternal' => 'Gapminder Internal',
            'GapminderOrg' => 'Gapminder.org',
            'GapminderOrgSuggest' => 'Gapminder.org Suggestions',
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

    static public function operationToRoles()
    {
        return array(
            'Edit' => array(
                Role::GROUP_EDITOR,
            ),
            'Translate' => array(
                Role::GROUP_TRANSLATOR,
            ),
            'Preview' => array(
                Role::GROUP_REVIEWER,
            ),
            'PrepareForReview' => array(
                Role::GROUP_CONTRIBUTOR,
                Role::GROUP_EDITOR,
            ),
            'PrepareForPublishing' => array(
                Role::GROUP_CONTRIBUTOR,
                Role::GROUP_EDITOR,
            ),
            'Evaluate' => array(
                Role::GROUP_REVIEWER,
            ),
            'Review' => array(
                Role::GROUP_REVIEWER,
            ),
            'Proofread' => array(
                Role::GROUP_REVIEWER,
            ),
            'Publish' => array(
                Role::GROUP_PUBLISHER,
            ),
            'Clone' => array(
                Role::GROUP_EDITOR,
            ),
            'Add' => array(
                Role::GROUP_MEMBER,
            ),
            'Approve' => array(
                Role::GROUP_APPROVER,
            ),
            'Remove' => array(
                Role::GROUP_CONTRIBUTOR,
            ),
            'Replace' => array(
                Role::GROUP_MODERATOR,
            ),
            'Browse' => array(
                Role::GUEST,
                Role::GROUP_MEMBER,
            ),
            'View' => array(
                Role::GUEST,
            ),
            'ChangeGroup' => array(
                Role::GROUP_MODERATOR,
            ),
        );
    }

    /**
     * Returns the operation to roles and groups map.
     * @return array
     */
    static public function operationToRolesAndGroupsMap()
    {
        return array(
            'Edit' => array(
                'roles' => array(Role::GROUP_EDITOR),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'Translate' => array(
                'roles' => array(Role::GROUP_TRANSLATOR),
                'groups' => array(Group::GAPMINDER_INTERNAL, Group::TRANSLATORS),
            ),
            'Preview' => array(
                'roles' => array(Role::GROUP_REVIEWER),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'PrepareForReview' => array(
                'roles' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'PrepareForPublishing' => array(
                'roles' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'Evaluate' => array(
                'roles' => array(Role::GROUP_REVIEWER),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'Review' => array(
                'roles' => array(Role::GROUP_REVIEWER),
                'groups' => array(Group::GAPMINDER_INTERNAL, Group::PROOFREADERS),
            ),
            'Proofread' => array(
                'roles' => array(Role::GROUP_REVIEWER),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'Publish' => array(
                'roles' => array(Role::GROUP_PUBLISHER),
                'groups' => array(Group::GAPMINDER_INTERNAL, Group::GAPMINDER_ORG),
            ),
            'Clone' => array(
                'roles' => array(Role::GROUP_EDITOR),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'Add' => array(
                'roles' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'Approve' => array(
                'roles' => array(Role::GROUP_APPROVER),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'Remove' => array(
                'roles' => array(Role::GROUP_CONTRIBUTOR),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'Replace' => array(
                'roles' => array(Role::GROUP_MODERATOR),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'Browse' => array(
                'roles' => array(Role::GUEST),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
            'View' => array(
                'roles' => array(Role::GUEST),
                'groups' => array(Group::GAPMINDER_INTERNAL),
            ),
        );
    }

    /*
    static public function roleToGroupsMap()
    {
        $map = array();

        $operationToRolesAndGroupsMap = self::operationToRolesAndGroupsMap();

        foreach ($operationToRolesAndGroupsMap as $rolesAndGroups) {
            foreach ($rolesAndGroups['roles'] as $roleName) {
                $map[$roleName] = $rolesAndGroups['groups'];
            }
        }

        return $map;
    }
    */

    /**
     * Returns the authorized roles for the given operation.
     * @param string $operation
     * @return array
     */
    static public function operationToRolesAndGroups($operation)
    {
        $map = self::operationToRolesAndGroupsMap();
        return isset($map[$operation]['roles']) ? $map[$operation]['roles'] : array();
    }
}
