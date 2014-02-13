<!--
<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>
-->


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
                'url' => array('///examQuestion/admin', 'ExamQuestion' => array('exam_question_qa_state_id' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'glyphicon-plus',
                'url' => array(
                    '///examQuestion/create',
                    'ExamQuestion' => array('exam_question_qa_state_id' => $model->{$model->tableSchema->primaryKey})
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
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//examQuestion/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//examQuestion/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

