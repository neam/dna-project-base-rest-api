<?php
/** @var SiteController|ItemController $this */
/** @var ActiveRecord|ItemTrait $model */
?>
<?php
// todo: move to controller.
$model = new $modelClass();
// todo: move url generation to model (e.g. $model->url)
?>
<div class="item-type-introduction">
    <div class="intro-head">
        <h3 class="intro-title"><?php print Yii::t('model', $model->modelLabel, 2); ?></h3>
        <?php if (Yii::app()->user->checkAccess('Browse')): ?>
            <div class="intro-actions">
                <?php echo TbHtml::linkButton(
                    Yii::t('model', 'Browse'),
                    array(
                        'class' => 'action-button',
                        'url' => array(lcfirst($modelClass) . '/browse'),
                    )
                ); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="intro-description">
        <?php echo CHtml::encode($model->itemDescription); ?>
    </div>
</div>
