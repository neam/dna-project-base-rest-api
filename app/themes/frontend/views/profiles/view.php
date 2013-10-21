<?php
$this->breadcrumbs[Yii::t('model', 'Profiles')] = array('admin');
$this->breadcrumbs[] = $model->user_id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Profiles'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->user_id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('user_id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->user_id), array('view', 'user_id' => $model->user_id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('first_name')); ?>:</b>
<?php echo CHtml::encode($model->first_name); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('last_name')); ?>:</b>
<?php echo CHtml::encode($model->last_name); ?>
<br/>


<div class="row">
    <div class="span7">
        <h2>
            <?php echo Yii::t('model', 'Data') ?>
            <small>
                <?php echo $model->itemLabel ?>            </small>
        </h2>

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                    array(
                        'name' => 'user_id',
                        'value' => ($model->user !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->user->itemLabel,
                                array('//users/view', 'id' => $model->user->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//users/update', 'id' => $model->user->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'first_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'first_name',
                                'url' => $this->createUrl('/profiles/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'last_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'last_name',
                                'url' => $this->createUrl('/profiles/editableSaver'),
                            ),
                            true
                        )
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>