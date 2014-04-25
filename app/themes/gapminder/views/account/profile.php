<?php
/* @var AccountController $this */
/* @var Account $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->breadcrumbs[] = Yii::t('model', 'Users'); ?>
<?php $this->breadcrumbs[$model->username] = array('account/profile', 'id' => $model->id); ?>
<?php $this->breadcrumbs[] = Yii::t('account', 'Profile'); ?>
<div class="account-controller profile-action">
    <?php $form = $this->beginWidget('\AppActiveForm', array(
        'id' => 'profile-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnChange' => true,
            'validateOnType' => false,
            'validateOnSubmit' => true,
        ),
        'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
        'htmlOptions' => array(
            'class' => 'dirtyforms',
        ),
    )); ?>
    <?php $this->renderPartial('profile/_flowbar', array('model' => $model)); ?>
    <div class="after-flowbar">
        <div class="alerts">
            <div class="alerts-content">
                <?php $this->widget('\TbAlert'); ?>
            </div>
        </div>
        <div class="profile">
            <div class="profile-content">
                <?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
                    <div class="content-messages">
                        <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
                    </div>
                <?php endif; ?>
                <div class="content-form">
                    <div class="form-head">
                        <div class="form-head-content">
                            <h2 class="form-heading">
                                <?php echo Yii::t('account', 'Info'); ?>
                                <?php if (false): ?>
                                    <?php echo CHtml::submitButton(Yii::t('model', 'Save'), array(
                                        'class' => 'btn btn-primary',
                                    )); ?>
                                <?php endif; ?>
                                <?php echo Html::hintTooltip(Yii::t('app', 'This is your public profile that others can see without being logged in.')); ?>
                            </h2>
                        </div>
                    </div>
                    <div class="form-errors">
                        <?php echo $form->errorSummary(array($model, $model->profile)); ?>
                    </div>
                    <div class="form-fields">
                        <?php $this->renderPartial(
                            'profile/_form-fields',
                            array(
                                'model' => $model->profile,
                                'form' => $form,
                            )
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="profile-sidebar">
                <h2 class="sidebar-heading"><?php echo Yii::t('account', 'Groups'); ?></h2>
                <div class="action-buttons">
                    <?php foreach (PermissionHelper::getGroups() as $groupId => $groupName): ?>
                        <?php if ($model->belongsToGroup($groupName, ROLE::GROUP_MEMBER)): ?>
                            <?php echo TbHtml::linkButton(
                                $groupName,
                                array(
                                    'icon' => TbHtml::ICON_MINUS,
                                    'class' => 'action-button',
                                    'url' => array(
                                        'removeFromGroup',
                                        'id' => $model->id,
                                        'group' => $groupName,
                                        'role' => ROLE::GROUP_MEMBER,
                                        'returnUrl' => TbHtml::encode(Yii::app()->request->url),
                                    ),
                                )
                            ); ?>
                        <?php else: ?>
                            <?php echo TbHtml::linkButton(
                                $groupName,
                                array(
                                    'icon' => TbHtml::ICON_PLUS,
                                    'class' => 'action-button',
                                    'url' => array(
                                        'addToGroup',
                                        'id' => $model->id,
                                        'group' => $groupName,
                                        'role' => ROLE::GROUP_MEMBER,
                                        'returnUrl' => TbHtml::encode(Yii::app()->request->url),
                                    ),
                                )
                            ); ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <?php /*
                <h2 class="sidebar-heading"><?php echo Yii::t('account', 'Permissions'); ?></h2>
                <?php echo TbHtml::link(Yii::t('account', 'Apply for permission'), '#'); ?>
                */
                ?>
                <h2 class="sidebar-heading"><?php echo Yii::t('account', 'Roles'); ?></h2>
                <?php
                //Account::model()->findByPk(Yii::app()->user->id)->assignDefaultGroupRoles();
                $this->renderPartial(
                    'profile/_permissions',
                    array(
                        'ghas' => $model->groupHasAccounts,
                    )
                ); ?>
                <?php /*
                <h2 class="sidebar-heading"><?php echo Yii::t('account', 'Badges'); ?></h2>
                */
                ?>
                <?php /*
                <h4>Tasks</h4>
                <p>
                    <?php $tasks = array_keys(Yii::app()->authManager->getAuthItems(0, $model->id)); ?>
                    <?php print implode(', ', $tasks); ?>
                </p>
                */
                ?>
                <?php /*
                <h2 class="sidebar-heading"><?php echo Yii::t('account', 'Operations'); ?></h2>
                <p>
                    <?php $operations = array_keys(Yii::app()->authManager->getAuthItems(1, $model->id)); ?>
                    <?php print implode(', ', $operations); ?>
                </p>
                */
                ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
