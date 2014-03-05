<!--
<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>
-->


<?php echo '<h3>' . Yii::t('model', 'relation.OutEdges') . '</h3>' ?>
<ul>

    <?php
    $records = $model->outEdges(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//edge/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//edge/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php echo '<h3>' . Yii::t('model', 'relation.OutNodes') . '</h3>' ?>
<ul>

    <?php
    $records = $model->outNodes(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//node/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//node/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php echo '<h3>' . Yii::t('model', 'relation.InEdges') . '</h3>' ?>
<ul>

    <?php
    $records = $model->inEdges(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//edge/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//edge/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php echo '<h3>' . Yii::t('model', 'relation.InNodes') . '</h3>' ?>
<ul>

    <?php
    $records = $model->inNodes(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//node/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//node/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.DataSources') . ' ';
$this->widget(
    '\TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'glyphicon-list-alt',
                'url' => array('///dataSource/admin', 'DataSource' => array('cloned_from_id' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'glyphicon-plus',
                'url' => array(
                    '///dataSource/create',
                    'DataSource' => array('cloned_from_id' => $model->{$model->tableSchema->primaryKey})
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
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//dataSource/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//dataSource/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.ExamQuestions') . ' ';
$this->widget(
    '\TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'glyphicon-list-alt',
                'url' => array('///examQuestion/admin', 'ExamQuestion' => array('cloned_from_id' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'glyphicon-plus',
                'url' => array(
                    '///examQuestion/create',
                    'ExamQuestion' => array('cloned_from_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->examQuestions(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//examQuestion/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//examQuestion/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.Snapshots') . ' ';
$this->widget(
    '\TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'glyphicon-list-alt',
                'url' => array('///snapshot/admin', 'Snapshot' => array('cloned_from_id' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'glyphicon-plus',
                'url' => array(
                    '///snapshot/create',
                    'Snapshot' => array('cloned_from_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->snapshots(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//snapshot/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//snapshot/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php echo '<h3>' . Yii::t('model', 'relation.ParentChapters') . '</h3>' ?>
<ul>

    <?php
    $records = $model->parentChapters(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//chapter/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//chapter/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php echo '<h3>' . Yii::t('model', 'relation.Tools') . '</h3>' ?>
<ul>

    <?php
    $records = $model->tools(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//tool/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//tool/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php echo '<h3>' . Yii::t('model', 'relation.Related') . '</h3>' ?>
<ul>

    <?php
    $records = $model->related(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//node/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//node/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

