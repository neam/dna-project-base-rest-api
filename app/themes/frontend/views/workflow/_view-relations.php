<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>


<?php
echo '<h3>';
echo Yii::t('model', 'Executions') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///execution/admin')
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///execution/create',
                    'Execution' => array('workflow_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->executions(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//execution/view', 'execution_id' => $relatedModel->execution_id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//execution/update', 'execution_id' => $relatedModel->execution_id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

