<?php
$this->breadcrumbs[] = Yii::t('model', 'Users');
$this->breadcrumbs[$model->username] = array('account/profile', 'id' => $model->id);
$this->breadcrumbs[] = Yii::t('account', 'Dashboard');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo $model->profiles->first_name . " " . $model->profiles->last_name; ?>
    <small>
        <?php echo Yii::t('account', 'Dashboard') ?> <!--#<?php echo $model->id ?>-->
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$roles = array_keys(Yii::app()->authManager->getAuthItems(2, $model->id));
?>

<h2>
    <?php echo Yii::t('dashboard', 'Quick start'); ?>
</h2>

<?php if (empty($roles)): ?>

    <div class="alert alert-error">
        <?php echo Yii::t('account', 'You do not have any permissions assigned.'); ?>
        <?php echo Yii::t('account', 'Without any permissions, we can not propose a suitable task for you.'); ?>
        <?php echo Yii::t('account', 'Only administrators can assign permissions.'); ?>
        <?php //echo Yii::t('account', 'Please apply for a permission.'); ?>
    </div>

<?php else: ?>

    <?php foreach (DataModel::qaModels() as $modelClass => $table): ?>

        <?php if (Yii::app()->user->checkAccess('Item.Add')): ?>

            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Create $modelClass"),
                "size" => "large",
                "icon" => "icon-plus",
                "url" => array(lcfirst($modelClass) . "/add")
            ));
            ?>

        <?php endif; ?>

    <?php endforeach; ?>

<?php endif; ?>

