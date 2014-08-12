<?php

class LandingPageGroups extends CWidget
{
    /**
     * @var array
     */
    public $groups = array();

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->createGroups();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo '<div class="row">';

        $groupCounter = 0;
        foreach ($this->groups as $groupData) {
            if (!isset($groupData['members'])) {
                continue;
            } elseif ($groupCounter === 3) {
                echo '</div><div class="row">';
            }
            $this->render('_group', array('groupData' => $groupData));
            $groupCounter++;
        }

        echo '</div>';
    }

    /**
     * Creates the groups to show.
     */
    protected function createGroups()
    {
        $groupIds = array();
        foreach ($this->groups as $groupName => $groupData) {
            $groupIds[] = PermissionHelper::groupNameToId($groupName);
        }

        $db = Yii::app()->getDb();
        $groupsCmd = null;
        $groupsCmdParams = array();
        foreach ($groupIds as $i => $groupId) {
            $groupIdParam = ":groupId{$i}";
            /** @var CDbCommand $cmd */
            $cmd = $db->createCommand()
                ->select('CONCAT_WS(" ", profile.first_name, profile.last_name) AS name, profile.picture_media_id, group.title AS group_title, role.title AS title')
                ->from('account')
                ->join('profile', '`profile`.`user_id` = `account`.`id`')
                ->join('group_has_account', '`group_has_account`.`account_id` = `account`.`id`')
                ->join('group', '`group`.`id` = `group_has_account`.`group_id`')
                ->join('role', '`role`.`id` = `group_has_account`.`role_id`')
                ->where("`group`.`id`={$groupIdParam}")
                ->limit(2)
                ->group('account.id');
            $groupsCmdParams[$groupIdParam] = $groupId;
            if ($groupsCmd === null) {
                $groupsCmd = $cmd;
            } else {
                /** @var CDbCommand $groupsCmd */
                $groupsCmd->union($cmd->getText());
            }
        }
        $groupsCmd->bindValues($groupsCmdParams);

        $p3Media = new P3Media();
        foreach ($groupsCmd->queryAll() as $row) {
            $groupName = $row['group_title'];
            if (!isset($this->groups[$groupName])) {
                continue;
            }
            unset($row['group_title']);
            if (isset($row['picture_media_id'])) {
                $p3Media->id = (int)$row['picture_media_id'];
                $row['picture_url'] = $p3Media->createUrl('user-profile-picture-small');
            } else {
                $row['picture_url'] = 'http://placehold.it/70x70';
            }
            $this->groups[$groupName]['members'][] = $row;
        }
    }
} 