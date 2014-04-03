<?php
/** @var Controller|ItemController $this */
/** @var ItemTrait|ActiveRecord|QaStateBehavior $model */
?>
<div class="action-buttons">
    <div class="btn-group">
        <?php /*
        <?php if (!$model->qaState()->draft_saved): ?>
            <?php $this->widget(
                '\TbButton',
                array(
                    'label' => Yii::t('crud', 'Prepare to save'),
                    'color' => $this->action->id == 'draft' ? 'inverse' : null,
                    'icon' => 'glyphicon-pencil' . ($this->action->id == 'draft' ? ' icon-white' : null),
                    'url' => array(
                        'draft',
                        'id' => $model->{$model->tableSchema->primaryKey},
                        'step' => $this->firstFlowStep($model),
                    )
                )
            ); ?>
        <?php endif; ?>
        */ ?>
        <?php if (!$model->qaState()->allow_review): ?>
            <?php $this->widget(
                '\TbButton',
                array(
                    'label' => Yii::t('crud', 'Prepare for review'),
                    'color' => $this->action->id === 'prepareForReview' ? 'inverse' : null,
                    'icon' => 'glyphicon-pencil' . ($this->action->id == '' ? ' icon-white' : null),
                    'url' => array(
                        'prepareForReview',
                        'id' => $model->{$model->tableSchema->primaryKey},
                        'step' => $this->firstFlowStep($model),
                    ),
                    'visible' => $model->checkAccess('PrepareForReview'),
                )
            ); ?>
        <?php else: ?>
            <?php // TODO: Action to prevent review. ?>
        <?php endif; ?>
        <?php if (!$model->qaState()->allow_publish): ?>
            <?php $this->widget(
                '\TbButton',
                array(
                    'label' => Yii::t('crud', 'Prepare for publishing'),
                    'color' => $this->action->id === 'prepareForPublishing' ? 'inverse' : null,
                    'icon' => 'glyphicon-pencil' . ($this->action->id === 'prepareForPublishing' ? ' icon-white' : null),
                    'url' => array(
                        'prepareForPublishing',
                        'id' => $model->{$model->tableSchema->primaryKey},
                        'step' => $this->firstFlowStep($model),
                    ),
                    'visible' => $model->checkAccess('PrepareForPublishing'),
                )
            ); ?>
        <?php else: ?>
            <?php // TODO: Action to prevent publishing. ?>
        <?php endif; ?>
    </div>
    <div class="btn-group">
        <?php foreach (Yii::app()->user->getGroups() as $groupId => $groupName): ?>
            <?php if ($model->belongsToGroup($groupId)): ?>
                <?php echo TbHtml::linkButton(
                    Yii::t('app', 'Remove from {group}', array('{group}' => $groupName)),
                    array(
                        'icon' => TbHtml::ICON_MINUS,
                        'url' => array(
                            'removeFromGroup',
                            'node_id' => $model->node_id,
                            'group' => $groupId,
                            'returnUrl' => TbHtml::encode(Yii::app()->request->url),
                        ),
                    )
                ); ?>
            <?php else: ?>
                <?php echo TbHtml::linkButton(
                    Yii::t('app', 'Add to {group}', array('{group}' => $groupName)),
                    array(
                        'icon' => TbHtml::ICON_PLUS,
                        'url' => array(
                            'addToGroup',
                            'node_id' => $model->node_id,
                            'group' => $groupId,
                            'returnUrl' => TbHtml::encode(Yii::app()->request->url),
                        ),
                    )
                ); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="btn-group">
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('crud', 'Evaluate'),
                'color' => $this->action->id === 'evaluate' ? 'inverse' : null,
                'icon' => 'glyphicon-comment' . ($this->action->id === 'evaluate' ? ' icon-white' : null),
                'url' => array(
                    'evaluate',
                    'id' => $model->{$model->tableSchema->primaryKey},
                    'step' => $this->firstFlowStep($model),
                ),
                'visible' => $model->checkAccess('Evaluate'),
            )
        ); ?>
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('model', 'Review'),
                'color' => $this->action->id === 'review' ? 'inverse' : null,
                'icon' => 'glyphicon-check' . ($this->action->id === 'review' ? ' icon-white' : null),
                'url' => array(
                    'review',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
                'visible' => $model->checkAccess('Review'),
            )
        ); ?>
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('model', 'Proofread'),
                'color' => $this->action->id === 'proofRead' ? 'inverse' : null,
                'icon' => 'glyphicon-certificate' . ($this->action->id === 'proofRead' ? ' icon-white' : null),
                'url' => array(
                    'proofRead',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
                'visible' => $model->checkAccess('Proofread'),
            )
        ); ?>
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('model', 'Translate'),
                'color' => $this->action->id === 'translationOverview' ? 'inverse' : null,
                'icon' => 'glyphicon-globe' . ($this->action->id === 'translationOverview' ? ' icon-white' : null),
                'url' => array(
                    'translationOverview',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
                'visible' => $model->checkAccess('Translate'),
            )
        ); ?>
    </div>
    <div class="btn-group">
        <?php if (PermissionHelper::groupHasAccount(array(
                'account_id' => Yii::app()->user->id,
                'group_id' => PermissionHelper::groupNameToId('GapminderInternal'),
                'role_id' => PermissionHelper::roleNameToId('Group Publisher'),
        ))): ?>
            <?php if ($model->isUnpublishable()): ?>
                <?php $this->widget(
                    '\TbButton',
                    array(
                        'label' => Yii::t('model', 'Unpublish'),
                        'icon' => TbHtml::ICON_THUMBS_DOWN,
                        'url' => array(
                            'unpublish',
                            'id' => $model->{$model->tableSchema->primaryKey},
                        ),
                        'visible' => $model->checkAccess('Publish'),
                    )
                ); ?>
            <?php elseif ($model->isPublishable()): ?>
                <?php $this->widget(
                    '\TbButton',
                    array(
                        'label' => Yii::t('model', 'Publish'),
                        'icon' => TbHtml::ICON_THUMBS_UP,
                        'url' => array(
                            'publish',
                            'id' => $model->{$model->tableSchema->primaryKey},
                        ),
                        'visible' => $model->checkAccess('Publish'),
                    )
                ); ?>
            <?php else: ?>
                <?php echo TbHtml::linkButton(
                    Yii::t('model', 'Publish'),
                    array(
                        'disabled' => true,
                        'icon' => TbHtml::ICON_THUMBS_UP,
                        'visible' => $model->checkAccess('Publish'),
                    )
                ); ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="btn-group">
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('model', 'Clone'),
                'color' => $this->action->id === 'clone' ? 'inverse' : null,
                'icon' => 'glyphicon-plus' . ($this->action->id === 'clone' ? ' icon-white' : null),
                'url' => array(
                    'clone',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
                'visible' => $model->checkAccess('Clone'),
            )
        ); ?>
        <?php $this->widget(
            '\TbButton', array(
                'label' => Yii::t('model', 'Remove'),
                'color' => $this->action->id === 'remove' ? 'inverse' : null,
                'icon' => 'glyphicon-eye-close' . ($this->action->id === 'remove' ? ' icon-white' : null),
                'url' => array(
                    'remove',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
                'visible' => $model->checkAccess('Remove'),
            )
        ); ?>
    </div>
</div>
