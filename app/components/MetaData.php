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
            'GapminderOrg',
        );
    }

    /**
     * Returns the checkAccess to permissions map.
     * @return array
     */
    static public function checkAccessToPermissionMap()
    {
        $group = 'GapminderOrg';

        return array(
            // Roles and groups
            'Administrator' => array('group' => $group, 'role' => 'Super Administrator'),
            'Super Administrator' => array('group' => $group, 'role' => 'Super Administrator'),
            'Superuser' => array('group' => $group, 'role' => 'Super Administrator'),
            'Developer' => array('group' => $group, 'role' => 'Developer'),
            'Group.*' => array('group' => $group, 'role' => 'TODO'), // TODO: Add an appropriate role.
            'GroupHasAccount.*' => array('group' => $group, 'role' => 'TODO'), // TODO: Add an appropriate role.

            // Item
            'Item.Edit' => array('group' => $group, 'role' => 'Group Contributor'),
            'Item.Translate' => array('group' => $group, 'role' => 'Group Translator'),
            'Item.Preview' => array('group' => $group, 'role' => 'Group Contributor'),
            'Item.PrepareForReview' => array('group' => $group, 'role' => 'Group Approver'),
            'Item.PrepareForPublishing' => array('group' => $group, 'role' => 'Group Approver'),
            'Item.Evaluate' => array('group' => $group, 'role' => 'Group Approver'),
            'Item.Review' => array('group' => $group, 'role' => 'Group Reviewer'),
            'Item.Proofread' => array('group' => $group, 'role' => 'Group Translator'),
            'Item.Browse' => array('group' => $group, 'role' => 'Anonymous'),
            'Item.Publish' => array('group' => $group, 'role' => 'Group Publisher'),
            'Item.Replace' => array('group' => $group, 'role' => 'Group Moderator'),
            'Item.Clone' => array('group' => $group, 'role' => 'Group Contributor'),
            'Item.Add' => array('group' => $group, 'role' => 'Group Contributor'),
            'Item.Remove' => array('group' => $group, 'role' => 'Group Contributor'),

            // Models
            'Account.*' => array('group' => $group, 'role' => 'TODO'),
            'Action.*' => array('group' => $group, 'role' => 'TODO'),
            'Changeset.*' => array('group' => $group, 'role' => 'TODO'),
            'Chapter.*' => array('group' => $group, 'role' => 'TODO'),
            'ChapterQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'Comment.*' => array('group' => $group, 'role' => 'TODO'),
            'DataArticle.*' => array('group' => $group, 'role' => 'TODO'),
            'DataArticleQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'DataSource.*' => array('group' => $group, 'role' => 'TODO'),
            'DownloadLink.*' => array('group' => $group, 'role' => 'TODO'),
            'DownloadLinkQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'Edge.*' => array('group' => $group, 'role' => 'TODO'),
            'GuiSection.*' => array('group' => $group, 'role' => 'TODO'),
            'GuiSectionQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'ExamQuestion.*' => array('group' => $group, 'role' => 'TODO'),
            'ExamQuestionAlternative.*' => array('group' => $group, 'role' => 'TODO'),
            'ExamQuestionAlternativeQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'Exercise.*' => array('group' => $group, 'role' => 'TODO'),
            'ExerciseQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'EzcWorkflow.*' => array('group' => $group, 'role' => 'TODO'),
            'HtmlChunk.*' => array('group' => $group, 'role' => 'TODO'),
            'HtmlChunkQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'I18nCatalog.*' => array('group' => $group, 'role' => 'TODO'),
            'I18nCatalogQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'Menu.*' => array('group' => $group, 'role' => 'TODO'),
            'MenuQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'Node.*' => array('group' => $group, 'role' => 'TODO'),
            'NodeHasGroup.*' => array('group' => $group, 'role' => 'TODO'),
            'Page.*' => array('group' => $group, 'role' => 'TODO'),
            'PageQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'PoFile.*' => array('group' => $group, 'role' => 'TODO'),
            'PoFileQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'Presentation.*' => array('group' => $group, 'role' => 'TODO'),
            'Profile.*' => array('group' => $group, 'role' => 'TODO'),
            'Profiles.*' => array('group' => $group, 'role' => 'TODO'), // TODO: Should references to 'Profiles.*' be replaced with 'Profile.*'?
            'Role.*' => array('group' => $group, 'role' => 'TODO'),
            'Section.*' => array('group' => $group, 'role' => 'TODO'),
            'SectionContent.*' => array('group' => $group, 'role' => 'TODO'),
            'SectionQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'SlideshowFile.*' => array('group' => $group, 'role' => 'TODO'),
            'SlideshowFileQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'Snapshot.*' => array('group' => $group, 'role' => 'TODO'),
            'SnapshotQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'SourceMessage.*' => array('group' => $group, 'role' => 'TODO'),
            'SpreadsheetFile.*' => array('group' => $group, 'role' => 'TODO'),
            'SpreadsheetFileQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'TextDoc.*' => array('group' => $group, 'role' => 'TODO'),
            'TextDocQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'Tool.*' => array('group' => $group, 'role' => 'TODO'),
            'ToolQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'VectorGraphic.*' => array('group' => $group, 'role' => 'TODO'),
            'VectorGraphicQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'VideoFile.*' => array('group' => $group, 'role' => 'TODO'),
            'VideoFileQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'Waffle.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleCategory.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleCategoryQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleCategoryElement.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleCategoryElementQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleDataSource.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleDataSourceQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleIndicator.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleIndicatorQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleTag.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleTagQaState.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleUnit.*' => array('group' => $group, 'role' => 'TODO'),
            'WaffleUnitQaState.*' => array('group' => $group, 'role' => 'TODO'),
        );
    }
}
