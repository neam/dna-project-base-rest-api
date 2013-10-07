<?php

class AuthorizationHierarchyCommand extends CConsoleCommand
{
    public function getHelp()
    {
        return <<<EOD
USAGE
  yiic authorizationhierarchy reset
  yiic authorizationhierarchy build
  yiic authorizationhierarchy metadata

DESCRIPTION
  Resets, builds or provides metadata about the authorization hierarchy

EOD;
    }

    public function actionReset()
    {

        if (is_file(Yii::app()->authManager->authFile)) {
            unlink(Yii::app()->authManager->authFile);
        }

    }

    public function actionBuild()
    {

        $auth = Yii::app()->authManager;

        $superAdministratorRole = $auth->createRole('Super Administrator');

        foreach (array('GS', 'DS', 'IP', 'HN') as $project) {

            $prefix = $project . '.';

            // Atomic actions are called operations
            $auth->createOperation($prefix . 'item.add', 'Adds a temporary empty item to the database');
            $auth->createOperation($prefix . 'item.new', 'Completes a temporary item by stepping through fields required for DRAFT  ');
            $auth->createOperation($prefix . 'item.prepPreshow', 'Prepare item for preshow, by stepping through fields required for PREVIEW');
            $auth->createOperation($prefix . 'item.preshow', 'Put item in preshow mode, by switching itemVersion.status to PREVIEW');
            $auth->createOperation($prefix . 'item.evaluate', 'Evaluating an item in Preview-mode by grading and commenting on it\'s fields or the total itemVersion.');
            $auth->createOperation($prefix . 'item.prepPublish', 'Prepare for publishing, by stepping through fields required for PUBLIC.');
            $auth->createOperation($prefix . 'item.preview', 'Preview the current content.');
            $auth->createOperation($prefix . 'item.review', 'Reviewing the full content by stepping to next field approved==false.');
            $auth->createOperation($prefix . 'item.proofRead', 'Review and improve language');
            $auth->createOperation($prefix . 'item.translate', 'Translate to languages that you added to our profile.');
            $auth->createOperation($prefix . 'item.publish', 'Make public for the first time, or when replacing a previous version.');
            $auth->createOperation($prefix . 'item.edit', 'Look at all fields, no obvious goal');
            $auth->createOperation($prefix . 'item.clone', 'Creates a new itemVersion with incremented version number and goes to "edit" workFlow. If the original is in PUBLIC after achieving publishableFlag == true, suggest workFlow PrepPublish');
            $auth->createOperation($prefix . 'item.remove', 'Removed means there\'s something wrong with the content so it should not be used in any language any time');
            $auth->createOperation($prefix . 'item.replace', 'Replaced, means it\'s OK to fall back to, in case translation is missing for new version');

            // Actions under special circumstances are called tasks - if a user may perform the task then the user may perform the task's associated operations

            // "Own" items
            $bizRule = 'return Yii::app()->user->id==$params["post"]->creator_id;';
            $task = $auth->createTask($prefix . 'item.removeOwn', 'Remove an item created by the user himself', $bizRule);
            $task->addChild($prefix . 'item.remove');
            $task = $auth->createTask($prefix . 'item.replaceOwn', 'Replace an item created by the user himself', $bizRule);
            $task->addChild($prefix . 'item.replace');

            // Status-dependent
            $bizRule = 'return $params["post"]->version->status == "Public";';
            $task = $auth->createTask($prefix . 'item.removePublic', 'Remove an item that is public', $bizRule);
            $task->addChild($prefix . 'item.remove');
            $task = $auth->createTask($prefix . 'item.replacePublic', 'Remove an item that is public', $bizRule);
            $task->addChild($prefix . 'item.replace');
            $bizRule = 'return $params["post"]->version->status != "Public";';
            $task = $auth->createTask($prefix . 'item.removeNonPublic', 'Remove an item that is not public', $bizRule);
            $task->addChild($prefix . 'item.remove');
            $task = $auth->createTask($prefix . 'item.replaceNonPublic', 'Remove an item that is not public', $bizRule);
            $task->addChild($prefix . 'item.replace');

            // Language-dependent
            $bizRule = 'return in_array(Yii::app()->language, Yii::app()->user->languages);'; // todo: make this work
            $task = $auth->createTask($prefix . 'item.translateIntoSpokenLanguage', 'Translate current language', $bizRule);
            $task->addChild($prefix . 'item.translate');

            // Roles has the right to perform one or many tasks and operations
            $role = $auth->createRole($prefix . 'Creator');
            $role->addChild($prefix . 'item.add');
            $role->addChild($prefix . 'item.new');
            $role->addChild($prefix . 'item.prepPreshow');
            $role->addChild($prefix . 'item.preshow');
            $role->addChild($prefix . 'item.prepPublish');
            $role->addChild($prefix . 'item.edit');
            $role->addChild($prefix . 'item.clone');
            $role->addChild($prefix . 'item.removeOwn');
            $role->addChild($prefix . 'item.replaceOwn');
            $role->addChild($prefix . 'item.removeNonPublic');
            $role->addChild($prefix . 'item.replaceNonPublic');

            $role = $auth->createRole($prefix . 'Previewer');
            $role->addChild($prefix . 'item.preview');

            $role = $auth->createRole($prefix . 'Evaluator');
            $role->addChild($prefix . 'item.evaluate');

            $role = $auth->createRole($prefix . 'Approver');
            $role->addChild($prefix . 'item.review');

            $role = $auth->createRole($prefix . 'Proofreader');
            $role->addChild($prefix . 'item.proofRead');

            $role = $auth->createRole($prefix . 'Translator');
            $role->addChild($prefix . 'item.translateIntoSpokenLanguage');

            $role = $auth->createRole($prefix . 'Publisher');
            $role->addChild($prefix . 'item.publish');
            $role->addChild($prefix . 'item.removePublic');
            $role->addChild($prefix . 'item.replacePublic');

            $role = $auth->createRole($prefix . 'Administrator');
            $role->addChild($prefix . 'Publisher');
            $role->addChild($prefix . 'Creator');
            $role->addChild($prefix . 'Previewer');
            $role->addChild($prefix . 'Evaluator');
            $role->addChild($prefix . 'Proofreader');
            $role->addChild($prefix . 'Translator');

            // Assign administrator roles for all projects to super administrator
            $superAdministratorRole->addChild($prefix . 'Administrator');

        }

        // Assign super administrator role to super user (id 1)
        $auth->assign('Super Administrator', 1);

        $auth->save();

    }

    public function actionMetadata()
    {

        $auth = Yii::app()->authManager;
        var_dump($auth->getAuthAssignments(1));

    }
}
