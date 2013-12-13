<?php
$this->setPageTitle(
    Yii::t('model', 'Profiles')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Profiles');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'profiles-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>


    <h1>

        <?php echo Yii::t('model', 'Profiles'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('Profiles.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'profiles-grid',
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
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("user_id" => $data["user_id"]))'
            ),
            array(
                'name' => 'user_id',
                'value' => 'CHtml::value($data, \'user.itemLabel\')',
                'filter' => '', //CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'first_name',
                'editable' => array(
                    'url' => $this->createUrl('/profiles/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'last_name',
                'editable' => array(
                    'url' => $this->createUrl('/profiles/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'public_profile',
                'editable' => array(
                    'url' => $this->createUrl('/profiles/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'picture_media_id',
                'value' => 'CHtml::value($data, \'pictureMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'website',
                'editable' => array(
                    'url' => $this->createUrl('/profiles/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'others_may_contact_me',
                'editable' => array(
                    'url' => $this->createUrl('/profiles/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'about',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'lives_in',
                'editable' => array(
                    'url' => $this->createUrl('/profiles/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Profiles.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Profiles.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Profiles.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("user_id" => $data->user_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("user_id" => $data->user_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("user_id" => $data->user_id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('Profiles.view.grid'); ?>