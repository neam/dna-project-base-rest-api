<?php
$this->setPageTitle(
    Yii::t('model', 'Po Files')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Po Files');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'po-file-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Po Files'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('PoFile.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'po-file-grid',
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
                'class' => 'TbEditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/poFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/poFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'poFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(PoFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title',
                'editable' => array(
                    'url' => $this->createUrl('/poFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'about',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_en',
                'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/poFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/poFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'name' => 'owner_id',
                'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                'filter' => '',//CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_es',
                'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_fa',
                'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_hi',
                'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_pt',
                'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_sv',
                'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_cn',
                'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_de',
                'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'po_file_qa_state_id_en',
                'value' => 'CHtml::value($data, \'poFileQaStateIdEn.itemLabel\')',
                'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'po_file_qa_state_id_es',
                'value' => 'CHtml::value($data, \'poFileQaStateIdEs.itemLabel\')',
                'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'po_file_qa_state_id_fa',
                'value' => 'CHtml::value($data, \'poFileQaStateIdFa.itemLabel\')',
                'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'po_file_qa_state_id_hi',
                'value' => 'CHtml::value($data, \'poFileQaStateIdHi.itemLabel\')',
                'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'po_file_qa_state_id_pt',
                'value' => 'CHtml::value($data, \'poFileQaStateIdPt.itemLabel\')',
                'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'po_file_qa_state_id_sv',
                'value' => 'CHtml::value($data, \'poFileQaStateIdSv.itemLabel\')',
                'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'po_file_qa_state_id_cn',
                'value' => 'CHtml::value($data, \'poFileQaStateIdCn.itemLabel\')',
                'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'po_file_qa_state_id_de',
                'value' => 'CHtml::value($data, \'poFileQaStateIdDe.itemLabel\')',
                'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            */

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