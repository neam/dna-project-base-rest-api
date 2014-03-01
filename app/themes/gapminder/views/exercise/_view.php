<?php
/* @var ExerciseController|ItemController $this */
/* @var Exercise $data */
?>
<div class="admin-container hide">
    <?php echo TbHtml::link(
        '<i class="glyphicon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Exercise'))),
        array('exercise/view', 'id' => $data->id), array('class' => 'btn')
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
            '_question',
            '_description',
        ),
    )
); ?>

<?php if (Yii::app()->user->checkAccess('Exercise.*')): ?>
    <div class="admin-container hide">
        <?php echo TbHtml::link(
            '<i class="glyphicon glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Exercise'))),
            array('exercise/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')
        ); ?>
    </div>
<?php endif; ?>

<?php if (Yii::app()->user->checkAccess('Developer')): ?>
    <div class="admin-container hide">
        <h3>Developer access</h3>
        <?php echo TbHtml::link(
            '<i class="glyphicon glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Exercise'))),
            array('exercise/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')
        ); ?>
    </div>
<?php endif; ?>
