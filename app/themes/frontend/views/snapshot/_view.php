<div class="view">

    <?php if (!is_null($data->embed_override)): ?>

        <?php
        $markup = $data->embed_override;
        ?>

        <?php echo str_replace("{language}", Yii::app()->language, $markup); ?>

    <?php elseif (!is_null($data->tool) && !is_null($data->tool->embed_template)): ?>

        <?php
        $markup = $data->tool->embed_template;
        ?>

        <?php echo str_replace("{language}", Yii::app()->language, $markup); ?>

    <?php
    else: ?>

        <div class="alert">
            <?php echo Yii::t('app', 'No markup to render'); ?>
        </div>

    <?php endif; ?>

    <?php if (Yii::app()->user->checkAccess('Snapshot.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Snapshot'))), array('snapshot/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container show">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Snapshot'))), array('snapshot/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
