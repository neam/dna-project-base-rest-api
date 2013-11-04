<!--
<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>
-->


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataSources') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataSource/admin', 'DataSource' => array('data_source_qa_state_id_en' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataSource/create',
                    'DataSource' => array('data_source_qa_state_id_en' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataSources(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataSource/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//dataSource/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataSources1') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataSource/admin', 'DataSource' => array('data_source_qa_state_id_cn' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataSource/create',
                    'DataSource' => array('data_source_qa_state_id_cn' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataSources1(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataSource/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//dataSource/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataSources2') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataSource/admin', 'DataSource' => array('data_source_qa_state_id_de' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataSource/create',
                    'DataSource' => array('data_source_qa_state_id_de' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataSources2(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataSource/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//dataSource/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataSources3') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataSource/admin', 'DataSource' => array('data_source_qa_state_id_es' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataSource/create',
                    'DataSource' => array('data_source_qa_state_id_es' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataSources3(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataSource/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//dataSource/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataSources4') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataSource/admin', 'DataSource' => array('data_source_qa_state_id_fa' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataSource/create',
                    'DataSource' => array('data_source_qa_state_id_fa' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataSources4(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataSource/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//dataSource/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataSources5') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataSource/admin', 'DataSource' => array('data_source_qa_state_id_hi' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataSource/create',
                    'DataSource' => array('data_source_qa_state_id_hi' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataSources5(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataSource/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//dataSource/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataSources6') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataSource/admin', 'DataSource' => array('data_source_qa_state_id_pt' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataSource/create',
                    'DataSource' => array('data_source_qa_state_id_pt' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataSources6(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataSource/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//dataSource/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataSources7') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///dataSource/admin', 'DataSource' => array('data_source_qa_state_id_sv' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///dataSource/create',
                    'DataSource' => array('data_source_qa_state_id_sv' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->dataSources7(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataSource/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//dataSource/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

