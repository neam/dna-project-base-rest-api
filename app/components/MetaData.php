<?php

class Metadata
{

    static public function itemActions()
    {

        return array(
            'Browse' => 'Browse amongst items',
            'View' => 'View items',
            'Add' => 'Adds a temporary empty item to the database',
            'Flag' => 'Flag an item',
            //'Draft' => 'Completes a temporary item by stepping through fields required for DRAFT  ',
            //'AddEdge' => 'Add a relation',
            //'DeleteEdge' => 'Remove a relation',
            'PrepareForReview' => 'Prepare item for review, by stepping through fields required for IN_REVIEW',
            'SubmitForReview' => 'Put item in review mode, by switching itemVersion.status to IN_REVIEW',
            'Review' => 'Preview, Evaluate, ProofRead',
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
            'Publish' => 'Make public for the first time, or when replacing a previous version.',
            'Unpublish' => 'Make public for the first time, or when replacing a previous version.',
            'Edit' => 'Look at all fields, no obvious goal',
            'Clone' => 'Creates a new itemVersion with incremented version number and goes to "edit" workFlow. If the original is in PUBLIC after achieving publishableFlag == true, suggest workFlow PrepPublish',
            'Remove' => 'Removed means there\'s something wrong with the content so it should not be used in any language any time',
            'Replace' => 'Replaced, means it\'s OK to fall back to, in case translation is missing for new version',
            'Go' => 'Displays the item and it\'s related items using the CMS Go interface',
            'Demote' => '',
            'Demote' => '',
        );

    }

    static public function itemTypes()
    {

        return array(
            "SharableItem" => DataModel::sharableItemModels(),
            "GoItem" => DataModel::goItemModels(),
            "EducationalItem" => DataModel::educationalItemModels(),
            "WebsiteContentItem" => DataModel::websiteContentItemModels(),
            "WaffleItem" => DataModel::waffleItemModels(),
            "DollarStreetItem" => array(),
            "RelatedItemReferenceItem" => array(),
        );

    }

    static public function projectRoles()
    {

        return array(
            "Authenticated",
            "Editor", // Creator
            "Reviewer", // Previewer
            //"Evaluator",
            "Approver",
            "Proofreader",
            "Translator",
            "Publisher",
            "Administrator",
        );

    }

    static public function anonymousRoles()
    {
        return array(
            "Anonymous",
        );
    }

    static public function superAdministratorRoles()
    {
        return array(
            "Super Administrator",
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