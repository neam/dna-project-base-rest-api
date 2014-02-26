<?php
$this->setPageTitle(
    Yii::t('model', 'Section')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Sections')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Section'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Section Contents'); ?>
    <small>sectionContents</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('sectionContent/create', 'SectionContent' => array('section_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'sectionContents');
$this->widget('TbGridView',
    array(
        'id' => 'sectionContent-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->sectionContents) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'ordinal',
                'editable' => array(
                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'html_chunk_id',
                'value' => 'CHtml::value($data, \'htmlChunk.itemLabel\')',
                'filter' => '', //CHtml::listData(HtmlChunk::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'snapshot_id',
                'value' => 'CHtml::value($data, \'snapshot.itemLabel\')',
                'filter' => '', //CHtml::listData(Snapshot::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'video_file_id',
                'value' => 'CHtml::value($data, \'videoFile.itemLabel\')',
                'filter' => '', //CHtml::listData(VideoFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'exercise_id',
                'value' => 'CHtml::value($data, \'exercise.itemLabel\')',
                'filter' => '', //CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_id',
                    'value' => 'CHtml::value($data, \'dataChunk.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataChunk::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'download_link_id',
                    'value' => 'CHtml::value($data, \'downloadLink.itemLabel\')',
                    'filter' => '',//CHtml::listData(DownloadLink::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exam_question_id',
                    'value' => 'CHtml::value($data, \'examQuestion.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExamQuestion::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>

<div class='well'>
    <div class='row'>
        <div class='span3'><?php
            echo '<h3>';
            echo Yii::t('model', 'relation.HtmlChunks') . ' ';
            $this->widget(
                '\TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' => array('/htmlChunk/admin', 'HtmlChunk' => array('section_content(section_id, html_chunk_id)' => $model->{$model->tableSchema->primaryKey}))
                        ),

                    )
                )
            );
            echo '</h3>' ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->htmlChunks)) {

                echo CHtml::openTag('ul');
                foreach ($model->htmlChunks as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('htmlChunk/view', 'id' => $relatedModel->id), array('class' => ''));

                    echo '</li>';
                }
                echo CHtml::closeTag('ul');
            }
            ?></div>
    </div>
    <!-- row -->
</div> <!-- well -->
<div class='well'>
    <div class='row'>
        <div class='span3'><?php
            echo '<h3>';
            echo Yii::t('model', 'relation.Snapshots') . ' ';
            $this->widget(
                '\TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' => array('/snapshot/admin', 'Snapshot' => array('section_content(section_id, snapshot_id)' => $model->{$model->tableSchema->primaryKey}))
                        ),

                    )
                )
            );
            echo '</h3>' ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->snapshots)) {

                echo CHtml::openTag('ul');
                foreach ($model->snapshots as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('snapshot/view', 'id' => $relatedModel->id), array('class' => ''));

                    echo '</li>';
                }
                echo CHtml::closeTag('ul');
            }
            ?></div>
    </div>
    <!-- row -->
</div> <!-- well -->
<div class='well'>
    <div class='row'>
        <div class='span3'><?php
            echo '<h3>';
            echo Yii::t('model', 'relation.VideoFiles') . ' ';
            $this->widget(
                '\TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' => array('/videoFile/admin', 'VideoFile' => array('section_content(section_id, video_file_id)' => $model->{$model->tableSchema->primaryKey}))
                        ),

                    )
                )
            );
            echo '</h3>' ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->videoFiles)) {

                echo CHtml::openTag('ul');
                foreach ($model->videoFiles as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('videoFile/view', 'id' => $relatedModel->id), array('class' => ''));

                    echo '</li>';
                }
                echo CHtml::closeTag('ul');
            }
            ?></div>
    </div>
    <!-- row -->
</div> <!-- well -->
<div class='well'>
    <div class='row'>
        <div class='span3'><?php
            echo '<h3>';
            echo Yii::t('model', 'relation.Exercises') . ' ';
            $this->widget(
                '\TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' => array('/exercise/admin', 'Exercise' => array('section_content(section_id, exercise_id)' => $model->{$model->tableSchema->primaryKey}))
                        ),

                    )
                )
            );
            echo '</h3>' ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->exercises)) {

                echo CHtml::openTag('ul');
                foreach ($model->exercises as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('exercise/view', 'id' => $relatedModel->id), array('class' => ''));

                    echo '</li>';
                }
                echo CHtml::closeTag('ul');
            }
            ?></div>
    </div>
    <!-- row -->
</div> <!-- well -->
<div class='well'>
    <div class='row'>
        <div class='span3'><?php
            echo '<h3>';
            echo Yii::t('model', 'relation.SlideshoFiles') . ' ';
            $this->widget(
                '\TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' => array('/slideshowFIle/admin', 'SlideshowFIle' => array('section_content(section_id, slideshow_file_id)' => $model->{$model->tableSchema->primaryKey}))
                        ),

                    )
                )
            );
            echo '</h3>' ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->slideshoFiles)) {

                echo CHtml::openTag('ul');
                foreach ($model->slideshoFiles as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('slideshowFIle/view', 'id' => $relatedModel->id), array('class' => ''));

                    echo '</li>';
                }
                echo CHtml::closeTag('ul');
            }
            ?></div>
    </div>
    <!-- row -->
</div> <!-- well -->
<div class='well'>
    <div class='row'>
        <div class='span3'><?php
            echo '<h3>';
            echo Yii::t('model', 'relation.DataChunks') . ' ';
            $this->widget(
                '\TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' => array('/dataChunk/admin', 'DataChunk' => array('section_content(section_id, data_chunk_id)' => $model->{$model->tableSchema->primaryKey}))
                        ),

                    )
                )
            );
            echo '</h3>' ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->dataChunks)) {

                echo CHtml::openTag('ul');
                foreach ($model->dataChunks as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('dataChunk/view', 'id' => $relatedModel->id), array('class' => ''));

                    echo '</li>';
                }
                echo CHtml::closeTag('ul');
            }
            ?></div>
    </div>
    <!-- row -->
</div> <!-- well -->
<div class='well'>
    <div class='row'>
        <div class='span3'><?php
            echo '<h3>';
            echo Yii::t('model', 'relation.DownloadLinks') . ' ';
            $this->widget(
                '\TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' => array('/downloadLink/admin', 'DownloadLink' => array('section_content(section_id, download_link_id)' => $model->{$model->tableSchema->primaryKey}))
                        ),

                    )
                )
            );
            echo '</h3>' ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->downloadLinks)) {

                echo CHtml::openTag('ul');
                foreach ($model->downloadLinks as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('downloadLink/view', 'id' => $relatedModel->id), array('class' => ''));

                    echo '</li>';
                }
                echo CHtml::closeTag('ul');
            }
            ?></div>
    </div>
    <!-- row -->
</div> <!-- well -->
<div class='well'>
    <div class='row'>
        <div class='span3'><?php
            echo '<h3>';
            echo Yii::t('model', 'relation.ExamQuestions') . ' ';
            $this->widget(
                '\TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' => array('/examQuestion/admin', 'ExamQuestion' => array('section_content(section_id, exam_question_id)' => $model->{$model->tableSchema->primaryKey}))
                        ),

                    )
                )
            );
            echo '</h3>' ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->examQuestions)) {

                echo CHtml::openTag('ul');
                foreach ($model->examQuestions as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('examQuestion/view', 'id' => $relatedModel->id), array('class' => ''));

                    echo '</li>';
                }
                echo CHtml::closeTag('ul');
            }
            ?></div>
    </div>
    <!-- row -->
</div> <!-- well -->
