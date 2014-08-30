<?php
/** @var DashboardController $this */
/** @var Account $model */
/** @var string $modelClass */
?>
<div class="dashboard-controller tasks-action">
    <div class="dashboard-profile-wrapper">
        <div class="dashboard-profile">
            <div class="profile-image">
                <?php echo $model->profile->renderPicture(); ?>
            </div>
            <div class="profile-facts">
                <div class="row">
                    <div class="content-wrapper">
                        <h2 class="name">
                            <?php echo isset($model->profile->fullName) ? $model->profile->fullName : $model->username; ?>
                        </h2>
                        <span class="lives-in"><?php echo $model->profile->lives_in; ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="content-wrapper">
                        <ul class="groups">
                            <?php foreach ($model->groupHasAccounts as $gha): ?>
                                <li>
                                    <div class="group">
                                        <strong class="group-name"><?php echo $gha->group->title; ?></strong><br />
                                        <span class="group-role"><?php echo $gha->role->title; ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="profile-actions">
                <div class="actions btn-group-vertical">
                    <?php echo TbHtml::link(t('app', 'Edit Profile'), array('/profile/edit'), array('class' => 'btn btn-link')); ?>
                </div>
            </div>
        </div>

    </div>
    <?php if (Yii::app()->user->isGroupAdmin() || Yii::app()->user->isAdmin()): ?>
        <div class="dashboard-tasks-container">
            <div class="tasks-top-bar">
                <div class="top-bar-title">
                    <h2 class="tasks-heading"><?php echo Yii::t('app', 'Quick Start'); ?></h2>
                </div>
            </div>
            <?php echo $this->renderItemActionDropdown(Yii::t('app', 'Browse...'), 'browse', true); ?>
            <?php echo $this->renderItemActionDropdown(Yii::t('app', 'Create New...'), 'add'); ?>
        </div>
    <?php endif; ?>
    <div class="dashboard-tasks-container">
        <?php if (Yii::app()->user->isTranslator && empty(Yii::app()->user->translatableLanguages)): ?>
        <div>
            <div class="tasks-top-bar">
                <div class="top-bar-title">
                    <h2 class="tasks-heading"><?php echo Yii::t('app', 'Required tasks'); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="tasks">
                    <ul class="tasks-list">
                        <div class="list-items">
                            <li class="tasks-list-item">
                                <div class="task">
                                    <div class="task-thumbnail">
                                        <div class="thumbnail-container">
                                            <img src="http://placehold.it/210x120" alt="task placeholder">
                                        </div>
                                    </div>
                                    <div class="task-info">
                                        <div class="task-top-bar">
                                            <div class="task-action-text">
                                            <span class="action-heading">
                                                <?php echo Yii::t('app', 'Complete your profile'); ?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="task-title">
                                            <h3 class="task-heading">
                                                <?php echo Yii::t('app', 'You need to have at least one language set in your profile before you can start contributing.'); ?>
                                            </h3>
                                        </div>
                                        <div class="task-bottom-bar">
                                            <div class="task-progress">&nbsp;</div>
                                            <div class="task-actions">
                                                <?php echo TbHtml::linkButton(
                                                    Yii::t('app', 'Go to profile'),
                                                    array(
                                                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                        'url' => $this->createUrl('/profile/edit'),
                                                    )
                                                ); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <hr/>
        <?php endif; ?>
        <?php $this->widget(
            'app.widgets.DashboardTaskList',
            array(
                'type' => DashboardTaskList::TYPE_STARTED,
                'account' => $model,
            )
        ); ?>
        <hr>
        <?php $this->widget(
            'app.widgets.DashboardTaskList',
            array(
                'type' => DashboardTaskList::TYPE_NEW,
                'account' => $model,
            )
        ); ?>
    </div>
</div>
