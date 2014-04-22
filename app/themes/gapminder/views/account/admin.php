<?php
/* @var AccountController $this */
/* @var Account $model */
/* @var CActiveDataProvider $dataProvider */

$this->setPageTitle(
    Yii::t('model', 'Accounts')
    . ' - '
    . Yii::t('model', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Accounts');
?>
<div class="account-controller admin-action">
    <h1>
        <?php echo Yii::t('model', 'Accounts'); ?>
        <small><?php echo Yii::t('model', 'Manage'); ?></small>
    </h1>

    <?php $this->widget(
        'TbGridView',
        array(
            'id' => 'account-grid',
            'dataProvider' => $dataProvider,
            'template' => '{pager}{items}{pager}',
            'pager' => array(
                'class' => '\TbPager',
                'hideFirstAndLast' => false,
            ),
            'columns' => array(
                array(
                    'class' => 'CLinkColumn',
                    'header' => '',
                    'labelExpression' => '$data->itemLabel',
                    'urlExpression' => 'Yii::app()->controller->createUrl("view", array("id" => $data["id"]))',
                ),
                array(
                    'class' => '\TbButtonColumn',
                    'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                    'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                    'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
                ),
            ),
        )
    ); ?>
</div>