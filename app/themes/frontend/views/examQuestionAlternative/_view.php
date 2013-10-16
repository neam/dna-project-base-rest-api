<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('examQuestionAlternative/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
    <?php echo CHtml::encode($data->slug); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_en')); ?>:</b>
    <?php echo CHtml::encode($data->markup_en); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('correct')); ?>:</b>
    <?php echo CHtml::encode($data->correct); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('exam_question_id')); ?>:</b>
    <?php echo CHtml::encode($data->exam_question_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($data->modified); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('node_id')); ?>:</b>
    <?php echo CHtml::encode($data->node_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_es')); ?>:</b>
    <?php echo CHtml::encode($data->markup_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_fa')); ?>:</b>
    <?php echo CHtml::encode($data->markup_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_hi')); ?>:</b>
    <?php echo CHtml::encode($data->markup_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_pt')); ?>:</b>
    <?php echo CHtml::encode($data->markup_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_sv')); ?>:</b>
    <?php echo CHtml::encode($data->markup_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_cn')); ?>:</b>
    <?php echo CHtml::encode($data->markup_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_de')); ?>:</b>
    <?php echo CHtml::encode($data->markup_de); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('ExamQuestionAlternative.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Exam Question Alternative'))), array('examQuestionAlternative/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
