<?php
$this->breadcrumbs[Yii::t('model', 'I18n Catalogs')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'I18n Catalog'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('version')); ?>:</b>
<?php echo CHtml::encode($model->version); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('cloned_from_id')); ?>:</b>
<?php echo CHtml::encode($model->cloned_from_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
<?php echo CHtml::encode($model->title); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('about')); ?>:</b>
<?php echo CHtml::encode($model->about); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('i18n_category')); ?>:</b>
<?php echo CHtml::encode($model->i18n_category); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('_po_contents')); ?>:</b>
<?php echo CHtml::encode($model->_po_contents); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('pot_import_media_id')); ?>:</b>
<?php echo CHtml::encode($model->pot_import_media_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('owner_id')); ?>:</b>
<?php echo CHtml::encode($model->owner_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('node_id')); ?>:</b>
<?php echo CHtml::encode($model->node_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('i18n_catalog_qa_state_id')); ?>:</b>
<?php echo CHtml::encode($model->i18n_catalog_qa_state_id); ?>
<br />

    */
?>

<div class="row">
    <div class="span7">
        <h2>
            <?php echo Yii::t('model', 'Data') ?>
            <small>
                <?php echo $model->itemLabel ?>            </small>
        </h2>

        <?php
        $this->widget(
            '\TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                    array(
                        'name' => 'id',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'id',
                                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'version',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'version',
                                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'cloned_from_id',
                        'value' => ($model->clonedFrom !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->clonedFrom->itemLabel,
                                    array('//i18nCatalog/view', 'id' => $model->clonedFrom->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//i18nCatalog/update', 'id' => $model->clonedFrom->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'title',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'title',
                                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'about',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'about',
                                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'i18n_category',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'i18n_category',
                                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => '_po_contents',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_po_contents',
                                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'pot_import_media_id',
                        'value' => ($model->potImportMedia !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->potImportMedia->itemLabel,
                                    array('//p3Media/view', 'id' => $model->potImportMedia->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->potImportMedia->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'created',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'created',
                                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'modified',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'modified',
                                    'url' => $this->createUrl('/i18nCatalog/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'owner_id',
                        'value' => ($model->owner !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->owner->itemLabel,
                                    array('//account/view', 'id' => $model->owner->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//account/update', 'id' => $model->owner->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'node_id',
                        'value' => ($model->node !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->node->itemLabel,
                                    array('//node/view', 'id' => $model->node->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//node/update', 'id' => $model->node->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'i18n_catalog_qa_state_id',
                        'value' => ($model->i18nCatalogQaState !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->i18nCatalogQaState->itemLabel,
                                    array('//i18nCatalogQaState/view', 'id' => $model->i18nCatalogQaState->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//i18nCatalogQaState/update', 'id' => $model->i18nCatalogQaState->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>