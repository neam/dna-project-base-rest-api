<?php
/**
 * @var $groupData array
 *
 * array(
 *  'title' => 'translated group title',
 *  'members' => array(
 *    'picture_url' => 'user profile picture url or placeholder',
 *    'name' => 'the user name (first- and last name)',
 *    'title' => 'user role title in group',
 *  ),
 *  'link' => array(
 *   'text' => 'translated link title',
 *   'url' => 'link url',
 *  )
 * )
 *
 */
?>
<div class="groups-column col-xs-offset-4">
    <h3><?php echo $groupData['title']; ?></h3>
    <div class="row">
        <?php foreach ($groupData['members'] as $member): ?>
            <div class="group-member">
                <div class="member-picture">
                    <img src="<?php echo $member['picture_url']; ?>">
                </div>
                <div class="member-info">
                    <span class="member-name"><?php echo $member['name']; ?></span>
                    <span class="member-title"><?php echo $member['title']; ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (isset($groupData['link'])): ?>
        <div class="group-column-footer">
            <?php echo TbHtml::link($groupData['link']['text'], $groupData['link']['url']); ?>
        </div>
    <?php endif; ?>
</div>