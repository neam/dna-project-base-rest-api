<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('page/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($data->version); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($data->cloned_from_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_en')); ?>:</b>
    <?php echo CHtml::encode($data->title_en); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_en')); ?>:</b>
    <?php echo CHtml::encode($data->slug_en); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_en')); ?>:</b>
    <?php echo CHtml::encode($data->about_en); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($data->modified); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_es')); ?>:</b>
    <?php echo CHtml::encode($data->slug_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_fa')); ?>:</b>
    <?php echo CHtml::encode($data->slug_fa); ?>
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

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_cn')); ?>:</b>
    <?php echo CHtml::encode($data->slug_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_de')); ?>:</b>
    <?php echo CHtml::encode($data->slug_de); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_es')); ?>:</b>
    <?php echo CHtml::encode($data->title_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_fa')); ?>:</b>
    <?php echo CHtml::encode($data->title_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_hi')); ?>:</b>
    <?php echo CHtml::encode($data->title_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_pt')); ?>:</b>
    <?php echo CHtml::encode($data->title_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_sv')); ?>:</b>
    <?php echo CHtml::encode($data->title_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_cn')); ?>:</b>
    <?php echo CHtml::encode($data->title_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_de')); ?>:</b>
    <?php echo CHtml::encode($data->title_de); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_es')); ?>:</b>
    <?php echo CHtml::encode($data->about_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_fa')); ?>:</b>
    <?php echo CHtml::encode($data->about_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_hi')); ?>:</b>
    <?php echo CHtml::encode($data->about_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_pt')); ?>:</b>
    <?php echo CHtml::encode($data->about_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_sv')); ?>:</b>
    <?php echo CHtml::encode($data->about_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_cn')); ?>:</b>
    <?php echo CHtml::encode($data->about_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_de')); ?>:</b>
    <?php echo CHtml::encode($data->about_de); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('Page.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Page'))), array('page/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
