<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataChunks') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataChunk/admin', 'DataChunk' => array('data_source_id' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataChunk/create',
                    'DataChunk' => array('data_source_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataChunks(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataChunk/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//dataChunk/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.SpreadsheetFiles') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///spreadsheetFile/admin', 'SpreadsheetFile' => array('data_source_id' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///spreadsheetFile/create',
                    'SpreadsheetFile' => array('data_source_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->spreadsheetFiles(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//spreadsheetFile/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//spreadsheetFile/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

