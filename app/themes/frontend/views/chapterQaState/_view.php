<div class="view well well-white">

    <div class="admin-container show">
        <?php echo CHtml::link('<i class="icon-eye"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Chapter Qa State'))), array('chapterQaState/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('chapterQaState/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode($data->status); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('draft_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->draft_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('preview_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->preview_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('public_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->public_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('approval_progress')); ?>:</b>
    <?php echo CHtml::encode($data->approval_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('proofing_progress')); ?>:</b>
    <?php echo CHtml::encode($data->proofing_progress); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_draft_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_draft_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_preview_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_preview_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_public_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_public_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_approval_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_approval_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_proofing_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_proofing_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('previewing_welcome')); ?>:</b>
    <?php echo CHtml::encode($data->previewing_welcome); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('candidate_for_public_status')); ?>:</b>
    <?php echo CHtml::encode($data->candidate_for_public_status); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_approved')); ?>:</b>
    <?php echo CHtml::encode($data->title_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_approved')); ?>:</b>
    <?php echo CHtml::encode($data->slug_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_approved')); ?>:</b>
    <?php echo CHtml::encode($data->thumbnail_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_approved')); ?>:</b>
    <?php echo CHtml::encode($data->about_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('video_approved')); ?>:</b>
    <?php echo CHtml::encode($data->video_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_approved')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('exercises_approved')); ?>:</b>
    <?php echo CHtml::encode($data->exercises_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('snapshots_approved')); ?>:</b>
    <?php echo CHtml::encode($data->snapshots_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('credits_approved')); ?>:</b>
    <?php echo CHtml::encode($data->credits_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->title_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->slug_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->thumbnail_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->about_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('video_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->video_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('exercises_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->exercises_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('snapshots_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->snapshots_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('credits_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->credits_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('draft_saved')); ?>:</b>
    <?php echo CHtml::encode($data->draft_saved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('videos_approved')); ?>:</b>
    <?php echo CHtml::encode($data->videos_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('videos_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->videos_proofed); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('ChapterQaState.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Chapter Qa State'))), array('chapterQaState/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container show">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Chapter Qa State'))), array('chapterQaState/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
