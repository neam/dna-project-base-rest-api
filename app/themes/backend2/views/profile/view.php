<?php
$this->breadcrumbs[Yii::t('model', 'Profiles')] = array('admin');
$this->breadcrumbs[] = $model->user_id;
?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Profile'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('public_profile')); ?>:</b>
<?php echo CHtml::encode($model->public_profile); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('picture_media_id')); ?>:</b>
<?php echo CHtml::encode($model->picture_media_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('website')); ?>:</b>
<?php echo CHtml::encode($model->website); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('others_may_contact_me')); ?>:</b>
<?php echo CHtml::encode($model->others_may_contact_me); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('about')); ?>:</b>
<?php echo CHtml::encode($model->about); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('lives_in')); ?>:</b>
<?php echo CHtml::encode($model->lives_in); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('language1')); ?>:</b>
<?php echo CHtml::encode($model->language1); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('language2')); ?>:</b>
<?php echo CHtml::encode($model->language2); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('language3')); ?>:</b>
<?php echo CHtml::encode($model->language3); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('language4')); ?>:</b>
<?php echo CHtml::encode($model->language4); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('language5')); ?>:</b>
<?php echo CHtml::encode($model->language5); ?>
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
            '\TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                    array(
                        'name' => 'user_id',
                        'value' => ($model->user !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->user->itemLabel,
                                    array('//account/view', 'id' => $model->user->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//account/update', 'id' => $model->user->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
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
                        'name' => 'first_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'first_name',
                                    'url' => $this->createUrl('/profile/editableSaver'),
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
                                    'url' => $this->createUrl('/profile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'public_profile',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'public_profile',
                                    'url' => $this->createUrl('/profile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'picture_media_id',
                        'value' => ($model->pictureMedia !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->pictureMedia->itemLabel,
                                    array('//p3Media/view', 'id' => $model->pictureMedia->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->pictureMedia->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'website',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'website',
                                    'url' => $this->createUrl('/profile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'others_may_contact_me',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'others_may_contact_me',
                                    'url' => $this->createUrl('/profile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'about',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'about',
                                    'url' => $this->createUrl('/profile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'lives_in',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'lives_in',
                                    'url' => $this->createUrl('/profile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'language1',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'language1',
                                    'url' => $this->createUrl('/profile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'language2',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'language2',
                                    'url' => $this->createUrl('/profile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'language3',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'language3',
                                    'url' => $this->createUrl('/profile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'language4',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'language4',
                                    'url' => $this->createUrl('/profile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'language5',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'language5',
                                    'url' => $this->createUrl('/profile/editableSaver'),
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