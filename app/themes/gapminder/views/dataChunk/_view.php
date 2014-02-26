<?php
/* @var DataChunkController|ItemController $this */
/* @var DataChunk|ItemTrait $data */
?>
<div class="admin-container hide">
    <?php echo CHtml::link(
        '<i class="glyphicon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Data Chunk'))),
        array('dataChunk/view', 'id' => $data->id), array('class' => 'btn')
    ); ?>
</div>
<?php $this->widget(
    'ItemDetails',
    array(
        'model' => $data,
        'attributes' => array(
            'id',
            'version',
            'cloned_from_id',
            '_title',
            'slug_en',
            '_about',
            'file_media_id',
        ),
    )
); ?>
<?php /*
<b><?php echo CHtml::encode($data->getAttributeLabel('metadata')); ?>:</b>
<?php echo CHtml::encode($data->metadata); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($data->created); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($data->modified); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('owner_id')); ?>:</b>
<?php echo CHtml::encode($data->owner_id); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('node_id')); ?>:</b>
<?php echo CHtml::encode($data->node_id); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_es')); ?>:</b>
<?php echo CHtml::encode($data->slug_es); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_hi')); ?>:</b>
<?php echo CHtml::encode($data->slug_hi); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_pt')); ?>:</b>
<?php echo CHtml::encode($data->slug_pt); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_sv')); ?>:</b>
<?php echo CHtml::encode($data->slug_sv); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_de')); ?>:</b>
<?php echo CHtml::encode($data->slug_de); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('data_chunk_qa_state_id')); ?>:</b>
<?php echo CHtml::encode($data->data_chunk_qa_state_id); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_zh')); ?>:</b>
<?php echo CHtml::encode($data->slug_zh); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_ar')); ?>:</b>
<?php echo CHtml::encode($data->slug_ar); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_bg')); ?>:</b>
<?php echo CHtml::encode($data->slug_bg); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_ca')); ?>:</b>
<?php echo CHtml::encode($data->slug_ca); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_cs')); ?>:</b>
<?php echo CHtml::encode($data->slug_cs); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_da')); ?>:</b>
<?php echo CHtml::encode($data->slug_da); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_en_gb')); ?>:</b>
<?php echo CHtml::encode($data->slug_en_gb); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_en_us')); ?>:</b>
<?php echo CHtml::encode($data->slug_en_us); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_el')); ?>:</b>
<?php echo CHtml::encode($data->slug_el); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_fi')); ?>:</b>
<?php echo CHtml::encode($data->slug_fi); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_fil')); ?>:</b>
<?php echo CHtml::encode($data->slug_fil); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_fr')); ?>:</b>
<?php echo CHtml::encode($data->slug_fr); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_hr')); ?>:</b>
<?php echo CHtml::encode($data->slug_hr); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_hu')); ?>:</b>
<?php echo CHtml::encode($data->slug_hu); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_id')); ?>:</b>
<?php echo CHtml::encode($data->slug_id); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_iw')); ?>:</b>
<?php echo CHtml::encode($data->slug_iw); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_it')); ?>:</b>
<?php echo CHtml::encode($data->slug_it); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_ja')); ?>:</b>
<?php echo CHtml::encode($data->slug_ja); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_ko')); ?>:</b>
<?php echo CHtml::encode($data->slug_ko); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_lt')); ?>:</b>
<?php echo CHtml::encode($data->slug_lt); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_lv')); ?>:</b>
<?php echo CHtml::encode($data->slug_lv); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_nl')); ?>:</b>
<?php echo CHtml::encode($data->slug_nl); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_no')); ?>:</b>
<?php echo CHtml::encode($data->slug_no); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_pl')); ?>:</b>
<?php echo CHtml::encode($data->slug_pl); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_pt_br')); ?>:</b>
<?php echo CHtml::encode($data->slug_pt_br); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_pt_pt')); ?>:</b>
<?php echo CHtml::encode($data->slug_pt_pt); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_ro')); ?>:</b>
<?php echo CHtml::encode($data->slug_ro); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_ru')); ?>:</b>
<?php echo CHtml::encode($data->slug_ru); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_sk')); ?>:</b>
<?php echo CHtml::encode($data->slug_sk); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_sl')); ?>:</b>
<?php echo CHtml::encode($data->slug_sl); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_sr')); ?>:</b>
<?php echo CHtml::encode($data->slug_sr); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_th')); ?>:</b>
<?php echo CHtml::encode($data->slug_th); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_tr')); ?>:</b>
<?php echo CHtml::encode($data->slug_tr); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_uk')); ?>:</b>
<?php echo CHtml::encode($data->slug_uk); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_vi')); ?>:</b>
<?php echo CHtml::encode($data->slug_vi); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_zh_cn')); ?>:</b>
<?php echo CHtml::encode($data->slug_zh_cn); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('slug_zh_tw')); ?>:</b>
<?php echo CHtml::encode($data->slug_zh_tw); ?>
<br />
*/ ?>
<?php if (Yii::app()->user->checkAccess('DataChunk.*')): ?>
    <div class="admin-container hide">
        <?php echo CHtml::link(
            '<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Data Chunk'))),
            array('dataChunk/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')
        ); ?>
    </div>
<?php endif; ?>
<?php if (Yii::app()->user->checkAccess('Developer')): ?>
    <div class="admin-container hide">
        <h3><?php Yii::t('app', 'Developer access'); ?></h3>
        <?php echo CHtml::link(
            '<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Data Chunk'))),
            array('dataChunk/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')
        ); ?>
    </div>
<?php endif; ?>
