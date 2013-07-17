<?php
$this->breadcrumbs[Yii::t('crud', 'Html Chunks')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Html Chunk') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('markup')); ?>:</b>
<?php echo CHtml::encode($model->markup); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />


<h2><?php echo CHtml::link(Yii::t('app', 'SectionContents'), array('sectionContent/admin')); ?></h2>
<ul>
    <?php
    if (is_array($model->sectionContents))
        foreach ($model->sectionContents as $foreignobj) {

            echo '<li>';
            echo CHtml::link($foreignobj->itemLabel, array('sectionContent/view', 'id' => $foreignobj->id));

            echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('sectionContent/update', 'id' => $foreignobj->id), array('class' => 'edit'));
        }
    ?></ul><p><?php
    echo CHtml::link(
        Yii::t('app', 'Create'), array('sectionContent/create', 'SectionContent' => array('html_chunk_id' => $model->{$model->tableSchema->primaryKey}))
    );
    ?></p>
<h2>
    <?php echo Yii::t('crud', 'Data') ?></h2>

<p>
    <?php
    $this->widget('TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            'markup_en',
            'created',
            'modified',
            'markup_es',
            'markup_fa',
            'markup_hi',
            'markup_pt',
            'markup_sv',
            'markup_de',
        ),
    ));
    ?></p>

