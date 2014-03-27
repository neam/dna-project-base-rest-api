<?php /** @var AccountController $this */ ?>
<?php
//$this->breadcrumbs[] = Yii::t('model', 'Users');
//$this->breadcrumbs[$model->username] = array('account/profile', 'id' => $model->id);
$this->breadcrumbs[] = Yii::t('account', 'Dashboard');
?>
<div class="account-controller dashboard-action">
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
</div>

