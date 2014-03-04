<?php

class Metadata
{

    /**
     * Operations that move items between statuses that affect their visibility
     * See "Item Visibility" tab in CMS Metadata spreadsheet
     * @return array
     */
    static public function itemVisibilityOperations()
    {

        return array(
            'Add' => 'Adds a temporary empty item to the database',
            'Remove' => 'Remove item',
            'UserShareByLink' => 'Share by link only with specific user',
            'UserUnshareByLink' => 'Unshare by link only with specific user',
            'UserShare' => 'Share with specific users',
            'UserUnshare' => 'Unshare with specific user',
            'TopicGroupShareByLink' => 'Share by link only with topic group',
            'TopicGroupUnshareByLink' => 'Unshare by link only with topic group',
            'TopicGroupShare' => 'Share with topic group',
            'TopicGroupUnshare' => 'Unshare with topic group',
            'SkillGroupShareByLink' => 'Share by link only with skill groups',
            'SkillGroupUnshareByLink' => 'Unshare by link only with skill groups',
            'SkillGroupShare' => 'Share with skill groups',
            'SkillGroupUnshare' => 'Unshare with skill groups',
            'CommunityShareByLink' => 'Share by link only with community',
            'CommunityUnshareByLink' => 'Unshare by link only with community',
            'CommunityShare' => 'Share with community',
            'CommunityUnshare' => 'Unshare with community',
            'ApproverShare' => 'Share with approvers',
            'ApproverUnshare' => 'Unshare with approvers',
            'PublicShareByLink' => 'Share by link only with anyone',
            'PublicUnshareByLink' => 'Unshare by link only with anyone',
            'Publish/Replace' => 'Share with anyone, making the item public for the first time / Publishing this version as the official version, replacing a previous version',
            'Unpublish/Revert' => 'Unshare with anyone, revert to previous version if such exists',
            'Feature' => 'List on Gapminder.org index pages',
            'Unfeature' => 'Unlist on Gapminder.org index pages',
        );

    }

    static public function itemInteractionOperations()
    {

        return array(
            'Browse' => 'Browse amongst items',
            'View' => 'View items',
            'Flag' => 'Flag an item',
            'PrepareForReview' => 'Prepare item for review, by stepping through fields required for IN_REVIEW',
            //'Review' => 'Preview, Evaluate, ProofRead',
            'Preview' => 'Preview the current content.',
            'Evaluate' => 'Evaluating an item in Preview-mode by grading and commenting on it\'s fields or the total itemVersion.',
            'Proofread' => 'Review and improve language',
            'PrepPublish' => 'Prepare for publishing, by stepping through fields required for PUBLIC.',
            'Approve' => 'Approving the full content by stepping to next field approved==false.',
            'Translate' => 'Translate to languages that you added to our profile.',
            //'TranslateIntoLanguage1' => 'Translate to the primary language that you added to our profile.',
            //'TranslateIntoLanguage2' => 'Translate to the secondary language that you added to our profile.',
            //'TranslateIntoLanguage3' => 'Translate to the tertiary language that you added to our profile.',
            'TranslateUnrestricted' => 'Translate to all languages.',
            'Edit' => 'Look at and edit all fields, no obvious goal',
            'Clone' => 'Creates a new itemVersion with incremented version number and goes to "edit" workFlow. If the original is in PUBLIC after achieving publishableFlag == true, suggest workFlow PrepPublish',
            //'Replace' => 'Replaced, means it\'s OK to fall back to, in case translation is missing for new version',
            //'Go' => 'Displays the item and it\'s related items using the CMS Go interface',
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

    static public function developerRoles()
    {
        return array(
            "Developer",
        );
    }

    static public function roleTypes()
    {

        return array(
            "Administrator",
            "Publisher",
            "Editor",
            "Approver",
            "Moderator",
            "Creator",
            "Reviewer",
            "Translator",
        );

    }

    static public function roleContexts()
    {

        return array(
            "Super",
            "Project",
            "Group",
            "Item",
        );

    }

    static public function contextLessRoles()
    {
        return array(
            "Authenticated",
            "Anonymous",
        );
    }

    static public function projects()
    {

        return array(
            "GS" => "Gapminder School",
            "G" => "Gapminder",
            "W" => "Waffle",
            "DS" => "Dollar Street",
            "HN" => "Human Numbers",
        );

    }

}