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
            'Edit' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR),
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
     * @throws CException
     */
    static public function operationToRoles($operation)
    {
        $map = self::operationToRolesMap();

        if (!isset($map[$operation])) {
            throw new CException("Unknown operation '$operation'.");
        }

        return $map[$operation];
    }

    /**
     * Returns the checkAccess to permissions map.
     * @return array
     */
    static public function checkAccessToPermissionMap()
    {
        $group = 'GapminderInternal';

        return array(
            // Roles and groups
            'Administrator' => array('group' => $group, 'roles' => array(Role::SUPER_ADMINISTRATOR)),
            'Super Adminstrator' => array('group' => $group, 'roles' => array(Role::SUPER_ADMINISTRATOR)),
            'Superuser' => array('group' => $group, 'roles' => array(Role::SUPER_ADMINISTRATOR)),
            'Developer' => array('group' => $group, 'roles' => array(Role::DEVELOPER)),
            'Editor' => array('group' => $group, 'roles' => array(Role::GROUP_EDITOR)),
            'Group.*' => array('group' => $group, 'roles' => array('TODO')), // TODO: Add an appropriate role.
            'GroupHasAccount.*' => array('group' => $group, 'roles' => array('TODO')), // TODO: Add an appropriate role.

            // Item
            'Item.Edit' => array('group' => $group, 'roles' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR)),
            'Item.Translate' => array('group' => $group, 'roles' => array(Role::GROUP_TRANSLATOR)),
            'Item.Preview' => array('group' => $group, 'roles' => array(Role::GROUP_REVIEWER)),
            'Item.PrepareForReview' => array('group' => $group, 'roles' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR)),
            'Item.PrepareForPublishing' => array('group' => $group, 'roles' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR)),
            'Item.Evaluate' => array('group' => $group, 'roles' => array(Role::GROUP_REVIEWER)),
            'Item.Review' => array('group' => $group, 'roles' => array(Role::GROUP_REVIEWER)),
            'Item.Proofread' => array('group' => $group, 'roles' => array(Role::GROUP_REVIEWER)),
            'Item.Publish' => array('group' => $group, 'roles' => array(Role::GROUP_PUBLISHER)),
            'Item.Clone' => array('group' => $group, 'roles' => array(Role::GROUP_EDITOR)),
            'Item.Add' => array('group' => $group, 'roles' => array(Role::GROUP_CONTRIBUTOR, Role::GROUP_EDITOR)),
            'Item.Approve' => array('group' => $group, 'roles' => array(Role::GROUP_APPROVER)),
            'Item.Remove' => array('group' => $group, 'roles' => array(Role::GROUP_CONTRIBUTOR)), // TODO: one should be able to remove only own items
            'Item.Replace' => array('group' => $group, 'roles' => array(Role::GROUP_MODERATOR)), // TODO: one should be able to remove only own items
            'Item.Browse' => array('group' => $group, 'roles' => array(Role::ANONYMOUS)), // TODO: Everybody has it anyways

            // Models
            'Account.*' => array('group' => $group, 'roles' => array('TODO')),
            'Action.*' => array('group' => $group, 'roles' => array('TODO')),
            'Changeset.*' => array('group' => $group, 'roles' => array('TODO')),
            'Chapter.*' => array('group' => $group, 'roles' => array('TODO')),
            'ChapterQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'Comment.*' => array('group' => $group, 'roles' => array('TODO')),
            'DataArticle.*' => array('group' => $group, 'roles' => array('TODO')),
            'DataArticleQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'DataSource.*' => array('group' => $group, 'roles' => array('TODO')),
            'DownloadLink.*' => array('group' => $group, 'roles' => array('TODO')),
            'DownloadLinkQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'Edge.*' => array('group' => $group, 'roles' => array('TODO')),
            'GuiSection.*' => array('group' => $group, 'roles' => array('TODO')),
            'GuiSectionQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'ExamQuestion.*' => array('group' => $group, 'roles' => array('TODO')),
            'ExamQuestionAlternative.*' => array('group' => $group, 'roles' => array('TODO')),
            'ExamQuestionAlternativeQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'Exercise.*' => array('group' => $group, 'roles' => array('TODO')),
            'ExerciseQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'EzcWorkflow.*' => array('group' => $group, 'roles' => array('TODO')),
            'HtmlChunk.*' => array('group' => $group, 'roles' => array('TODO')),
            'HtmlChunkQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'I18nCatalog.*' => array('group' => $group, 'roles' => array('TODO')),
            'I18nCatalogQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'Menu.*' => array('group' => $group, 'roles' => array('TODO')),
            'MenuQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'Node.*' => array('group' => $group, 'roles' => array('TODO')),
            'NodeHasGroup.*' => array('group' => $group, 'roles' => array('TODO')),
            'Page.*' => array('group' => $group, 'roles' => array('TODO')),
            'PageQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'PoFile.*' => array('group' => $group, 'roles' => array('TODO')),
            'PoFileQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'Presentation.*' => array('group' => $group, 'roles' => array('TODO')),
            'Profile.*' => array('group' => $group, 'roles' => array('TODO')),
            'Profiles.*' => array('group' => $group, 'roles' => array('TODO')), // TODO: Should references to 'Profiles.*' be replaced with 'Profile.*'?
            'Role.*' => array('group' => $group, 'roles' => array('TODO')),
            'Section.*' => array('group' => $group, 'roles' => array('TODO')),
            'SectionContent.*' => array('group' => $group, 'roles' => array('TODO')),
            'SectionQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'SlideshowFile.*' => array('group' => $group, 'roles' => array('TODO')),
            'SlideshowFileQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'Snapshot.*' => array('group' => $group, 'roles' => array('TODO')),
            'SnapshotQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'SourceMessage.*' => array('group' => $group, 'roles' => array('TODO')),
            'SpreadsheetFile.*' => array('group' => $group, 'roles' => array('TODO')),
            'SpreadsheetFileQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'TextDoc.*' => array('group' => $group, 'roles' => array('TODO')),
            'TextDocQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'Tool.*' => array('group' => $group, 'roles' => array('TODO')),
            'ToolQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'VectorGraphic.*' => array('group' => $group, 'roles' => array('TODO')),
            'VectorGraphicQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'VideoFile.*' => array('group' => $group, 'roles' => array('TODO')),
            'VideoFileQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'Waffle.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleCategory.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleCategoryQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleCategoryElement.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleCategoryElementQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleDataSource.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleDataSourceQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleIndicator.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleIndicatorQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleTag.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleTagQaState.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleUnit.*' => array('group' => $group, 'roles' => array('TODO')),
            'WaffleUnitQaState.*' => array('group' => $group, 'roles' => array('TODO')),
        );
    }
}
