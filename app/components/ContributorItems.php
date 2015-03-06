<?php

class ContributorItems
{
    /**
     * Returns a list of contributors for the owner node.
     * Only contributors who's profile has been made "public" will be included.
     *
     * @param int $nodeId
     * @return array the list of contributors.
     */
    public static function getItems($nodeId)
    {
        // todo: access rights join statement is hard-coded

        $command = Yii::app()->getDb()->createCommand()
            ->select('changeset.user_id, account.username, profile.first_name, profile.last_name, profile.profile_picture_media_id')
            ->from('changeset')
            ->leftJoin('account', 'account.id=changeset.user_id')
            ->leftJoin('profile', 'profile.account_id=account.id')
            ->leftJoin('node_has_group', '`profile`.`node_id` = `node_has_group`.`node_id` AND `node_has_group`.`group_id` = 1 AND `node_has_group`.`visibility` = "visible"')
            ->where('changeset.node_id=:nodeId AND `node_has_group`.`id` IS NOT NULL')
            ->group('changeset.user_id');

        $contributors = array();
        foreach ($command->queryAll(true, array(':nodeId' => (int)$nodeId)) as $row) {
            $contributors[] = array(
                'user_id' => (int)$row['user_id'],
                'username' => (string)$row['username'],
                'first_name' => (string)$row['first_name'],
                'last_name' => (string)$row['last_name'],
                'thumbnail_url' => self::getProfilePictureUrl((int)$row['profile_picture_media_id']),
            );
        }
        return $contributors;
    }

    /**
     * Returns the profile picture url or null if picture not found.
     *
     * @param int $mediaId the picture media model id.
     * @return string|null
     */
    protected static function getProfilePictureUrl($mediaId)
    {
        if (!empty($mediaId)) {
            return Barebones::createMediaUrl($mediaId, 'user-profile-picture');
        }
        return null;
    }
} 