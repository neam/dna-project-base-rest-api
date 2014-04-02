<?php
/* @var AccountController $this */
/* @var Account $model */
/* @var array $groups */
/* @var array $groupColumnMap */
?>
<?php $this->setPageTitle(
    Yii::t('model', 'Accounts')
    . ' - '
    . Yii::t('crud', 'Manage')
); ?>
<?php $this->breadcrumbs[] = Yii::t('model', 'Accounts'); ?>

<?php // TODO: Remove inline JavaScript. ?>
<?php Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'account-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
"); ?>

<div class="account-controller admin-action">
    <h1>
        <?php echo Yii::t('model', 'Permissions'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>
    </h1>
    <?php $this->renderPartial('_toolbar', array('model' => $model)); ?>
    <?php foreach ($groups as $groupName => $groupLabel): ?>
        <h2><?php echo $groupLabel; ?></h2>
        <?php Yii::beginProfile('Account.view.grid'); ?>
        <?php $this->widget(
            'TbGridView',
            array(
                'id' => 'account-grid_' . $groupName,
                'dataProvider' => $model->search(),
                'filter' => $model,
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
    <?php endforeach; ?>
</div>