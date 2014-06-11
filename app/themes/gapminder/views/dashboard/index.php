<?php
/** @var AccountController $this */
/** @var Account $model */
/** @var string $modelClass */
?>
<?php
$this->breadcrumbs[] = Yii::t('account', 'Gapminder Community'); // TODO: Replace with an appropriate breadcrumb item/link.
$this->breadcrumbs[] = Yii::t('account', 'Dashboard');
?>
<div class="account-controller dashboard-action">
    <div class="dashboard-profile">
        <div class="row">
            <div class="profile-info">
                <div class="row">
                    <div class="profile-picture">
                        <?php echo $model->profile->renderPicture(); ?>
                    </div>
                    <div class="profile-facts">
                        <div class="profile-top-bar">
                            <div class="profile-points">
                                <?php echo TbHtml::icon(TbHtml::ICON_RECORD); ?>
                                <?php echo Yii::t('app', '{pointCount} pts', array(
                                    '{pointCount}' => 0 // TODO: Get points dynamically.
                                )); ?>
                            </div>
                            <div class="profile-actions">
                                <?php echo TbHtml::link(TbHtml::icon(TbHtml::ICON_COG), array('/profile/edit')); ?>
                            </div>
                        </div>
                        <h1 class="profile-name"><?php echo $model->profile->getFullName(); ?></h1>
                        <?php /*
                        <span class="profile-title"><?php echo 'Project Manager at Nord Software'; // TODO: Get title dynamically. ?></span>
                        */ ?>
                    </div>
                </div>
            </div>
            <div class="recent-updates">
                <div class="updates-top-bar">
                    <div class="updates-title">
                        <h2 class="updates-heading"><?php echo Yii::t('app', 'Recent Updates'); ?></h2>
                    </div>
                    <div class="updates-view-all">
                        <?php echo TbHtml::link(
                            Yii::t('app', 'View all ({updateCount})', array(
                                '{updateCount}' => 0, // TODO: Get update count dynamically.
                            )),
                            '#', // TODO: Add link.
                            array(
                                'class' => 'view-all-link',
                            )
                        ); ?>
                    </div>
                </div>
                <div class="updates">
                    <div class="updates-content">
                        <ul class="updates-list">
                            <?php /*
                            <?php // TODO: Render the two most recent updates. ?>
                            <li>
                                <div class="update-image">
                                    <?php echo TbHtml::image('http://placehold.it/80x45'); ?>
                                </div>
                                <div class="update-info">
                                    <span class="update-title"><?php echo 'Congratulations!'; ?></span>
                                    <span class="update-description"><?php echo 'Your video has been viewed 201,400 times!'; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="update-image">
                                    <?php echo TbHtml::image('http://placehold.it/80x45'); ?>
                                </div>
                                <div class="update-info">
                                    <span class="update-title"><?php echo 'You have earned an achievement!'; ?></span>
                                    <span class="update-description"><?php echo 'This achievement is awarded to users that have translated 30 videos.'; ?></span>
                                </div>
                            </li>
                            */ ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-tasks-container">
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
