<?php
$this->setPageTitle(
    Yii::t('model', 'Accounts')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Accounts');
Yii::app()->clientScript->registerScript('search', "
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
    ");
?>


<h1>

    <?php echo Yii::t('model', 'Accounts'); ?>
    <small><?php echo Yii::t('crud', 'Manage'); ?></small>

</h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('Account.view.grid'); ?>

<?php
$roleColumns = array(
    // todo: fix toggle column
    /*
    array(
        'class' => 'TbToggleColumn',
        'displayText' => false,
        'name' => 'Developer',
        'value' => function ($data) {
                return Yii::app()->authManager->checkAccess('Developer', $data->id);
            },
        'filter' => true,
        'toggleAction' => 'account/toggleRole',
    ),
    array(
        'class' => 'TbToggleColumn',
        'displayText' => false,
        'name' => 'Super Administrator',
        'value' => function ($data) {
                return Yii::app()->authManager->checkAccess('Super Administrator', $data->id);
            },
        'filter' => true,
        'toggleAction' => 'account/toggleRole',
    ),
    array(
        'class' => 'TbToggleColumn',
        'displayText' => false,
        'name' => 'Administrator',
        'value' => function ($data) {
                return Yii::app()->authManager->checkAccess('Administrator', $data->id);
            },
        'filter' => true,
        'toggleAction' => 'account/toggleRole',
    ),
    array(
        'class' => 'TbToggleColumn',
        'displayText' => false,
        'name' => 'Publisher',
        'value' => function ($data) {
                return Yii::app()->authManager->checkAccess('Publisher', $data->id);
            },
        'filter' => false,
        'toggleAction' => 'account/toggleRole',
    ),
    array(
        'class' => 'TbToggleColumn',
        'displayText' => false,
        'name' => 'Creator',
        'value' => function ($data) {
                return Yii::app()->authManager->checkAccess('Creator', $data->id);
            },
        'filter' => false,
        'toggleAction' => 'account/toggleRole',
    ),
    array(
        'class' => 'TbToggleColumn',
        'displayText' => false,
        'name' => 'Evaluator',
        'value' => function ($data) {
                return Yii::app()->authManager->checkAccess('Evaluator', $data->id);
            },
        'filter' => false,
        'toggleAction' => 'account/toggleRole',
    ),
    array(
        'class' => 'TbToggleColumn',
        'displayText' => false,
        'name' => 'Approver',
        'value' => function ($data) {
                return Yii::app()->authManager->checkAccess('Approver', $data->id);
            },
        'filter' => false,
        'toggleAction' => 'account/toggleRole',
    ),
    array(
        'class' => 'TbToggleColumn',
        'displayText' => false,
        'name' => 'Proofreader',
        'value' => function ($data) {
                return Yii::app()->authManager->checkAccess('Proofreader', $data->id);
            },
        'filter' => false,
        'toggleAction' => 'account/toggleRole',
    ),
    array(
        'class' => 'TbToggleColumn',
        'displayText' => false,
        'name' => 'Translator',
        'value' => function ($data) {
                return Yii::app()->authManager->checkAccess('Translator', $data->id);
            },
        'filter' => false,
        'toggleAction' => 'account/toggleRole',
    ),
    */
);

$columns = array_merge(array(
    /*
    array(
        'class' => 'CLinkColumn',
        'header' => '',
        'labelExpression' => '$data->itemLabel',
        'urlExpression' => 'Yii::app()->controller->createUrl("view", array("id" => $data["id"]))'
    ),
    array(
        'class' => 'TbEditableColumn',
        'name' => 'id',
        'editable' => array(
            'url' => $this->createUrl('/account/editableSaver'),
            //'placement' => 'right',
        )
    ),
    */
    // todo: fix editable column
    /*
    array(
        'class' => 'TbEditableColumn',
        'name' => 'username',
        'editable' => array(
            'url' => $this->createUrl('/account/editableSaver'),
            //'placement' => 'right',
        )
    ),
    */
    /*array(
        'class' => 'TbEditableColumn',
        'name' => 'password',
        'editable' => array(
            'url' => $this->createUrl('/account/editableSaver'),
            //'placement' => 'right',
        )
    ),*/
    // todo: fix editable column
    /*
    array(
        'class' => 'TbEditableColumn',
        'name' => 'email',
        'editable' => array(
            'url' => $this->createUrl('/account/editableSaver'),
            //'placement' => 'right',
        )
    ),
    */
    /*array(
        'class' => 'TbEditableColumn',
        'name' => 'activkey',
        'editable' => array(
            'url' => $this->createUrl('/account/editableSaver'),
            //'placement' => 'right',
        )
    ),*/
    /*
    array(
        'class' => 'TbEditableColumn',
        'name' => 'superuser',
        'editable' => array(
            'url' => $this->createUrl('/account/editableSaver'),
            //'placement' => 'right',
        )
    ),
    */
    // todo: fix editable column
    /*
    array(
        'class' => 'TbEditableColumn',
        'name' => 'status',
        'editable' => array(
            'url' => $this->createUrl('/account/editableSaver'),
            //'placement' => 'right',
        )
    )
    */
), $roleColumns, array(
    // todo: fix editable column
    /*
    array(
        'class' => 'TbEditableColumn',
        'name' => 'create_at',
        'editable' => array(
            'url' => $this->createUrl('/account/editableSaver'),
            //'placement' => 'right',
        )
    ),
    */
    /*
    array(
        'class' => 'TbEditableColumn',
        'name' => 'lastvisit_at',
        'editable' => array(
            'url' => $this->createUrl('/account/editableSaver'),
            //'placement' => 'right',
        )
    ),
    */

    array(
        'class' => '\TbButtonColumn',
        'buttons' => array(
            'view' => array('visible' => 'Yii::app()->user->checkAccess("Account.View")'),
            'update' => array('visible' => 'Yii::app()->user->checkAccess("Account.Update")'),
            'delete' => array('visible' => 'Yii::app()->user->checkAccess("Account.Delete")'),
        ),
        'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
        'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
        'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
    ),
));
?>

<?php
$this->widget('\TbGridView',
    array(
        'id' => 'account-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => '\TbPager',
            'hideFirstAndLast' => false,
        ),
        'columns' => $columns,
    )
);
?>

<?php Yii::endProfile('Account.view.grid'); ?>
