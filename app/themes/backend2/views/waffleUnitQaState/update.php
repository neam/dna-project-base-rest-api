<?php
$this->setPageTitle(
    Yii::t('model', 'Waffle Unit Qa State')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Waffle Unit Qa States')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Waffle Unit Qa State'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Waffle Units'); ?>
    <small>waffleUnits</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'glyphicon-plus', 'url' => array('waffleUnit/create', 'WaffleUnit' => array('waffle_unit_qa_state_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'waffleUnits');
$this->widget('\TbGridView',
    array(
        'id' => 'waffleUnit-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->waffleUnits) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => '\TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/waffleUnit/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'waffleUnits.itemLabel\')',
                'filter' => '', //CHtml::listData(WaffleUnit::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'ref',
                'editable' => array(
                    'url' => $this->createUrl('/waffleUnit/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_name',
                'editable' => array(
                    'url' => $this->createUrl('/waffleUnit/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_short_name',
                'editable' => array(
                    'url' => $this->createUrl('/waffleUnit/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_description',
            array(
                'name' => 'waffle_id',
                'value' => 'CHtml::value($data, \'waffle.itemLabel\')',
                'filter' => '', //CHtml::listData(Waffle::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/waffleUnit/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/waffleUnit/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'owner_id',
                    'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                    'filter' => '',//CHtml::listData(Account::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => '\TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('waffleUnit/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('waffleUnit/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('waffleUnit/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>

