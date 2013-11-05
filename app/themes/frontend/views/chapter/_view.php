<div class="view well well-white">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('chapter/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title_en); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_media_id')); ?>:</b>
    <?php echo CHtml::encode($data->thumbnail_media_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('about')); ?>:</b>
    <?php echo CHtml::encode($data->about); ?>
    <br/>

    <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Chapter'))), array('chapter/view', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_en')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_en); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($data->modified); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('node_id')); ?>:</b>
    <?php echo CHtml::encode($data->node_id); ?>
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

    <b><?php echo CHtml::encode($data->getAttributeLabel('chapter_qa_state_id_en')); ?>:</b>
    <?php echo CHtml::encode($data->chapter_qa_state_id_en); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('chapter_qa_state_id_es')); ?>:</b>
    <?php echo CHtml::encode($data->chapter_qa_state_id_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('chapter_qa_state_id_fa')); ?>:</b>
    <?php echo CHtml::encode($data->chapter_qa_state_id_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('chapter_qa_state_id_hi')); ?>:</b>
    <?php echo CHtml::encode($data->chapter_qa_state_id_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('chapter_qa_state_id_pt')); ?>:</b>
    <?php echo CHtml::encode($data->chapter_qa_state_id_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('chapter_qa_state_id_sv')); ?>:</b>
    <?php echo CHtml::encode($data->chapter_qa_state_id_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('chapter_qa_state_id_cn')); ?>:</b>
    <?php echo CHtml::encode($data->chapter_qa_state_id_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('chapter_qa_state_id_de')); ?>:</b>
    <?php echo CHtml::encode($data->chapter_qa_state_id_de); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_es')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_fa')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_hi')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_pt')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_sv')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_cn')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_de')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_de); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('Chapter.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Chapter'))), array('chapter/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
            <?php if (Yii::app()->user->checkAccess('Developer')): ?>
                <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Chapter'))), array('chapter/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>
