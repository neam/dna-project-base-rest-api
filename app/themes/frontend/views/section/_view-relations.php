<!--
<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>
-->


<?php
echo '<h3>';
echo Yii::t('model', 'relation.SectionContents') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///sectionContent/admin', 'SectionContent' => array('section_id' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///sectionContent/create',
                    'SectionContent' => array('section_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->sectionContents(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//sectionContent/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//sectionContent/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.HtmlChunks') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///htmlChunk/admin', 'HtmlChunk' => array('section_content(section_id, html_chunk_id)' => $model->{$model->tableSchema->primaryKey}))
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->htmlChunks(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//htmlChunk/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//htmlChunk/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.Snapshots') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///snapshot/admin', 'Snapshot' => array('section_content(section_id, snapshot_id)' => $model->{$model->tableSchema->primaryKey}))
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->snapshots(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//snapshot/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//snapshot/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.VideoFiles') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///videoFile/admin', 'VideoFile' => array('section_content(section_id, video_file_id)' => $model->{$model->tableSchema->primaryKey}))
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->videoFiles(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//videoFile/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//videoFile/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.Exercises') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///exercise/admin', 'Exercise' => array('section_content(section_id, exercise_id)' => $model->{$model->tableSchema->primaryKey}))
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->exercises(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//exercise/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//exercise/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.SlideshoFiles') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///slideshowFIle/admin', 'SlideshowFIle' => array('section_content(section_id, slideshow_file_id)' => $model->{$model->tableSchema->primaryKey}))
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->slideshoFiles(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//slideshowFIle/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//slideshowFIle/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataChunks') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataChunk/admin', 'DataChunk' => array('section_content(section_id, data_chunk_id)' => $model->{$model->tableSchema->primaryKey}))
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataChunks(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataChunk/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//dataChunk/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DownloadLinks') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///downloadLink/admin', 'DownloadLink' => array('section_content(section_id, download_link_id)' => $model->{$model->tableSchema->primaryKey}))
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->downloadLinks(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//downloadLink/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//downloadLink/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.ExamQuestions') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///examQuestion/admin', 'ExamQuestion' => array('section_content(section_id, exam_question_id)' => $model->{$model->tableSchema->primaryKey}))
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->examQuestions(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//examQuestion/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//examQuestion/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

