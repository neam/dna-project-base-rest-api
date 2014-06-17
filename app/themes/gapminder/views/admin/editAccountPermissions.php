<?php
/* @var AccountController $this */
/* @var array $columns */
/* @var CArrayDataProvider $dataProvider */
/* @var Account $model */
?>
<?php
$this->breadcrumbs[Yii::t('app', 'Gapminder Community')] = Yii::app()->homeUrl;
$this->breadcrumbs[Yii::t('model', 'Accounts')] = array('/admin/manageAccounts');
$this->breadcrumbs[] = Yii::t('app', 'Permissions');
?>
<div class="account-controller view-action">
    <h1>
        <?php echo $model->username; ?>
        <small><?php echo Yii::t('model', 'account') ;?></small>
    </h1>

    <h2><?php echo Yii::t('admin', 'Permissions'); ?></h2>

    <?php $this->widget(
        'TbGridView',
        array(
            'id' => 'permissions-grid',
            'dataProvider' => $dataProvider,
            'template' => '{pager}{items}{pager}',
            'pager' => array(
                'class' => '\TbPager',
                'hideFirstAndLast' => false,
            ),
            'columns' => $columns,
        )
    ); ?>
</div>