<?php
$this->breadcrumbs[Yii::t('crud', 'Section Contents')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Section Content') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('section_id')); ?>:</b>
<?php echo CHtml::encode($model->section_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('ordinal')); ?>:</b>
<?php echo CHtml::encode($model->ordinal); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('html_chunk_id')); ?>:</b>
<?php echo CHtml::encode($model->html_chunk_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('viz_view_id')); ?>:</b>
<?php echo CHtml::encode($model->viz_view_id); ?>
<br />

<?php /*
  <b><?php echo CHtml::encode($model->getAttributeLabel('video_file_id')); ?>:</b>
  <?php echo CHtml::encode($model->video_file_id); ?>
  <br />

  <b><?php echo CHtml::encode($model->getAttributeLabel('teachers_guide_id')); ?>:</b>
  <?php echo CHtml::encode($model->teachers_guide_id); ?>
  <br />

  <b><?php echo CHtml::encode($model->getAttributeLabel('exercise_id')); ?>:</b>
  <?php echo CHtml::encode($model->exercise_id); ?>
  <br />

  <b><?php echo CHtml::encode($model->getAttributeLabel('presentation_id')); ?>:</b>
  <?php echo CHtml::encode($model->presentation_id); ?>
  <br />

  <b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_id')); ?>:</b>
  <?php echo CHtml::encode($model->data_chunk_id); ?>
  <br />

  <b><?php echo CHtml::encode($model->getAttributeLabel('download_link_id')); ?>:</b>
  <?php echo CHtml::encode($model->download_link_id); ?>
  <br />

 */ ?>


<h2>
    <?php echo Yii::t('crud', 'Data') ?></h2>

<p>
    <?php
    $this->widget('TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            array(
                'name' => 'section_id',
                'value' => ($model->section !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->section->itemLabel, array('section/view', 'id' => $model->section->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            'ordinal',
            'created',
            'modified',
            array(
                'name' => 'html_chunk_id',
                'value' => ($model->htmlChunk !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->htmlChunk->markup_en, array('htmlChunk/view', 'id' => $model->htmlChunk->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            array(
                'name' => 'viz_view_id',
                'value' => ($model->vizView !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->vizView->title_en, array('vizView/view', 'id' => $model->vizView->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            array(
                'name' => 'video_file_id',
                'value' => ($model->videoFile !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->videoFile->title_en, array('videoFile/view', 'id' => $model->videoFile->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            array(
                'name' => 'teachers_guide_id',
                'value' => ($model->teachersGuide !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->teachersGuide->title_en, array('teachersGuide/view', 'id' => $model->teachersGuide->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            array(
                'name' => 'exercise_id',
                'value' => ($model->exercise !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->exercise->title_en, array('exercise/view', 'id' => $model->exercise->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            array(
                'name' => 'presentation_id',
                'value' => ($model->presentation !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->presentation->title_en, array('presentation/view', 'id' => $model->presentation->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            array(
                'name' => 'data_chunk_id',
                'value' => ($model->dataChunk !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->dataChunk->title_en, array('dataChunk/view', 'id' => $model->dataChunk->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            array(
                'name' => 'download_link_id',
                'value' => ($model->downloadLink !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->downloadLink->title_en, array('downloadLink/view', 'id' => $model->downloadLink->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
        ),
    ));
    ?></p>

