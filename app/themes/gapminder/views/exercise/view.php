<?php
/* @var Exercise|ItemTrait $model */
/* @var ExerciseController|ItemController $this */
?>
<?php $this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('browse'); ?>
<?php $this->renderPartial('/_item/elements/flowbar', compact('model')); ?>
<div class="<?php echo $this->getCssClasses($model); ?>">

    <?php if (Yii::app()->user->checkAccess('Exercise.*')): ?>
        <div class="admin-container hide">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <?php $this->widget(
                        '\TbButton',
                        array(
                            'label' => Yii::t('model', 'Manage'),
                            'icon' => TbHtml::ICON_EDIT,
                            'url' => array('admin')
                        )
                    ); ?>
                    <?php $this->widget(
                        '\TbButton',
                        array(
                            'label' => Yii::t('model', 'Edit'),
                            'icon' => TbHtml::ICON_EDIT,
                            'url' => array('continueAuthoring', 'id' => $model->{$model->tableSchema->primaryKey})
                        )
                    ); ?>
                    <?php $this->widget(
                        '\TbButton',
                        array(
                            'label' => Yii::t('model', 'Update'),
                            'icon' => TbHtml::ICON_EDIT,
                            'url' => array('update', 'id' => $model->{$model->tableSchema->primaryKey})
                        )
                    ); ?>
                    <?php $this->widget(
                        '\TbButton',
                        array(
                            'label' => Yii::t('model', 'Delete'),
                            'type' => 'danger',
                            'icon' => 'glyphicon-remove icon-white',
                            'htmlOptions' => array(
                                'submit' => array(
                                    'delete',
                                    'id' => $model->{$model->tableSchema->primaryKey},
                                    'returnUrl' => Yii::app()->request->getParam('returnUrl')
                                            ? Yii::app()->request->getParam('returnUrl')
                                            : $this->createUrl('admin')),
                                'confirm' => Yii::t('model', 'Do you want to delete this item?')
                            ),
                        )
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="after-flowbar">
        <?php $this->renderPartial('_view', array('data' => $model)); ?>
    </div>
</div>
