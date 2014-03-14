<!--
<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>
-->


<?php
echo '<h3>';
echo Yii::t('model', 'relation.WaffleCategoryThings') . ' ';
$this->widget(
    '\TbButtonGroup',
    array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'mini',
        'buttons' => array(
            array(
                'icon' => 'glyphicon-list-alt',
                'url' => array('///waffleCategoryThing/admin', 'WaffleCategoryThing' => array('waffle_category_thing_qa_state_id' => $model->{$model->tableSchema->primaryKey}))
            ),
            array(
                'icon' => 'glyphicon-plus',
                'url' => array(
                    '///waffleCategoryThing/create',
                    'WaffleCategoryThing' => array('waffle_category_thing_qa_state_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),

        )
    )
);
echo '</h3>' ?>
<ul>

    <?php
    $records = $model->waffleCategoryThings(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon glyphicon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('//waffleCategoryThing/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon glyphicon-pencil"></i>',
                array('//waffleCategoryThing/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

