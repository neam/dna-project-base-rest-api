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
                    'url' => array(
                        'prepareForReview',
                        'id' => $model->{$model->tableSchema->primaryKey},
                        'step' => $this->firstFlowStep($model),
                    ),
                    'visible' => Yii::app()->user->checkModelOperationAccess($model, 'PrepareForReview'),
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
                    'url' => array(
                        'prepareForPublishing',
                        'id' => $model->{$model->tableSchema->primaryKey},
                        'step' => $this->firstFlowStep($model),
                    ),
                    'visible' => Yii::app()->user->checkModelOperationAccess($model, 'PrepareForPublishing'),
                )
            ); ?>
        <?php else: ?>
            <?php // TODO: Action to prevent publishing. ?>
        <?php endif; ?>
    </div>
    <div class="btn-group">
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('crud', 'Evaluate'),
                'color' => $this->action->id === 'evaluate' ? 'inverse' : null,
                'url' => array(
                    'evaluate',
                    'id' => $model->{$model->tableSchema->primaryKey},
                    'step' => $this->firstFlowStep($model),
                ),
                'visible' => Yii::app()->user->checkModelOperationAccess($model, 'Evaluate'),
            )
        ); ?>
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('model', 'Review'),
                'color' => $this->action->id === 'review' ? 'inverse' : null,
                'url' => array(
                    'review',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
                'visible' => Yii::app()->user->checkModelOperationAccess($model, 'Review'),
            )
        ); ?>
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('model', 'Proofread'),
                'color' => $this->action->id === 'proofRead' ? 'inverse' : null,
                'url' => array(
                    'proofRead',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
                'visible' => Yii::app()->user->checkModelOperationAccess($model, 'Proofread'),
            )
        ); ?>
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('model', 'Translate'),
                'color' => $this->action->id === 'translationOverview' ? 'inverse' : null,
                'url' => array(
                    'translationOverview',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
                'visible' => Yii::app()->user->checkModelOperationAccess($model, 'Translate'),
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
                        'url' => array(
                            'unpublish',
                            'id' => $model->{$model->tableSchema->primaryKey},
                        ),
                        'visible' => Yii::app()->user->checkModelOperationAccess($model, 'Publish'),
                    )
                ); ?>
            <?php elseif ($model->isPublishable()): ?>
                <?php $this->widget(
                    '\TbButton',
                    array(
                        'label' => Yii::t('model', 'Publish'),
                        'url' => array(
                            'publish',
                            'id' => $model->{$model->tableSchema->primaryKey},
                        ),
                        'visible' => Yii::app()->user->checkModelOperationAccess($model, 'Publish'),
                    )
                ); ?>
            <?php else: ?>
                <?php echo TbHtml::linkButton(
                    Yii::t('model', 'Publish'),
                    array(
                        'disabled' => true,
                        'visible' => Yii::app()->user->checkModelOperationAccess($model, 'Publish'),
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
                'url' => array(
                    'clone',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
                'visible' => Yii::app()->user->checkModelOperationAccess($model, 'Clone'),
            )
        ); ?>
        <?php $this->widget(
            '\TbButton', array(
                'label' => Yii::t('model', 'Remove'),
                'color' => $this->action->id === 'remove' ? 'inverse' : null,
                'url' => array(
                    'remove',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
                'visible' => Yii::app()->user->checkModelOperationAccess($model, 'Remove'),
            )
        ); ?>
    </div>
    <div class="btn-group">
        <?php foreach (Yii::app()->user->getGroups() as $groupId => $groupName): ?>
            <?php if ($model->belongsToGroup($groupName)): ?>
                <?php echo TbHtml::linkButton(
                    $groupName,
                    array(
                        'icon' => TbHtml::ICON_MINUS,
                        'url' => array(
                            'removeFromGroup',
                            'nodeId' => $model->node_id,
                            'modelId' => $model->id,
                            'group' => $groupName,
                            'returnUrl' => TbHtml::encode(Yii::app()->request->url),
                        ),
                    )
                ); ?>
            <?php else: ?>
                <?php echo TbHtml::linkButton(
                    $groupName,
                    array(
                        'icon' => TbHtml::ICON_PLUS,
                        'url' => array(
                            'addToGroup',
                            'nodeId' => $model->node_id,
                            'modelId' => $model->id,
                            'group' => $groupName,
                            'returnUrl' => TbHtml::encode(Yii::app()->request->url),
                        ),
                    )
                ); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
