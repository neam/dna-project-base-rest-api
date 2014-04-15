<?php
/** @var AccountController $this */
/** @var Account $model */
/** @var CActiveDataProvider $dataProvider */
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
                                <?php echo TbHtml::link(TbHtml::icon(TbHtml::ICON_COG), array('/account/profile')); ?>
                            </div>
                        </div>
                        <h1 class="profile-name"><?php echo $model->profile->getFullName(); ?></h1>
                        <span class="profile-title"><?php echo 'Project Manager at Nord Software'; // TODO: Get title dynamically. ?></span>
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-tasks-in-progress">
        <h2 class="tasks-in-progress-heading"><?php echo Yii::t('app', 'Tasks in Progress'); ?></h2>
        <div class="row">
            <div class="tasks">
                <ul class="tasks-list">
                    <?php // TODO: Render tasks dynamically. ?>
                    <li>
                        <div class="task">
                            <div class="task-thumbnail">
                                <div class="thumbnail-container">
                                    <?php echo TbHtml::image('http://placehold.it/210x120'); ?>
                                </div>
                                <div class="skip-link-container">
                                    <?php echo TbHtml::link(
                                        Yii::t('app', "Skip this, I don't want to continue."),
                                        '#', // TODO: Add cancellation URL.
                                        array(
                                            'class' => 'skip-this-link',
                                        )
                                    ); ?>
                                </div>
                            </div>
                            <div class="task-info">
                                <div class="task-top-bar">
                                    <div class="task-action-text">
                                        <span class="action-heading">
                                            <?php echo Yii::t('app', 'Now Translating:'); // TODO: Get action heading dynamically. ?>
                                        </span>
                                    </div>
                                    <div class="task-facts">
                                        <ul class="facts-list">
                                            <li><?php echo Yii::t('app', '{viewCount} views', array(
                                                '{viewCount}' => 0, // TODO: Get view count dynamically.
                                            )); ?></li>
                                            <li><?php echo Yii::t('app', 'In {languageCount} languages', array(
                                                '{languageCount}' => 0, // TODO: Get language count dynamically.
                                            )); ?></li>
                                            <li><?php echo Yii::t('app', '+{pointCount} pts', array(
                                                '{pointCount}' => 0, // TODO: Get point count dynamically.
                                            )); ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="task-title">
                                    <h3 class="task-heading">
                                        <?php echo 'What you did not know about literacy'; // TODO: Get item title dynamically. ?>
                                    </h3>
                                </div>
                                <div class="task-bottom-bar">
                                    <div class="task-progress">
                                        <div class="progress-info">
                                            <span class="progress-title">
                                                <?php echo 'Swedish'; // TODO: Get progress title dynamically. ?>
                                            </span>
                                            <span class="progress-percentage">
                                                <?php echo '22%'; // TODO: Get percentage dynamically. ?>
                                            </span>
                                        </div>
                                        <div class="progress-bar-container">
                                            <?php echo TbHtml::progressBar(
                                                20, // TODO: Get percentage dynamically.
                                                array(
                                                    'color' => TbHtml::LABEL_COLOR_SUCCESS,
                                                )
                                            ); ?>
                                        </div>
                                    </div>
                                    <div class="task-actions">
                                        <?php echo TbHtml::linkButton(
                                            Yii::t('app', 'Continue'),
                                            array(
                                                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                'href' => '#', // TODO: Add URL to the next step.
                                            )
                                        ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="dashboard-new-tasks">
        <h2 class="new-tasks-heading"><?php echo Yii::t('app', 'New Tasks'); ?></h2>
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_dashboard-action',
        )); ?>
    </div>

    <?php /*
    <h1>
        <?php echo $model->profile->first_name . " " . $model->profile->last_name; ?>
        <small><?php echo Yii::t('account', 'Dashboard') ?> <?php //echo $model->id ?></small>
    </h1>
    <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    <div class="alert alert-info">
        <h4>Work in progress</h4>
        This is where you will see recommended actions for you to take.
    </div>
    <?php if (!Yii::app()->user->checkAccess('Translate') && !Yii::app()->user->checkAccess('Edit') && !Yii::app()->user->checkAccess('Add')): ?>
        <div class="alert alert-error">
            <?php echo Yii::t('account', 'You do not have permissions assigned.'); ?>
            <?php echo Yii::t('account', 'Without any permissions, we can not propose a suitable task for you.'); ?>
            <?php echo Yii::t('account', 'Only administrators can assign permissions.'); ?>
            <?php //echo Yii::t('account', 'Please apply for a permission.'); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Add')): ?>
        <div class="add-content">
            <h2><?php echo Yii::t('dashboard', 'Add content'); ?></h2>
            <?php foreach (DataModel::qaModels() as $modelClass => $table): ?>
                <?php if ($table == "exam_question_alternative") {
                    continue;
                } ?>
                <?php $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Create $modelClass"),
                    "size" => "large",
                    "icon" => "glyphicon-plus",
                    "url" => array(lcfirst($modelClass) . "/add")
                )); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Translate')): ?>
        <div class="translate-content">
            <h2><?php echo Yii::t('dashboard', 'Translate content'); ?></h2>

            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_dashboard-action',
            ));
            ?>

        </div>
    <?php endif; ?>
    */ ?>
</div>
