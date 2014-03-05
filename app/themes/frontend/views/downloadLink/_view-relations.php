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
echo Yii::t('model', 'relation.DownloadLinks') . ' ';
$this->widget(
    '\TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'glyphicon-list-alt',
                'url' => array('///downloadLink/admin', 'DownloadLink' => array('cloned_from_id' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'glyphicon-plus',
                'url' => array(
                    '///downloadLink/create',
                    'DownloadLink' => array('cloned_from_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->downloadLinks(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//downloadLink/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//downloadLink/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

