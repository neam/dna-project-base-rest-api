<?php
//$this->breadcrumbs[] = Yii::t('model', 'Users');
//$this->breadcrumbs[$model->username] = array('account/profile', 'id' => $model->id);
$this->breadcrumbs[] = Yii::t('account', 'Dashboard');
?>
<h1>

    <?php echo $model->profiles->first_name . " " . $model->profiles->last_name; ?>
    <small>
        <?php echo Yii::t('account', 'Dashboard') ?> <!--#<?php echo $model->id ?>-->
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php if (!Yii::app()->user->checkAccess('Item.Translate') && !Yii::app()->user->checkAccess('Item.Edit') && !Yii::app()->user->checkAccess('Item.Add')): ?>

    <div class="alert alert-error">
        <?php echo Yii::t('account', 'You do not have permissions assigned.'); ?>
        <?php echo Yii::t('account', 'Without any permissions, we can not propose a suitable task for you.'); ?>
        <?php echo Yii::t('account', 'Only administrators can assign permissions.'); ?>
        <?php //echo Yii::t('account', 'Please apply for a permission.'); ?>
    </div>

<?php endif; ?>

<?php if (Yii::app()->user->checkAccess('Item.Add')): ?>

    <h2><?php echo Yii::t('dashboard', 'Add contents'); ?></h2>
    <?php foreach (DataModel::qaModels() as $modelClass => $table): ?>

        <?php if ($table == "exam_question_alternative") {
            continue;
        } ?>

        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Create $modelClass"),
            "size" => "large",
            "icon" => "icon-plus",
            "url" => array(lcfirst($modelClass) . "/add")
        ));
        ?>

    <?php endforeach; ?>

<?php endif; ?>

<?php if (Yii::app()->user->checkAccess('Item.Translate')): ?>

    <h2><?php echo Yii::t('dashboard', 'Translate contents'); ?></h2>

    <div class="alert alert-error">
        Translation tasks TODO list here
    </div>

<?php endif; ?>

