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

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_en')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_es')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_fa')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_hi')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_pt')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_sv')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_cn')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_de')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_de); ?>
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
                    array(
                        'name' => 'public_profile',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'public_profile',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'picture_media_id',
                        'value' => ($model->pictureMedia !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->pictureMedia->itemLabel,
                                    array('//p3Media/view', 'id' => $model->pictureMedia->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
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
                                    'url' => $this->createUrl('/profiles/editableSaver'),
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
                                    'url' => $this->createUrl('/profiles/editableSaver'),
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
                                    'url' => $this->createUrl('/profiles/editableSaver'),
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
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_en',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_es',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_fa',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_fa',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_hi',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_hi',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_pt',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_sv',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_sv',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_cn',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_de',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_de',
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