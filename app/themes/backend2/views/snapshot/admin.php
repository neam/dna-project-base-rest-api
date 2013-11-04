<?php
$this->setPageTitle(
    Yii::t('model', 'Snapshots')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Snapshots');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'snapshot-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Snapshots'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('Snapshot.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'snapshot-grid',
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
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'snapshots.itemLabel\')',
                'filter' => '', //CHtml::listData(Snapshot::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'about_en',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'link',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'embed_override',
            array(
                'name' => 'tool_id',
                'value' => 'CHtml::value($data, \'tool.itemLabel\')',
                'filter' => '', //CHtml::listData(Tool::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_es',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_fa',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_hi',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_pt',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_sv',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_cn',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_de',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_es',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_fa',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_hi',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_pt',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_sv',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_cn',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_de',
                'editable' => array(
                    'url' => $this->createUrl('/snapshot/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'about_es',
            #'about_fa',
            #'about_hi',
            #'about_pt',
            #'about_sv',
            #'about_cn',
            #'about_de',
            array(
                'name' => 'snapshot_qa_state_id_en',
                'value' => 'CHtml::value($data, \'snapshotQaStateIdEn.itemLabel\')',
                'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'snapshot_qa_state_id_es',
                'value' => 'CHtml::value($data, \'snapshotQaStateIdEs.itemLabel\')',
                'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'snapshot_qa_state_id_fa',
                'value' => 'CHtml::value($data, \'snapshotQaStateIdFa.itemLabel\')',
                'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'snapshot_qa_state_id_hi',
                'value' => 'CHtml::value($data, \'snapshotQaStateIdHi.itemLabel\')',
                'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'snapshot_qa_state_id_pt',
                'value' => 'CHtml::value($data, \'snapshotQaStateIdPt.itemLabel\')',
                'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'snapshot_qa_state_id_sv',
                'value' => 'CHtml::value($data, \'snapshotQaStateIdSv.itemLabel\')',
                'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'snapshot_qa_state_id_cn',
                'value' => 'CHtml::value($data, \'snapshotQaStateIdCn.itemLabel\')',
                'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'snapshot_qa_state_id_de',
                'value' => 'CHtml::value($data, \'snapshotQaStateIdDe.itemLabel\')',
                'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Snapshot.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Snapshot.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Snapshot.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('Snapshot.view.grid'); ?>