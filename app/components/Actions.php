<?php

class Actions
{

    static public function itemActions()
    {

        return array(
            'Browse' => 'Browse amongst items',
            'View' => 'View items',
            'Add' => 'Adds a temporary empty item to the database',
            'Draft' => 'Completes a temporary item by stepping through fields required for DRAFT  ',
            'AddEdge' => 'Add a relation',
            'DeleteEdge' => 'Remove a relation',
            'PrepPreshow' => 'Prepare item for preshow, by stepping through fields required for PREVIEW',
            'Preshow' => 'Put item in preshow mode, by switching itemVersion.status to PREVIEW',
            'Evaluate' => 'Evaluating an item in Preview-mode by grading and commenting on it\'s fields or the total itemVersion.',
            'PrepPublish' => 'Prepare for publishing, by stepping through fields required for PUBLIC.',
            'Preview' => 'Preview the current content.',
            'Review' => 'Reviewing the full content by stepping to next field approved==false.',
            'ProofRead' => 'Review and improve language',
            'Translate' => 'Translate to languages that you added to our profile.',
            'Publish' => 'Make public for the first time, or when replacing a previous version.',
            'Edit' => 'Look at all fields, no obvious goal',
            'Clone' => 'Creates a new itemVersion with incremented version number and goes to "edit" workFlow. If the original is in PUBLIC after achieving publishableFlag == true, suggest workFlow PrepPublish',
            'Remove' => 'Removed means there\'s something wrong with the content so it should not be used in any language any time',
            'Replace' => 'Replaced, means it\'s OK to fall back to, in case translation is missing for new version',
            'Go' => 'Displays the item and it\'s related items using the CMS Go interface',
        );

    }
}