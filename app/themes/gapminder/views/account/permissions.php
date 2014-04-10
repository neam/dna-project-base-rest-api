<?php
/* @var AccountController $this */
/* @var Account $model */
/* @var array $groups */
/* @var array $groupColumnMap */
/* @var CActiveDataProvider $dataProvider */
?>
<?php $this->setPageTitle(
    Yii::t('model', 'Accounts')
    . ' - '
    . Yii::t('crud', 'Manage')
); ?>
<?php $this->breadcrumbs[] = Yii::t('model', 'Accounts'); ?>

<div class="account-controller admin-action">
    <h1>
        <?php echo Yii::t('model', 'Permissions'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>
    </h1>
    <?php $this->renderPartial('_toolbar'); ?>
    <?php foreach ($groups as $groupName => $groupLabel): ?>
        <?php if (isset($groupColumnMap[$groupName])): ?>
            <h2><?php echo $groupLabel; ?></h2>
            <?php Yii::beginProfile('Account.view.grid'); ?>
            <?php $this->widget(
                'TbGridView',
                array(
                    'id' => 'account-grid_' . $groupName,
                    'dataProvider' => $dataProvider,
                    //'responsiveTable' => true,
                    'template' => '{pager}{items}{pager}',
                    'pager' => array(
                        'class' => '\TbPager',
                        'hideFirstAndLast' => false,
                    ),
                    'columns' => $groupColumnMap[$groupName],
                )
            ); ?>
            <?php Yii::endProfile('Account.view.grid'); ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>