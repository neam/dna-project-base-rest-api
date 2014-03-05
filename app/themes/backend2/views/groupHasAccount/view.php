<?php
$this->breadcrumbs[Yii::t('model', 'Group Has Accounts')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Group Has Account'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('account_id')); ?>:</b>
<?php echo CHtml::encode($model->account_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('group_id')); ?>:</b>
<?php echo CHtml::encode($model->group_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('role_id')); ?>:</b>
<?php echo CHtml::encode($model->role_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
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
            '\TbDetailView',
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
                                    'url' => $this->createUrl('/groupHasAccount/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'account_id',
                        'value' => ($model->account !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->account->itemLabel,
                                    array('//account/view', 'id' => $model->account->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//account/update', 'id' => $model->account->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'group_id',
                        'value' => ($model->group !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->group->itemLabel,
                                    array('//group/view', 'id' => $model->group->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//group/update', 'id' => $model->group->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'role_id',
                        'value' => ($model->role !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->role->itemLabel,
                                    array('//role/view', 'id' => $model->role->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//role/update', 'id' => $model->role->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'created',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'created',
                                    'url' => $this->createUrl('/groupHasAccount/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'modified',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'modified',
                                    'url' => $this->createUrl('/groupHasAccount/editableSaver'),
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