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
    <section class="profile-summary">
        <div class="summary-picture">
            <?php echo $model->profile->renderPicture(); ?>
        </div>
        <div class="summary-info">
            <h1 class="summary-heading"><?php echo $model->username; ?></h1>
            <span class="summary-lead">Title</span>
            <span class="summary-badges">* * *</span>
        </div>
        <div class="summary-role">
            <?php // TODO: Roles. ?>
        </div>
    </section>
    <section class="personal-information">
        <h2 class="profile-section-heading"><?php echo Yii::t('app', 'Personal Information'); ?></h2>
        <div class="profile-row">
            <div class="profile-col-4">
                <?php echo $form->textFieldControlGroup($model->profile, 'first_name', array('maxlength' => 255, 'class' => 'span9')); ?>
                <?php echo $form->textFieldControlGroup($model->profile, 'last_name', array('maxlength' => 255, 'class' => 'span9')); ?>
                <?php echo $form->textFieldControlGroup($model->profile, 'website', array('maxlength' => 255, 'class' => 'span9')); ?>
            </div>
            <div class="profile-col-4">
                <?php echo $form->textFieldControlGroup(
                    $model,
                    'username',
                    array(
                        'class' => 'span9',
                        'maxlength' => 255,
                    )
                ); ?>
                <?php echo $form->textFieldControlGroup($model->profile, 'lives_in', array('maxlength' => 255, 'class' => 'span9')); ?>
                <?php echo $form->textFieldControlGroup($model, 'email', array('maxlength' => 255, 'class' => 'span9')); ?>
            </div>
            <div class="profile-col-4">
                <?php echo $form->textAreaControlGroup(
                    $model->profile,
                    'about',
                    array(
                        'ControlGroups' => 6,
                        'cols' => 50,
                        'class' => 'profile-about-field',
                    )
                ); ?>
            </div>
        </div>
        <div class="profile-row">
            <div class="profile-col-4">
                <?php echo $form->select2ControlGroup(
                    $model->profile,
                    'picture_media_id',
                    $model->profile->getPictureOptions(),
                    array(
                        'empty' => Yii::t('app', 'None'),
                    )
                ); ?>
            </div>
            <div class="profile-col-4">
                <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
                <div>
                    <?php echo TbHtml::button(
                        Yii::t('app', 'Upload new'),
                        array(
                            'block' => true,
                            'class' => 'upload-btn',
                            'data-toggle' => 'modal',
                            'data-target' => '#' . $form->id . '-modal',
                        )
                    ); ?>
                </div>
            </div>
        </div>
        <?php $this->renderPartial(
            '//p3Media/_modal_form',
            array(
                'formId' => $form->id,
                'inputSelector' => "#Profile_picture_media_id",
                'model' => new P3Media(),
                'pk' => 'id',
                'field' => 'itemLabel',
            )
        ); ?>
        <div class="profile-row">
            <div class="profile-col-12">
                <?php echo $form->checkBoxControlGroup($model->profile, 'others_may_contact_me'); ?>
            </div>
            <div class="profile-col-12">
                <?php /*
                <?php echo TbHtml::linkButton(
                    Yii::t('account', 'Change password'),
                    array(
                        'color' => TbHtml::BUTTON_COLOR_LINK,
                        'size' => TbHtml::BUTTON_SIZE_SM,
                        'url' => array('user/profile/changepassword', 'returnUrl' => Yii::app()->request->url),
                    )
                ); ?>
                */ ?>
            </div>
        </div>
    </section>
    <section class="profile-languages">
        <div class="profile-row">
            <div class="profile-col-12">
                <h2 class="profile-section-heading"><?php echo Yii::t('app', 'Languages'); ?></h2>
            </div>
            <div class="profile-col-4">
                <?php echo $form->select2ControlGroup($model->profile, 'language1', Html::getLanguages()); ?>
            </div>
            <div class="profile-col-4">
                <?php echo $form->select2ControlGroup($model->profile, 'language2', Html::getLanguages()); ?>
            </div>
            <div class="profile-col-4">
                <?php echo $form->select2ControlGroup($model->profile, 'language3', Html::getLanguages()); ?>
            </div>
        </div>
    </section>
    <section class="account-history">
        <h2 class="profile-section-heading"><?php echo Yii::t('app', 'History'); ?></h2>
        <?php echo TbHtml::linkButton(
            Yii::t('app', 'View History'),
            array(
                'url' => array('/account/history'),
            )
        ); ?>
    </section>
    <section class="profile-actions">
        <?php echo TbHtml::linkButton(
            Yii::t('app', 'Cancel'),
            array(
                'url' => !empty(Yii::app()->request->returnUrl)
                        ? Yii::app()->request->returnUrl
                        : array('/account/dashboard'),
                'color' => TbHtml::BUTTON_COLOR_LINK,
            )
        ); ?>
        <?php echo TbHtml::submitButton(
            Yii::t('model', 'Save'),
            array(
                'class' => 'btn btn-primary',
            )
        ); ?>
    </section>
    <?php /*
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
                ?>
                <h2 class="sidebar-heading"><?php echo Yii::t('account', 'Roles'); ?></h2>
                <?php
                //Account::model()->findByPk(Yii::app()->user->id)->assignDefaultGroupRoles();
                $this->renderPartial(
                    'profile/_roles',
                    array(
                        'model' => $model,
                        'ghas' => $model->groupHasAccounts,
                    )
                ); ?>
            </div>
        </div>
        */ ?>
    <?php $this->endWidget(); ?>
</div>
