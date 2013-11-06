<?php
$this->setPageTitle(
    Yii::t('model', 'PoFiles')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'PoFiles');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'pofile-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'PoFiles'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('PoFile.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'pofile-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'CLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("id" => $data["id"]))'
            ),
            array(
                'class' => 'TbButtonColumn',
                'header' => 'Workflows',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Item.Preview")', 'options' => array('title' => Yii::t('app', 'Preview'))),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Item.Edit")', 'options' => array('title' => Yii::t('app', 'Edit'))),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Item.Remove")', 'options' => array('title' => Yii::t('app', 'Remove'))),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("preview", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("continueAuthoring", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("remove", array("id" => $data->id))',
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/pofile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/pofile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'pofiles.itemLabel\')',
                'filter' => '', //CHtml::listData(PoFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title',
                'editable' => array(
                    'url' => $this->createUrl('/pofile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/pofile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/pofile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("PoFile.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("PoFile.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("PoFile.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('PoFile.view.grid'); ?>