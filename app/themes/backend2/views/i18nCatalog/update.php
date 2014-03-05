<?php
$this->setPageTitle(
    Yii::t('model', 'I18n Catalog')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'I18n Catalogs')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'I18n Catalog'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Edges'); ?>
    <small>outEdges</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'glyphicon-plus', 'url' => array('edge/create', 'Edge' => array('from_node_id' => $model->node->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));

    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'outEdges');
$this->widget('\TbGridView',
    array(
        'id' => 'edge-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->outEdges) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => '\TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'from_node_id',
                'value' => 'CHtml::value($data, \'fromNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'to_node_id',
                'value' => 'CHtml::value($data, \'toNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'weight',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'relation',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => '\TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('edge/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('edge/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('edge/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Nodes'); ?>
    <small>outNodes</small>
</h2>

This relation is specified through another relation, which in turn is not a BELONGS_TO relation. Unfortunately this template does not support code generation for such a relation yet.
<h2>
    <?php echo Yii::t('model', 'Edges'); ?>
    <small>inEdges</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'glyphicon-plus', 'url' => array('edge/create', 'Edge' => array('to_node_id' => $model->node->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));

    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'inEdges');
$this->widget('\TbGridView',
    array(
        'id' => 'edge-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->inEdges) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => '\TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'from_node_id',
                'value' => 'CHtml::value($data, \'fromNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'to_node_id',
                'value' => 'CHtml::value($data, \'toNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'weight',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'relation',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => '\TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('edge/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('edge/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('edge/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Nodes'); ?>
    <small>inNodes</small>
</h2>

This relation is specified through another relation, which in turn is not a BELONGS_TO relation. Unfortunately this template does not support code generation for such a relation yet.
<h2>
    <?php echo Yii::t('model', 'Gui Sections'); ?>
    <small>guiSections</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'glyphicon-plus', 'url' => array('guiSection/create', 'GuiSection' => array('i18n_catalog_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'guiSections');
$this->widget('\TbGridView',
    array(
        'id' => 'guiSection-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->guiSections) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => '\TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title',
                'editable' => array(
                    'url' => $this->createUrl('/guiSection/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug',
                'editable' => array(
                    'url' => $this->createUrl('/guiSection/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/guiSection/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/guiSection/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'owner_id',
                'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                'filter' => '', //CHtml::listData(Account::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'gui_section_qa_state_id',
                'value' => 'CHtml::value($data, \'guiSectionQaState.itemLabel\')',
                'filter' => '', //CHtml::listData(GuiSectionQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => '\TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('guiSection/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('guiSection/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('guiSection/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'I18n Catalogs'); ?>
    <small>i18nCatalogs</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'glyphicon-plus', 'url' => array('i18nCatalog/create', 'I18nCatalog' => array('cloned_from_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'i18nCatalogs');
$this->widget('\TbGridView',
    array(
        'id' => 'i18nCatalog-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->i18nCatalogs) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title',
                'editable' => array(
                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'about',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'i18n_category',
                'editable' => array(
                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'po_contents',
            array(
                'name' => 'pot_import_media_id',
                'value' => 'CHtml::value($data, \'potImportMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/i18nCatalog/editableSaver'),
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
            array(
                    'name' => 'i18n_catalog_qa_state_id',
                    'value' => 'CHtml::value($data, \'i18nCatalogQaState.itemLabel\')',
                    'filter' => '',//CHtml::listData(I18nCatalogQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => '\TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('i18nCatalog/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('i18nCatalog/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('i18nCatalog/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Tools'); ?>
    <small>tools</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'glyphicon-plus', 'url' => array('tool/create', 'Tool' => array('i18n_catalog_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'tools');
$this->widget('\TbGridView',
    array(
        'id' => 'tool-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->tools) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/tool/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'tools.itemLabel\')',
                'filter' => '', //CHtml::listData(Tool::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/tool/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/tool/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            #'embed_template',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/tool/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
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
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'tool_qa_state_id',
                    'value' => 'CHtml::value($data, \'toolQaState.itemLabel\')',
                    'filter' => '',//CHtml::listData(ToolQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_zh',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ar',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_bg',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ca',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cs',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_da',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_en_gb',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_en_us',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_el',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fi',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fil',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fr',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hr',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hu',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_id',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_iw',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_it',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ja',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ko',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_lt',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_lv',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_nl',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_no',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pl',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt_br',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ro',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ru',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sk',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sl',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sr',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_th',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_tr',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_uk',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_vi',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_zh_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_zh_tw',
                    'editable' => array(
                        'url' => $this->createUrl('/tool/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => '\TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('tool/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('tool/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('tool/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>

