<?php
$this->setPageTitle(
    Yii::t('model', 'Html Chunks')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Html Chunks');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'html-chunk-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Html Chunks'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'html-chunk-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'responsiveTable' => true,
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
                    'url' => $this->createUrl('/htmlChunk/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/htmlChunk/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'htmlChunks.itemLabel\')',
                'filter' => CHtml::listData(HtmlChunk::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'markup_en',
            array(
                'name' => 'authoring_workflow_execution_id_en',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdEn.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/htmlChunk/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/htmlChunk/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'markup_es',
            #'markup_fa',
            #'markup_hi',
            #'markup_pt',
            #'markup_sv',
            #'markup_cn',
            #'markup_de',
            array(
                'name' => 'authoring_workflow_execution_id_es',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdEs.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            /*
            array(
                'name' => 'authoring_workflow_execution_id_fa',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdFa.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_hi',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdHi.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_pt',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdPt.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_sv',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdSv.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_cn',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdCn.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_de',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdDe.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("HtmlChunk.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("HtmlChunk.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("HtmlChunk.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>