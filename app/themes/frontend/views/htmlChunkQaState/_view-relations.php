<!--
<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>
-->


<?php
echo '<h3>';
echo Yii::t('model', 'relation.HtmlChunks') . ' ';
$this->widget(
    '\TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'glyphicon-list-alt',
                'url' => array('///htmlChunk/admin', 'HtmlChunk' => array('html_chunk_qa_state_id' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'glyphicon-plus',
                'url' => array(
                    '///htmlChunk/create',
                    'HtmlChunk' => array('html_chunk_qa_state_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->htmlChunks(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//htmlChunk/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//htmlChunk/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

