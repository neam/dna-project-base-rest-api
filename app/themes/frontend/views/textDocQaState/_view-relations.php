<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.TextDocs') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///textDoc/admin', 'TextDoc' => array('text_doc_qa_state_id_de' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///textDoc/create',
                    'TextDoc' => array('text_doc_qa_state_id_de' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->textDocs(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//textDoc/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//textDoc/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.TextDocs1') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///textDoc/admin', 'TextDoc' => array('text_doc_qa_state_id_en' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///textDoc/create',
                    'TextDoc' => array('text_doc_qa_state_id_en' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->textDocs1(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//textDoc/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//textDoc/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.TextDocs2') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///textDoc/admin', 'TextDoc' => array('text_doc_qa_state_id_cn' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///textDoc/create',
                    'TextDoc' => array('text_doc_qa_state_id_cn' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->textDocs2(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//textDoc/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//textDoc/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.TextDocs3') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///textDoc/admin', 'TextDoc' => array('text_doc_qa_state_id_es' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///textDoc/create',
                    'TextDoc' => array('text_doc_qa_state_id_es' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->textDocs3(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//textDoc/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//textDoc/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.TextDocs4') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///textDoc/admin', 'TextDoc' => array('text_doc_qa_state_id_fa' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///textDoc/create',
                    'TextDoc' => array('text_doc_qa_state_id_fa' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->textDocs4(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//textDoc/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//textDoc/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.TextDocs5') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///textDoc/admin', 'TextDoc' => array('text_doc_qa_state_id_hi' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///textDoc/create',
                    'TextDoc' => array('text_doc_qa_state_id_hi' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->textDocs5(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//textDoc/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//textDoc/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.TextDocs6') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///textDoc/admin', 'TextDoc' => array('text_doc_qa_state_id_pt' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///textDoc/create',
                    'TextDoc' => array('text_doc_qa_state_id_pt' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->textDocs6(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//textDoc/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//textDoc/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>


<?php
echo '<h3>';
echo Yii::t('model', 'relation.TextDocs7') . ' ';
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'icon-list-alt',
                'url' => array('///textDoc/admin', 'TextDoc' => array('text_doc_qa_state_id_sv' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'icon-plus',
                'url' => array(
                    '///textDoc/create',
                    'TextDoc' => array('text_doc_qa_state_id_sv' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->textDocs7(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//textDoc/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('//textDoc/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

