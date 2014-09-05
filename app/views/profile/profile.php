<?php
/* @var ProfileController $this */
/* @var Account $model */
?>
<div class="profile-controller profile-action">
    <?php $this->widget(
        'application.widgets.PageControls',
        array(
            'left' => array(
                'label' => Yii::t('app', 'Edit Profile'),
                'url' => array('/profile/edit', 'id' => $model->id),
                'visible' => $model->id === user()->id,
            ),
        )
    ); ?>
    <div class="profile-summary">
        <div class="summary-picture">
            <?php echo $model->profile->renderPicture('user-profile-picture-large'); ?>
        </div>
        <div class="summary-info">
            <h1 class="info-heading"><?php echo $model->profile->getFullName(); ?></h1>
            <div class="info-subheading"><?php echo $model->profile->lives_in; ?></div>
            <div class="info-groups">
                <ul class="groups">
                    <?php foreach ($model->groupHasAccounts as $gha): ?>
                        <li>
                            <div class="group">
                                <strong class="group-name"><?php echo $gha->group->title; ?></strong><br/>
                                <span class="group-role"><?php echo $gha->role->title; ?></span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
