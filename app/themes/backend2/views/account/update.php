<?php
$this->setPageTitle(
    Yii::t('model', 'Account')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Accounts')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Account'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Changesets'); ?>
    <small>changesets</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('changeset/create', 'Changeset' => array('user_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'changesets');
$this->widget('TbGridView',
    array(
        'id' => 'changeset-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->changesets) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            #'contents',
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'reward',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('changeset/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('changeset/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('changeset/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>

<div class='well'>
    <div class='row'>
        <div class='span3'><?php
            echo '<h3>';
            echo Yii::t('model', 'relation.Profiles') . ' ';
            $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' => array('/profiles/admin', 'Profiles' => array('user_id' => $model->{$model->tableSchema->primaryKey}))
                        ),
                        array(
                            'icon' => 'icon-plus',
                            'url' => array(
                                '/profiles/create',
                                'Profiles' => array('user_id' => $model->{$model->tableSchema->primaryKey})
                            )
                        ),

                    )
                )
            );
            echo '</h3>' ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CHasOneRelation</span>';
            $relatedModel = $model->profiles;

            if ($relatedModel !== null) {
                echo CHtml::openTag('ul');
                echo '<li>';
                echo CHtml::link(
                    '#' . $model->profiles->user_id . ' ' . $model->profiles->itemLabel,
                    array('profiles/view', 'user_id' => $model->profiles->user_id),
                    array('class' => ''));

                echo '</li>';

                echo CHtml::closeTag('ul');
            }
            ?></div>
    </div>
    <!-- row -->
</div> <!-- well -->
