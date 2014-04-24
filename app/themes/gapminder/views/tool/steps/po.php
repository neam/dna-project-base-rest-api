<?php
/** @var ToolController|ItemController $this */
/** @var Tool $model */
/** @var AppActiveForm|TbActiveForm $form */
?>
<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'i18nCatalog',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    )
    , true);
echo $form->customControlGroup($model, 'i18n_catalog_id', $input);
?>

