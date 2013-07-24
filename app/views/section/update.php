<?php
$this->breadcrumbs[Yii::t('crud', 'Sections')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Update');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Section') ?>
    <small><?php echo Yii::t('crud', 'Update') ?> #<?php echo $model->id ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>

<?php

/*
Code example to include an editable detail view:

<h2>
    <?php echo Yii::t('crud','Editable Detail View')?></h2>

<?php
$this->widget('EditableDetailView', array(
    'data' => $model,
    'url' => $this->createUrl('editableSaver'),
));
?>

*/
?>



<h2>
    <?php echo Yii::t('crud', 'Section Contents'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('crud', 'Create'), 'icon' => 'icon-plus', 'url' => array('sectionContent/create', 'SectionContent' => array('section_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $model->getRelatedSearchModel('sectionContents');
$this->widget('TbGridView',
    array(
        'id' => 'sectionContent-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => count($model->sectionContents) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'ordinal',
                'editable' => array(
                    'url' => $this->createUrl('sectionContent/editableSaver'),
                    'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('sectionContent/editableSaver'),
                    'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('sectionContent/editableSaver'),
                    'placement' => 'right',
                )
            ),
            array(
                'name' => 'html_chunk_id',
                'value' => 'CHtml::value($data,\'htmlChunk.itemLabel\')',
                'filter' => CHtml::listData(HtmlChunk::model()->findAll(), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'viz_view_id',
                'value' => 'CHtml::value($data,\'vizView.itemLabel\')',
                'filter' => CHtml::listData(VizView::model()->findAll(), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'video_file_id',
                'value' => 'CHtml::value($data,\'videoFile.itemLabel\')',
                'filter' => CHtml::listData(VideoFile::model()->findAll(), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'teachers_guide_id',
                'value' => 'CHtml::value($data,\'teachersGuide.itemLabel\')',
                'filter' => CHtml::listData(TeachersGuide::model()->findAll(), 'id', 'itemLabel'),
            ),
            /*
            array(
                        'name'=>'exercise_id',
                        'value'=>'CHtml::value($data,\'exercise.itemLabel\')',
                                'filter'=>CHtml::listData(Exercise::model()->findAll(), 'id', 'itemLabel'),
                                ),
            array(
                        'name'=>'presentation_id',
                        'value'=>'CHtml::value($data,\'presentation.itemLabel\')',
                                'filter'=>CHtml::listData(Presentation::model()->findAll(), 'id', 'itemLabel'),
                                ),
            array(
                        'name'=>'data_chunk_id',
                        'value'=>'CHtml::value($data,\'dataChunk.itemLabel\')',
                                'filter'=>CHtml::listData(DataChunk::model()->findAll(), 'id', 'itemLabel'),
                                ),
            array(
                        'name'=>'download_link_id',
                        'value'=>'CHtml::value($data,\'downloadLink.itemLabel\')',
                                'filter'=>CHtml::listData(DownloadLink::model()->findAll(), 'id', 'itemLabel'),
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
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array(
                            'label' => 'HtmlChunks',
                            'icon' => 'icon-list-alt',
                            'url' => array('htmlChunk/admin')
                        ),
                        array(
                            'icon' => 'icon-plus',
                            'url' => array(
                                'htmlChunk/create',
                                'HtmlChunk' => array('section_content(section_id, html_chunk_id)' => $model->{$model->tableSchema->primaryKey})
                            )
                        ),
                    ),
                )
            ); ?></div>
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
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array(
                            'label' => 'VizViews',
                            'icon' => 'icon-list-alt',
                            'url' => array('vizView/admin')
                        ),
                        array(
                            'icon' => 'icon-plus',
                            'url' => array(
                                'vizView/create',
                                'VizView' => array('section_content(section_id, viz_view_id)' => $model->{$model->tableSchema->primaryKey})
                            )
                        ),
                    ),
                )
            ); ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->vizViews)) {

                echo CHtml::openTag('ul');
                foreach ($model->vizViews as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('vizView/view', 'id' => $relatedModel->id), array('class' => ''));

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
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array(
                            'label' => 'VideoFiles',
                            'icon' => 'icon-list-alt',
                            'url' => array('videoFile/admin')
                        ),
                        array(
                            'icon' => 'icon-plus',
                            'url' => array(
                                'videoFile/create',
                                'VideoFile' => array('section_content(section_id, video_file_id)' => $model->{$model->tableSchema->primaryKey})
                            )
                        ),
                    ),
                )
            ); ?></div>
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
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array(
                            'label' => 'TeachersGuides',
                            'icon' => 'icon-list-alt',
                            'url' => array('teachersGuide/admin')
                        ),
                        array(
                            'icon' => 'icon-plus',
                            'url' => array(
                                'teachersGuide/create',
                                'TeachersGuide' => array('section_content(section_id, teachers_guide_id)' => $model->{$model->tableSchema->primaryKey})
                            )
                        ),
                    ),
                )
            ); ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->teachersGuides)) {

                echo CHtml::openTag('ul');
                foreach ($model->teachersGuides as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('teachersGuide/view', 'id' => $relatedModel->id), array('class' => ''));

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
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array(
                            'label' => 'Exercises',
                            'icon' => 'icon-list-alt',
                            'url' => array('exercise/admin')
                        ),
                        array(
                            'icon' => 'icon-plus',
                            'url' => array(
                                'exercise/create',
                                'Exercise' => array('section_content(section_id, exercise_id)' => $model->{$model->tableSchema->primaryKey})
                            )
                        ),
                    ),
                )
            ); ?></div>
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
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array(
                            'label' => 'Presentations',
                            'icon' => 'icon-list-alt',
                            'url' => array('presentation/admin')
                        ),
                        array(
                            'icon' => 'icon-plus',
                            'url' => array(
                                'presentation/create',
                                'Presentation' => array('section_content(section_id, presentation_id)' => $model->{$model->tableSchema->primaryKey})
                            )
                        ),
                    ),
                )
            ); ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CManyManyRelation</span>';
            if (is_array($model->presentations)) {

                echo CHtml::openTag('ul');
                foreach ($model->presentations as $relatedModel) {

                    echo '<li>';
                    echo CHtml::link($relatedModel->itemLabel, array('presentation/view', 'id' => $relatedModel->id), array('class' => ''));

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
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array(
                            'label' => 'DataChunks',
                            'icon' => 'icon-list-alt',
                            'url' => array('dataChunk/admin')
                        ),
                        array(
                            'icon' => 'icon-plus',
                            'url' => array(
                                'dataChunk/create',
                                'DataChunk' => array('section_content(section_id, data_chunk_id)' => $model->{$model->tableSchema->primaryKey})
                            )
                        ),
                    ),
                )
            ); ?></div>
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
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array(
                            'label' => 'DownloadLinks',
                            'icon' => 'icon-list-alt',
                            'url' => array('downloadLink/admin')
                        ),
                        array(
                            'icon' => 'icon-plus',
                            'url' => array(
                                'downloadLink/create',
                                'DownloadLink' => array('section_content(section_id, download_link_id)' => $model->{$model->tableSchema->primaryKey})
                            )
                        ),
                    ),
                )
            ); ?></div>
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
