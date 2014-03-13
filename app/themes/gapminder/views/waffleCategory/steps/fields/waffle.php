<?php
/* @var WaffleCategoryController|ItemController $this */
/* @var WaffleCategory|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'waffle',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    )
    , true);
echo $form->customControlGroup($model, 'waffle_id', $input);
?>
