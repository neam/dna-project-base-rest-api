<?php
/** @var Account $model */
?>
<div class="flowbar">
    <div class="flowbar-head">
        <div class="head-title">
            <h1 class="profile-heading">
                <?php echo $model->profile->fullName; ?>
                <small><?php echo Yii::t('account', 'Profile') ?> <!--#<?php echo $model->id ?>--></small>
            </h1>
        </div>
        <div class="head-actions">
            <?php echo TbHtml::linkButton(
                Yii::t('app', 'Show Public Page'),
                array(
                    'url' => array('/account/publicProfile', 'id' => $model->{$model->tableSchema->primaryKey}),
                    'color' => TbHtml::BUTTON_COLOR_LINK,
                    'target' => '_blank',
                )
            ); ?>
        </div>
    </div>
    <div class="flowbar-content">
        <div class="content-toolbar">
            <?php $this->renderPartial('_toolbar', array('model' => $model)); ?>
        </div>
        <div class="content-actions">
            <?php $this->widget('\TbButton', array(
                'color' => TbHtml::BUTTON_COLOR_LINK,
                'label' => Yii::t('model', 'Undo'),
                'url' => Yii::app()->request->url,
                'htmlOptions' => array(
                    'class' => 'btn-dirtyforms ignoredirty',
                ),
            )); ?>
            <?php echo CHtml::submitButton(Yii::t('model', 'Save'), array(
                'class' => 'btn btn-primary btn-dirtyforms',
            )); ?>
        </div>
    </div>
</div>
