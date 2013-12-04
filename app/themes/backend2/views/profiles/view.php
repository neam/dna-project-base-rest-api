<?php
$this->breadcrumbs[Yii::t('model', 'Profiles')] = array('admin');
$this->breadcrumbs[] = $model->user_id;
?>

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

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_hi')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_pt')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_sv')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_de')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_zh')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_zh); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_ar')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_ar); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_bg')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_bg); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_ca')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_ca); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_cs')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_cs); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_da')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_da); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_en_gb')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_en_gb); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_en_us')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_en_us); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_el')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_el); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_fi')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_fi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_fil')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_fil); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_fr')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_fr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_hr')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_hr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_hu')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_hu); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_id')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_iw')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_iw); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_it')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_it); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_ja')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_ja); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_ko')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_ko); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_lt')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_lt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_lv')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_lv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_nl')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_nl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_no')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_no); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_pl')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_pl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_pt_br')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_pt_br); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_pt_pt')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_pt_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_ro')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_ro); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_ru')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_ru); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_sk')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_sk); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_sl')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_sl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_sr')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_sr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_th')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_th); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_tr')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_tr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_uk')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_uk); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_vi')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_vi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_zh_cn')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_zh_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('can_translate_to_zh_tw')); ?>:</b>
<?php echo CHtml::encode($model->can_translate_to_zh_tw); ?>
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
                    array(
                        'name' => 'can_translate_to_zh',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_zh',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_ar',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_ar',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_bg',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_bg',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_ca',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_ca',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_cs',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_cs',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_da',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_da',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_en_gb',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_en_gb',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_en_us',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_en_us',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_el',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_el',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_fi',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_fi',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_fil',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_fil',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_fr',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_fr',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_hr',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_hr',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_hu',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_hu',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_id',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_iw',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_iw',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_it',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_it',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_ja',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_ja',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_ko',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_ko',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_lt',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_lt',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_lv',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_lv',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_nl',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_nl',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_no',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_no',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_pl',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_pl',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_pt_br',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_pt_br',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_pt_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_pt_pt',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_ro',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_ro',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_ru',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_ru',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_sk',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_sk',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_sl',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_sl',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_sr',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_sr',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_th',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_th',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_tr',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_tr',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_uk',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_uk',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_vi',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_vi',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_zh_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_zh_cn',
                                    'url' => $this->createUrl('/profiles/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'can_translate_to_zh_tw',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'can_translate_to_zh_tw',
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