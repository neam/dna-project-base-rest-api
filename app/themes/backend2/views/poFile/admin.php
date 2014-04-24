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

<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
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
                'name' => 'processed_media_id_de',
                'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'po_file_qa_state_id',
                'value' => 'CHtml::value($data, \'poFileQaState.itemLabel\')',
                'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_zh',
                'value' => 'CHtml::value($data, \'processedMediaIdZh.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_ar',
                'value' => 'CHtml::value($data, \'processedMediaIdAr.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_bg',
                'value' => 'CHtml::value($data, \'processedMediaIdBg.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_ca',
                'value' => 'CHtml::value($data, \'processedMediaIdCa.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_cs',
                'value' => 'CHtml::value($data, \'processedMediaIdCs.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_da',
                'value' => 'CHtml::value($data, \'processedMediaIdDa.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_en_gb',
                'value' => 'CHtml::value($data, \'processedMediaIdEnGb.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_en_us',
                'value' => 'CHtml::value($data, \'processedMediaIdEnUs.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_el',
                'value' => 'CHtml::value($data, \'processedMediaIdEl.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_fi',
                'value' => 'CHtml::value($data, \'processedMediaIdFi.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_fil',
                'value' => 'CHtml::value($data, \'processedMediaIdFil.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_fr',
                'value' => 'CHtml::value($data, \'processedMediaIdFr.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_hr',
                'value' => 'CHtml::value($data, \'processedMediaIdHr.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_hu',
                'value' => 'CHtml::value($data, \'processedMediaIdHu.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_id',
                'value' => 'CHtml::value($data, \'processedMediaId.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_iw',
                'value' => 'CHtml::value($data, \'processedMediaIdIw.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_it',
                'value' => 'CHtml::value($data, \'processedMediaIdIt.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_ja',
                'value' => 'CHtml::value($data, \'processedMediaIdJa.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_ko',
                'value' => 'CHtml::value($data, \'processedMediaIdKo.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_lt',
                'value' => 'CHtml::value($data, \'processedMediaIdLt.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_lv',
                'value' => 'CHtml::value($data, \'processedMediaIdLv.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_nl',
                'value' => 'CHtml::value($data, \'processedMediaIdNl.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_no',
                'value' => 'CHtml::value($data, \'processedMediaIdNo.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_pl',
                'value' => 'CHtml::value($data, \'processedMediaIdPl.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_pt_br',
                'value' => 'CHtml::value($data, \'processedMediaIdPtBr.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_pt_pt',
                'value' => 'CHtml::value($data, \'processedMediaIdPtPt.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_ro',
                'value' => 'CHtml::value($data, \'processedMediaIdRo.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_ru',
                'value' => 'CHtml::value($data, \'processedMediaIdRu.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_sk',
                'value' => 'CHtml::value($data, \'processedMediaIdSk.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_sl',
                'value' => 'CHtml::value($data, \'processedMediaIdSl.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_sr',
                'value' => 'CHtml::value($data, \'processedMediaIdSr.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_th',
                'value' => 'CHtml::value($data, \'processedMediaIdTh.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_tr',
                'value' => 'CHtml::value($data, \'processedMediaIdTr.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_uk',
                'value' => 'CHtml::value($data, \'processedMediaIdUk.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_vi',
                'value' => 'CHtml::value($data, \'processedMediaIdVi.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_zh_cn',
                'value' => 'CHtml::value($data, \'processedMediaIdZhCn.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_zh_tw',
                'value' => 'CHtml::value($data, \'processedMediaIdZhTw.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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