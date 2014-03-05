<?php
$this->setPageTitle(
    Yii::t('model', 'Comments')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Comments');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'comment-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Comments'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('Comment.view.grid'); ?>


<?php
$this->widget('\TbGridView',
    array(
        'id' => 'comment-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => '\TbPager',
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
                'class' => 'TbEditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/comment/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'author_user_id',
                'value' => 'CHtml::value($data, \'authorUser.itemLabel\')',
                'filter' => '', //CHtml::listData(Account::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'parent_id',
                'value' => 'CHtml::value($data, \'comments.itemLabel\')',
                'filter' => '', //CHtml::listData(Comment::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'_comment',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'context_model',
                'editable' => array(
                    'url' => $this->createUrl('/comment/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'context_id',
                'editable' => array(
                    'url' => $this->createUrl('/comment/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'context_attribute',
                'editable' => array(
                    'url' => $this->createUrl('/comment/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'context_translate_into',
                'editable' => array(
                    'url' => $this->createUrl('/comment/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/comment/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/comment/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            */

            array(
                'class' => '\TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("17a79fbd.Comment.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("17a79fbd.Comment.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("17a79fbd.Comment.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('Comment.view.grid'); ?>