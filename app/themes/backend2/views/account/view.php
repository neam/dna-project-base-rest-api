<?php
$this->breadcrumbs[Yii::t('model', 'Accounts')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<h1>

    <?php echo Yii::t('model', 'Account'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>:</b>
<?php echo CHtml::encode($model->username); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('password')); ?>:</b>
<?php echo CHtml::encode($model->password); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</b>
<?php echo CHtml::encode($model->email); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('activkey')); ?>:</b>
<?php echo CHtml::encode($model->activkey); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('superuser')); ?>:</b>
<?php echo CHtml::encode($model->superuser); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
<?php echo CHtml::encode($model->status); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?>:</b>
<?php echo CHtml::encode($model->create_at); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?>:</b>
<?php echo CHtml::encode($model->lastvisit_at); ?>
<br />

    */
?>

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
                        'name' => 'id',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'id',
                                    'url' => $this->createUrl('/account/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'username',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'username',
                                    'url' => $this->createUrl('/account/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'password',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'password',
                                    'url' => $this->createUrl('/account/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'email',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'email',
                                    'url' => $this->createUrl('/account/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'activkey',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'activkey',
                                    'url' => $this->createUrl('/account/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'superuser',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'superuser',
                                    'url' => $this->createUrl('/account/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'status',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'status',
                                    'url' => $this->createUrl('/account/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'create_at',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'create_at',
                                    'url' => $this->createUrl('/account/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'lastvisit_at',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'lastvisit_at',
                                    'url' => $this->createUrl('/account/editableSaver'),
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