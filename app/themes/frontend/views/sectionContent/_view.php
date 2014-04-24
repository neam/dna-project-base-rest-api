<div class="view">

    <?php if (!is_null($data->html_chunk_id)): ?>
        <?php $this->renderPartial('/htmlChunk/_view', array('data' => $data->htmlChunk)); ?>
    <?php elseif (!is_null($data->snapshot_id)): ?>
        <?php $this->renderPartial('/snapshot/_view', array('data' => $data->snapshot)); ?>
    <?php
    elseif (!is_null($data->video_file_id)): ?>
        <?php $this->renderPartial('/videoFile/_view', array('data' => $data->videoFile)); ?>
    <?php
    elseif (!is_null($data->teachers_guide_id)): ?>
        <?php $this->renderPartial('/teachersGuide/_view', array('data' => $data->teachersGuide)); ?>
    <?php
    elseif (!is_null($data->exercise_id)): ?>
        <?php $this->renderPartial('/exercise/_view', array('data' => $data->exercise)); ?>
    <?php
    elseif (!is_null($data->slideshow_file_id)): ?>
        <?php $this->renderPartial('/slideshowFile/_view', array('data' => $data->slideshowFile)); ?>
    <?php
    elseif (!is_null($data->data_chunk_id)): ?>
        <?php $this->renderPartial('/dataArticle/_view', array('data' => $data->dataArticle)); ?>
    <?php
    elseif (!is_null($data->download_link_id)): ?>
        <?php $this->renderPartial('/downloadLink/_view', array('data' => $data->downloadLink)); ?>
    <?php
    else: ?>
        <div class="alert">
            <?php echo Yii::t('app', 'Section content has no linked content'); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('SectionContent.*')): ?>
        <div class="admin-container hide">
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('crud', 'Update {model}', array('{model}' => Yii::t('crud', 'Section Content'))), array('sectionContent/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
