<?php /** @var Controller|ItemController $this */ ?>
<?php /** @var ActiveRecord|ItemTrait $model */ ?>
<?php $workflowCaption = Yii::t('app', 'Preview'); ?>
<?php $this->setPageTitle(Yii::t('model', $this->modelClass) . ' - ' . $workflowCaption); ?>
<?php $this->renderPartial(
    'view',
    array(
        'preview' => true,
        'model' => $model,
    )
); ?>
