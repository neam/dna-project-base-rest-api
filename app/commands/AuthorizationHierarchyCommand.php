<?php

/**
 * Builds the authorization hierarchy which is stored in a php-based authfile.
 * Do not assign any items to users here, use migrations or the app UI.
 * Class AuthorizationHierarchyCommand
 */
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

    /**
     * Atomic actions are called operations
     * Actions under special circumstances are called tasks - if a user may perform the task then the user may perform the task's associated operations
     * Roles has the right to perform one or many tasks and operations
     *
     * This action builds to authorization hierarchy. At first it defines operations and tasks, then assigns access to these to the roles
     */
    public function actionBuild()
    {

        $auth = Yii::app()->authManager;

        // BIZRULES

        // Bizrule for checking that the item belongs to the group that is sent to checkAccess()
        $belongsToGroupBizrule = 'return TODO;';
        $belongsToGapminderOrgGroupBizrule = 'return true;';
        $userHasbelongsToGroupBizrule = 'return TODO;';
        // Bizrule for checking that the current user is the owner of the item
        $userIsOwnerBizrule = 'return Yii::app()->user->id==$params["item"]->owner_id;';
        // Bizrule for checking that the current user has contributed to the item
        $userHasChangeSetBizrule = 'return TODO;';
        // Bizrule for checking that the language being translated into is one of the user's selected languages
        $translatedIntoIsProfileLanguageBizrule = 'return TODO;';

        // OPERATIONS & TASKS

        //  itemVisibilityOperations
        //   group-dependent
        $auth->createOperation('Item.List');
        $auth->createOperation('Item.Unlist');
        $auth->createOperation('Item.Suggest');
        $auth->createOperation('Item.Publish/Replace');
        $auth->createOperation('Item.Unpublish/Revert');

        $task = $auth->createTask('Items.List.WithinGroup');
        $task->addChild('Item.List');
        $task = $auth->createTask('Items.Unlist.WithinGroup');
        $task->addChild('Item.Unlist');
        $task = $auth->createTask('Items.Suggest.WithinAnyGroup');
        $task->addChild('Item.Suggest');
        $task = $auth->createTask('Items.Publish/Replace.WithinGroup');
        $task->addChild('Item.Publish/Replace');
        $task = $auth->createTask('Items.Unpublish/Revert.WithinGroup');
        $task->addChild('Item.Unpublish/Revert');
        $task = $auth->createTask('OwnItems.List.WithinGroup');
        $task->addChild('Item.List');
        $task = $auth->createTask('OwnItems.Unlist.WithinGroup');
        $task->addChild('Item.Unlist');
        $task = $auth->createTask('OwnItems.Suggest.WithinAnyGroup');
        $task->addChild('Item.Suggest');

        //  itemInteractionOperations
        //   group/own-independent
        $auth->createOperation('Item.Add');

        //   group-independent,own-dependent
        $auth->createOperation('Item.Remove');

        $task = $auth->createTask('OwnItems.Remove');
        $task->addChild('Item.Add');

        //   group/own-dependent in the sense that they are allowed if the user is part of the group
        $auth->createOperation('Item.Browse');
        $auth->createOperation('Item.View');
        $auth->createOperation('Item.PrepareForReview');
        $auth->createOperation('Item.Preview');
        $auth->createOperation('Item.Evaluate');
        $auth->createOperation('Item.Proofread');
        $auth->createOperation('Item.PrepareForPublishing');
        $auth->createOperation('Item.Approve');
        $auth->createOperation('Item.Translate');
        $auth->createOperation('Item.TranslateUnrestricted');
        $auth->createOperation('Item.Edit');
        $auth->createOperation('Item.Clone');

        $task = $auth->createTask('GroupItems.Browse');
        $task->addChild('Item.Browse');
        $task = $auth->createTask('GroupItems.View');
        $task->addChild('Item.View');
        $task = $auth->createTask('GroupItems.PrepareForReview');
        $task->addChild('Item.PrepareForReview');
        $task = $auth->createTask('GroupItems.Preview');
        $task->addChild('Item.Preview');
        $task = $auth->createTask('GroupItems.Evaluate');
        $task->addChild('Item.Evaluate');
        $task = $auth->createTask('GroupItems.Proofread');
        $task->addChild('Item.Proofread');
        $task = $auth->createTask('GroupItems.PrepareForPublishing');
        $task->addChild('Item.PrepareForPublishing');
        $task = $auth->createTask('GroupItems.Approve');
        $task->addChild('Item.Approve');
        $task = $auth->createTask('GroupItems.Translate');
        $task->addChild('Item.Translate');
        $task = $auth->createTask('GroupItems.TranslateUnrestricted');
        $task->addChild('Item.TranslateUnrestricted');
        $task = $auth->createTask('GroupItems.Edit');
        $task->addChild('Item.Edit');
        $task = $auth->createTask('GroupItems.Clone');
        $task->addChild('Item.Clone');

        $task = $auth->createTask('OwnItems.Edit');
        $task->addChild('Item.Edit');

        $task = $auth->createTask('GapminderOrgGroupItems.Browse', null, $belongsToGapminderOrgGroupBizrule);
        $task->addChild('Item.Browse');
        $task = $auth->createTask('GapminderOrgGroupItems.View', null, $belongsToGapminderOrgGroupBizrule);
        $task->addChild('Item.View');

        // Phundament-operations necessary to access some Phundament-features
        $auth->createOperation('P3media.Import.*');
        $auth->createOperation('P3media.Import.scan');
        $auth->createOperation('P3media.P3Media.*');
        $auth->createOperation('P3media.P3Media.View');
        $auth->createOperation('P3admin.Default.Index');
        $auth->createOperation('P3admin.Default.Settings');
        $auth->createOperation('P3media.Default.*');
        $auth->createOperation('P3media.P3MediaTranslation.*');
        $auth->createOperation('Admin');
        $auth->createOperation('Editor');
        $auth->createOperation('P3pages.P3Page.*');
        $auth->createOperation('P3pages.P3PageTranslation.*');
        $auth->createOperation('P3widgets.Default.*');
        $auth->createOperation('Translate.*');

        // ROLES & ASSIGNMENTS

        $role = $auth->createRole('Anonymous');
        $role->addChild('GapminderOrgGroupItems.Browse');
        $role->addChild('GapminderOrgGroupItems.View');

        $authenticatedBizRule = 'return !Yii::app()->user->isGuest;';
        $role = $auth->createRole('Member', null, $authenticatedBizRule);
        $role->addChild('Item.Add');
        $role->addChild('OwnItems.Edit');
        $role->addChild('OwnItems.Suggest.WithinAnyGroup');
        $role->addChild('P3media.Import.*'); // Upload access is necessary for everyone in order to upload their profile picture

        $role = $auth->createRole('Group Member');
        $role->addChild('GroupItems.Browse');
        $role->addChild('GroupItems.View');
        $role->addChild('GroupItems.Clone');

        $role = $auth->createRole('Group Translator');
        $role->addChild('GroupItems.Translate');

        $role = $auth->createRole('Group Reviewer');
        $role->addChild('GroupItems.Preview');
        $role->addChild('GroupItems.Evaluate');
        $role->addChild('GroupItems.Proofread');

        $role = $auth->createRole('Group Contributor');
        $role->addChild('OwnItems.List.WithinGroup');
        $role->addChild('OwnItems.Unlist.WithinGroup');

        $role = $auth->createRole('Group Moderator');
        $role->addChild('Items.List.WithinGroup');
        $role->addChild('Items.Unlist.WithinGroup');
        // TODO add assign-tasks

        $role = $auth->createRole('Group Approver');
        $role->addChild('GroupItems.Approve');

        $role = $auth->createRole('Group Editor');
        $role->addChild('GroupItems.PrepareForReview');
        $role->addChild('GroupItems.PrepareForPublishing');
        $role->addChild('GroupItems.Edit');

        $role = $auth->createRole('Group Publisher');
        $role->addChild('Items.Publish/Replace.WithinGroup');
        $role->addChild('Items.Unpublish/Revert.WithinGroup');

        $role = $auth->createRole('Group Administrator');
        $role->addChild('Group Publisher');
        $role->addChild('Group Editor');
        $role->addChild('Group Approver');
        $role->addChild('Group Moderator');
        $role->addChild('Group Contributor');
        $role->addChild('Group Reviewer');
        $role->addChild('Group Translator');
        // TODO add assign-tasks

        $superAdministratorRole = $auth->createRole('Super Administrator');
        $superAdministratorRole->addChild('Group Administrator');
        // TODO add Item-operations regardless of Group here

        // We can use the developer role temporarily to get access to items while developing (ie add to roles => array('Developer') in access control filter)
        // it has access to all of Super Administrator items and these temporary dev items (for instance features not yet released)
        $developerRole = $auth->createRole('Developer');
        $developerRole->addChild('Super Administrator');

        // Temporary dev items that gives access to phundament-specific actions. Assigned to Developer role until properly sorted into hierarchy
        $developerRole->addChild('P3media.Import.*');
        $developerRole->addChild('P3media.Import.scan');
        $developerRole->addChild('P3media.P3Media.*');
        $developerRole->addChild('P3media.P3Media.View');
        $developerRole->addChild('P3media.Default.*');
        $developerRole->addChild('P3media.P3MediaTranslation.*');
        $developerRole->addChild('P3admin.Default.Index');
        $developerRole->addChild('P3admin.Default.Settings');
        $developerRole->addChild('Admin');
        $developerRole->addChild('Editor');
        $developerRole->addChild('P3pages.P3Page.*');
        $developerRole->addChild('P3pages.P3PageTranslation.*');
        $developerRole->addChild('P3widgets.Default.*');
        $developerRole->addChild('Translate.*');

        $baseModels = DataModel::crudModels();
        $qaStateModels = DataModel::qaStateModels();

        // merge
        $cruds = array_merge($baseModels, $qaStateModels);

        foreach ($cruds as $model => $table) {
            if ($model == "Item") {
                continue;
            }

            foreach (array('*', 'View', 'Update', 'Delete') as $action) {

                $auth->createOperation("{$model}.{$action}");
                $developerRole->addChild("{$model}.{$action}");

            }
        }

        $auth->save();

    }

    public function actionMetadata()
    {

        $auth = Yii::app()->authManager;
        var_dump($auth->getAuthAssignments(1));

    }

    public function actionGoogleSpreadsheetPermissionsMatrixColumnsAndRows()
    {
        echo "\t";

        foreach (Metadata::developerRoles() as $role) {
            echo "$role\t";
        }

        foreach (Metadata::roleTypes() as $roleType) {
            echo "$roleType\t";
        }

        foreach (Metadata::contextLessRoles() as $role) {
            echo "$role\t";
        }

        echo "\n";

        foreach (Metadata::itemVisibilityOperations() as $operation => $description) {
            echo "$operation\n";
        }
        foreach (Metadata::itemInteractionOperations() as $operation => $description) {
            echo "$operation\n";
        }

    }

}
