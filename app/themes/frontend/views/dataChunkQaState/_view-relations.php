<!--
<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>
-->


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
                'url' => array('///dataChunk/admin', 'DataChunk' => array('data_chunk_qa_state_id_en' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataChunk/create',
                    'DataChunk' => array('data_chunk_qa_state_id_en' => $model->{$model->tableSchema->primaryKey})
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
echo Yii::t('model', 'relation.DataChunks1') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataChunk/admin', 'DataChunk' => array('data_chunk_qa_state_id_cn' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataChunk/create',
                    'DataChunk' => array('data_chunk_qa_state_id_cn' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataChunks1(array('limit' => 250, 'scopes' => ''));
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
echo Yii::t('model', 'relation.DataChunks2') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataChunk/admin', 'DataChunk' => array('data_chunk_qa_state_id_de' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataChunk/create',
                    'DataChunk' => array('data_chunk_qa_state_id_de' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataChunks2(array('limit' => 250, 'scopes' => ''));
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
echo Yii::t('model', 'relation.DataChunks3') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataChunk/admin', 'DataChunk' => array('data_chunk_qa_state_id_es' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataChunk/create',
                    'DataChunk' => array('data_chunk_qa_state_id_es' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataChunks3(array('limit' => 250, 'scopes' => ''));
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
echo Yii::t('model', 'relation.DataChunks4') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataChunk/admin', 'DataChunk' => array('data_chunk_qa_state_id_fa' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataChunk/create',
                    'DataChunk' => array('data_chunk_qa_state_id_fa' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataChunks4(array('limit' => 250, 'scopes' => ''));
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
echo Yii::t('model', 'relation.DataChunks5') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataChunk/admin', 'DataChunk' => array('data_chunk_qa_state_id_hi' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataChunk/create',
                    'DataChunk' => array('data_chunk_qa_state_id_hi' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataChunks5(array('limit' => 250, 'scopes' => ''));
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
echo Yii::t('model', 'relation.DataChunks6') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataChunk/admin', 'DataChunk' => array('data_chunk_qa_state_id_pt' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataChunk/create',
                    'DataChunk' => array('data_chunk_qa_state_id_pt' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataChunks6(array('limit' => 250, 'scopes' => ''));
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
echo Yii::t('model', 'relation.DataChunks7') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataChunk/admin', 'DataChunk' => array('data_chunk_qa_state_id_sv' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataChunk/create',
                    'DataChunk' => array('data_chunk_qa_state_id_sv' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataChunks7(array('limit' => 250, 'scopes' => ''));
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

