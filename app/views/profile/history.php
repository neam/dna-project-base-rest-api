<h1><?php echo Yii::t('history', 'History'); ?></h1>
<?php /*
<?php $this->renderPartial('_toolbar', array('model' => $model)); ?>
*/ ?>
<div class="tasks-container">
    <div class="row">
        <div class="tasks">
            <div class="tasks-list">
                <?php $this->widget(
                    'yiistrap.widgets.TbListView',
                    array(
                        'dataProvider' => $dataProvider,
                        'itemView' => '_history-item',
                        'template' => '{items} {pager}',
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>
<div class="text-right">
    <?php echo TbHtml::linkButton(
        Yii::t('app', 'Back'),
        array(
            'size' => TbHtml::BUTTON_SIZE_SM,
            'url' => array('/profile/edit'),
        )
    ); ?>
</div>
<?php /*
<h2><?php echo Yii::t('history', 'Sign-up'); ?></h2>
<b><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?>:</b>
<?php echo CHtml::encode($model->create_at); ?>
<h2><?php echo Yii::t('history', 'Last visit'); ?></h2>
<b><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?>:</b>
<?php echo CHtml::encode($model->lastvisit_at); ?>
*/ ?>
