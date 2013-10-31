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

        // We can use the developer role temporarily to get access to items while developing (ie add to roles => array('Developer') in access control filter)
        // it has access to all of Super Administrator items and these temporary dev items (for instance features not yet released)
        $developerRole = $auth->createRole('Developer');
        $developerRole->addChild('Super Administrator');

        foreach (array('GapminderSchool', 'DollarStreet', 'IgnoranceProject', 'HumanNumbers', '') as $project) {

            $prefix = !empty($project) ? $project . '.' : $project;

            // Atomic actions are called operations
            $auth->createOperation($prefix . 'Item.Add', 'Adds a temporary empty item to the database');
            $auth->createOperation($prefix . 'Item.Draft', 'Completes a temporary item by stepping through fields required for DRAFT  ');
            $auth->createOperation($prefix . 'Item.AddEdge', 'Add a relation');
            $auth->createOperation($prefix . 'Item.DeleteEdge', 'Remove a relation');
            $auth->createOperation($prefix . 'Item.PrepPreshow', 'Prepare item for preshow, by stepping through fields required for PREVIEW');
            $auth->createOperation($prefix . 'Item.Preshow', 'Put item in preshow mode, by switching itemVersion.status to PREVIEW');
            $auth->createOperation($prefix . 'Item.Evaluate', 'Evaluating an item in Preview-mode by grading and commenting on it\'s fields or the total itemVersion.');
            $auth->createOperation($prefix . 'Item.PrepPublish', 'Prepare for publishing, by stepping through fields required for PUBLIC.');
            $auth->createOperation($prefix . 'Item.Preview', 'Preview the current content.');
            $auth->createOperation($prefix . 'Item.Review', 'Reviewing the full content by stepping to next field approved==false.');
            $auth->createOperation($prefix . 'Item.ProofRead', 'Review and improve language');
            $auth->createOperation($prefix . 'Item.Translate', 'Translate to languages that you added to our profile.');
            $auth->createOperation($prefix . 'Item.Publish', 'Make public for the first time, or when replacing a previous version.');
            $auth->createOperation($prefix . 'Item.Edit', 'Look at all fields, no obvious goal');
            $auth->createOperation($prefix . 'Item.Clone', 'Creates a new itemVersion with incremented version number and goes to "edit" workFlow. If the original is in PUBLIC after achieving publishableFlag == true, suggest workFlow PrepPublish');
            $auth->createOperation($prefix . 'Item.Remove', 'Removed means there\'s something wrong with the content so it should not be used in any language any time');
            $auth->createOperation($prefix . 'Item.Replace', 'Replaced, means it\'s OK to fall back to, in case translation is missing for new version');
            $auth->createOperation($prefix . 'Item.Go', 'Displays the item and it\'s related items');

            // Actions under special circumstances are called tasks - if a user may perform the task then the user may perform the task's associated operations

            // "Own" items
            $bizRule = 'return Yii::app()->user->id==$params["post"]->creator_id;';
            $task = $auth->createTask($prefix . 'Item.RemoveOwn', 'Remove an item created by the user himself', $bizRule);
            $task->addChild($prefix . 'Item.Remove');
            $task = $auth->createTask($prefix . 'Item.ReplaceOwn', 'Replace an item created by the user himself', $bizRule);
            $task->addChild($prefix . 'Item.Replace');

            // Status-dependent
            $bizRule = 'return $params["post"]->version->status == "Public";';
            $task = $auth->createTask($prefix . 'Item.RemovePublic', 'Remove an item that is public', $bizRule);
            $task->addChild($prefix . 'Item.Remove');
            $task = $auth->createTask($prefix . 'Item.ReplacePublic', 'Remove an item that is public', $bizRule);
            $task->addChild($prefix . 'Item.Replace');
            $bizRule = 'return $params["post"]->version->status != "Public";';
            $task = $auth->createTask($prefix . 'Item.RemoveNonPublic', 'Remove an item that is not public', $bizRule);
            $task->addChild($prefix . 'Item.Remove');
            $task = $auth->createTask($prefix . 'Item.ReplaceNonPublic', 'Remove an item that is not public', $bizRule);
            $task->addChild($prefix . 'Item.Replace');

            // Language-dependent
            $bizRule = 'return in_array(Yii::app()->language, Yii::app()->user->languages);'; // todo: make this work
            $task = $auth->createTask($prefix . 'Item.TranslateIntoSpokenLanguage', 'Translate current language', $bizRule);
            $task->addChild($prefix . 'Item.Translate');

            // Roles has the right to perform one or many tasks and operations
            $role = $auth->createRole($prefix . 'Creator');
            $role->addChild($prefix . 'Item.Add');
            $role->addChild($prefix . 'Item.Draft');
            $role->addChild($prefix . 'Item.AddEdge');
            $role->addChild($prefix . 'Item.DeleteEdge');
            $role->addChild($prefix . 'Item.PrepPreshow');
            $role->addChild($prefix . 'Item.Preshow');
            $role->addChild($prefix . 'Item.PrepPublish');
            $role->addChild($prefix . 'Item.Edit');
            $role->addChild($prefix . 'Item.Clone');
            $role->addChild($prefix . 'Item.RemoveOwn');
            $role->addChild($prefix . 'Item.ReplaceOwn');
            $role->addChild($prefix . 'Item.RemoveNonPublic');
            $role->addChild($prefix . 'Item.ReplaceNonPublic');

            $role = $auth->createRole($prefix . 'Previewer');
            $role->addChild($prefix . 'Item.Preview');

            $role = $auth->createRole($prefix . 'Evaluator');
            $role->addChild($prefix . 'Item.Evaluate');

            $role = $auth->createRole($prefix . 'Approver');
            $role->addChild($prefix . 'Item.Review');

            $role = $auth->createRole($prefix . 'Proofreader');
            $role->addChild($prefix . 'Item.ProofRead');

            $role = $auth->createRole($prefix . 'Translator');
            $role->addChild($prefix . 'Item.TranslateIntoSpokenLanguage');

            $role = $auth->createRole($prefix . 'Publisher');
            $role->addChild($prefix . 'Item.Publish');
            $role->addChild($prefix . 'Item.RemovePublic');
            $role->addChild($prefix . 'Item.ReplacePublic');

            $role = $auth->createRole($prefix . 'Administrator');
            $role->addChild($prefix . 'Publisher');
            $role->addChild($prefix . 'Approver');
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

        // For now also assign developer role to super user
        $auth->assign('Developer', 1);

        // Temporary dev items assigned to Developer role until properly sorted into hierarchy
        $auth->createOperation('P3media.Import.*');
        $developerRole->addChild('P3media.Import.*');
        $auth->createOperation('P3media.Import.scan');
        $developerRole->addChild('P3media.Import.scan');
        $auth->createOperation('P3admin.Default.Index');
        $developerRole->addChild('P3admin.Default.Index');
        $auth->createOperation('P3admin.Default.Settings');
        $developerRole->addChild('P3admin.Default.Settings');

        $baseModels = Yii::app()->params['dataModelMeta']['crudModels'];
        $qaStateModels = Yii::app()->params['dataModelMeta']['qaStateModels'];

        // merge
        $cruds = array_merge($baseModels, $qaStateModels);

        foreach ($cruds as $model => $table) {
            foreach (array('*', 'View', 'Update', 'Delete') as $action) {

                $auth->createOperation("{$model}.{$action}");
                $developerRole->addChild("{$model}.{$action}");

            }
        }
        $auth->createOperation('Admin');
        $developerRole->addChild('Admin');

        $auth->save();

    }

    public function actionMetadata()
    {

        $auth = Yii::app()->authManager;
        var_dump($auth->getAuthAssignments(1));

    }
}
