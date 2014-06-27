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
            Role::AUTHENTICATED => 'Authenticated',
            Role::GUEST => 'Guest',
        );
    }

    /**
     * Returns the group roles as name => label.
     * @return array
     */
    static public function groupRoles()
    {
        return array_merge(
            self::groupAdminRoles(),
            self::groupModeratorRoles()
        );
    }

    static public function groupAdminRoles()
    {
        return array(
            Role::GROUP_ADMINISTRATOR => 'Group Administrator',
            Role::GROUP_PUBLISHER => 'Group Publisher',
            Role::GROUP_EDITOR => 'Group Editor',
            Role::GROUP_APPROVER => 'Group Approver',
            Role::GROUP_MODERATOR => 'Group Moderator',
        );
    }

    static public function groupModeratorRoles()
    {
        return array(
            Role::GROUP_CONTRIBUTOR => 'Group Contributor',
            Role::GROUP_REVIEWER => 'Group Reviewer',
            Role::GROUP_TRANSLATOR => 'Group Translator',
            Role::GROUP_MEMBER => 'Group Member',
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

    /**
     * @return array
     */
    static public function operationToSystemRolesMap()
    {
        return array_merge(
            self::getAddItemSystemRoleMap(),
            array(
                'Browse' => array(
                    Role::GUEST,
                    Role::AUTHENTICATED,
                ),
                'View' => array(
                    Role::GUEST,
                    Role::AUTHENTICATED,
                ),
                'Add' => array(
                    Role::AUTHENTICATED,
                ),
                'P3media.Import.*' => array(
                    Role::AUTHENTICATED,
                ),
            )
        );
    }

    static public function getAddItemSystemRoleMap()
    {
        $map = array();
        foreach (DataModel::crudModels() as $modelClass => $table) {
            $map["$modelClass.Add"] = array(
                Role::AUTHENTICATED,
            );
        }
        return $map;
    }

    /**
     * @return array
     */
    static public function operationToGroupRolesMap()
    {
        return array(
            'Edit' => array(
                Role::GROUP_EDITOR,
                Role::GROUP_ADMINISTRATOR,
            ),
            'Translate' => array(
                Role::GROUP_TRANSLATOR,
                Role::GROUP_ADMINISTRATOR,
            ),
            'Preview' => array(
                Role::GROUP_REVIEWER,
                Role::GROUP_ADMINISTRATOR,
            ),
            'PrepareForReview' => array(
                Role::GROUP_CONTRIBUTOR,
                Role::GROUP_EDITOR,
                Role::GROUP_ADMINISTRATOR,
            ),
            'PrepareForPublishing' => array(
                Role::GROUP_CONTRIBUTOR,
                Role::GROUP_EDITOR,
                Role::GROUP_ADMINISTRATOR,
            ),
            'Evaluate' => array(
                Role::GROUP_REVIEWER,
                Role::GROUP_ADMINISTRATOR,
            ),
            'Review' => array(
                Role::GROUP_REVIEWER,
                Role::GROUP_ADMINISTRATOR,
            ),
            'Proofread' => array(
                Role::GROUP_REVIEWER,
                Role::GROUP_ADMINISTRATOR,
            ),
            'Publish' => array(
                Role::GROUP_PUBLISHER,
                Role::GROUP_ADMINISTRATOR,
            ),
            'Clone' => array(
                Role::GROUP_EDITOR,
                Role::GROUP_ADMINISTRATOR,
            ),
            'Approve' => array(
                Role::GROUP_APPROVER,
                Role::GROUP_ADMINISTRATOR,
            ),
            'Remove' => array(
                Role::GROUP_CONTRIBUTOR,
                Role::GROUP_ADMINISTRATOR,
            ),
            'Replace' => array(
                Role::GROUP_MODERATOR,
                Role::GROUP_ADMINISTRATOR,
            ),
            'ChangeGroup' => array_keys(self::groupRoles()),
            'GrantPermission' => array(
                Role::GROUP_MODERATOR,
                Role::GROUP_ADMINISTRATOR,
            ),
            'GrantGroupAdminPermissions' => array(
                Role::GROUP_ADMINISTRATOR,
            ),
            'GrantGroupModeratorPermissions' => array(
                Role::GROUP_MODERATOR,
                Role::GROUP_ADMINISTRATOR,
            ),
        );
    }

}
