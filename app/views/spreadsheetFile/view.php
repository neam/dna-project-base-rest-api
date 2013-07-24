<?php
$this->breadcrumbs[Yii::t('crud', 'Spreadsheet Files')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Spreadsheet File') ?>
    <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small>
</h1>



<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
<?php echo CHtml::encode($model->title); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_id')); ?>:</b>
<?php echo CHtml::encode($model->data_source_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('original_media_id')); ?>:</b>
<?php echo CHtml::encode($model->original_media_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id); ?>
<br/>


<h2>
    <?php echo Yii::t('crud', 'Data') ?></h2>

<p>
    <?php
    $this->widget('TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            'title_en',
            'created',
            'modified',
            array(
                'name' => 'data_source_id',
                'value' => ($model->dataSource !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->dataSource->itemLabel, array('dataSource/view', 'id' => $model->dataSource->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            array(
                'name' => 'original_media_id',
                'value' => ($model->originalMedia !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->originalMedia->itemLabel, array('p3Media/view', 'id' => $model->originalMedia->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            array(
                'name' => 'processed_media_id',
                'value' => ($model->processedMedia !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->processedMedia->itemLabel, array('p3Media/view', 'id' => $model->processedMedia->id), array('class' => 'btn')) : 'n/a',
                'type' => 'html',
            ),
            'title_es',
            'title_fa',
            'title_hi',
            'title_pt',
            'title_sv',
            'title_de',
        ),
    ));
    ?></p>

