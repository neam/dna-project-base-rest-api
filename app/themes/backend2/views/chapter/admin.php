<?php
$this->setPageTitle(
    Yii::t('model', 'Chapters')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Chapters');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'chapter-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Chapters'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('Chapter.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'chapter-grid',
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
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'chapters.itemLabel\')',
                'filter' => '', //CHtml::listData(Chapter::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'about_en',
            #'teachers_guide_en',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_es',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_fa',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_hi',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_pt',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_sv',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_cn',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_de',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_es',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_fa',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_hi',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_pt',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_sv',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_cn',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_de',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
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
                'name' => 'chapter_qa_state_id_en',
                'value' => 'CHtml::value($data, \'chapterQaStateIdEn.itemLabel\')',
                'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'chapter_qa_state_id_es',
                'value' => 'CHtml::value($data, \'chapterQaStateIdEs.itemLabel\')',
                'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'chapter_qa_state_id_fa',
                'value' => 'CHtml::value($data, \'chapterQaStateIdFa.itemLabel\')',
                'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'chapter_qa_state_id_hi',
                'value' => 'CHtml::value($data, \'chapterQaStateIdHi.itemLabel\')',
                'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'chapter_qa_state_id_pt',
                'value' => 'CHtml::value($data, \'chapterQaStateIdPt.itemLabel\')',
                'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'chapter_qa_state_id_sv',
                'value' => 'CHtml::value($data, \'chapterQaStateIdSv.itemLabel\')',
                'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'chapter_qa_state_id_cn',
                'value' => 'CHtml::value($data, \'chapterQaStateIdCn.itemLabel\')',
                'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'chapter_qa_state_id_de',
                'value' => 'CHtml::value($data, \'chapterQaStateIdDe.itemLabel\')',
                'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'teachers_guide_es',
            #'teachers_guide_fa',
            #'teachers_guide_hi',
            #'teachers_guide_pt',
            #'teachers_guide_sv',
            #'teachers_guide_cn',
            #'teachers_guide_de',
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Chapter.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Chapter.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Chapter.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('Chapter.view.grid'); ?>