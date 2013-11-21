<?php
/* @var $this Controller */
/* @var $inputSelector jQuery selector to the select-input of the parent form */
/* @var $pk The primary key field added object */
/* @var $field The field of the newly added object to be used as the key/label of the parent form select-input */
$modalId = "addrelation-" . $fromLabel . "-" . $toLabel . "-modal";
$this->beginWidget('bootstrap.widgets.TbModal', array('id' => $modalId));
?>

    <script>
        function getMyData(){
            var vals = new Array();
            $.each($("input[name='<?php echo $toLabel . 's_to_add'; ?>_c0[]']:checked"), function() {
                vals.push($(this).val());
            });
            return ({'<?php echo $fromType; ?>':{'fromId':'<?php echo $fromId; ?>','toModel':'<?php echo $toType; ?>','edges_to_add':vals}});
        }
        function relationComplete(){
            location.reload();
        }
    </script>


    <div class="modal-header">
        <button type="button" class="close" data-toggle="modal" data-target="#<?php echo $modalId; ?>-modal">×</button>
        <h3><?php echo Yii::t('crud', '{model}', array('{model}' => Yii::t('crud', 'Choose ' . $toLabel . ' to add'))); ?></h3>
    </div>
    <div class="modal-body">
        <?php
        $allRelated = new $toType('search');
        $this->widget(
            'bootstrap.widgets.TbExtendedGridView',
            array(
                'id' => $toLabel . 's_to_add',
                'type' => 'striped bordered',
                'dataProvider' => $allRelated->search(),
                'pager' => array(
                    'class' => 'TbPager',
                    'displayFirstAndLast' => true,
                ),
                'bulkActions' => array(
                    'actionButtons' => array(),
                    'checkBoxColumnConfig' => array(
                        'name' => 'id'
                    ),
                ),
                'columns' => array(
                    array('name' => 'id', 'header' => 'Id'),
                    array('name' => 'itemLabel', 'header' => 'Title'),
                )
            )
        );
        ?>
    </div>
    <div class="modal-footer">
        <div class="btn-group">
            <?php
            echo CHtml::ajaxSubmitButton(
                Yii::t('model', 'Add selected'),
                array("addEdges","id"=>$fromId),
                array(
                    'data'=>'js:getMyData()',
                    'beforeSend'=>'js:function(data){}',
                    'type' => 'POST',
                    'dataType' => 'json',
                    'success' => 'function(html){ relationComplete(); }'
                ),
                array(
                    'class' => 'btn btn-primary',
                    'name' => 'add-selected',
                )
            );
            ?>
        </div>
        <div class="btn-group">
            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Create new " . $toLabel),
                "url" => array(
                    "/" . $toType . "/add/",
                    "fromId"=>$fromId,
                    "toModel"=>$toType,
                    "fromModel"=>$fromType,
                    "returnUrl"=>Yii::app()->request->url,
                )
            ));
            ?>
        </div>
        <a href="#" class="btn" data-toggle="modal"
           data-target="#<?php echo $modalId; ?>"><?php print Yii::t('app', 'Close'); ?></a>
    </div>


<?php
$this->endWidget();
/*
?>







$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => $formId,
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'type' => 'horizontal',
));
?>

    <script>

        $(function () {

            $('#<?php echo $formId; ?>-upload-iframe').on('done', function (event, p3_media_id) {

                $("#<?php echo $formId; ?>-modal").modal("hide");
                $("<?php echo $inputSelector; ?>")
                    .append($("<option>", {value: p3_media_id, selected: "selected"}).text('<?php echo Yii::t('crud', 'Uploaded file'); ?>'));

                if ($("<?php echo $inputSelector; ?>").data('select2opts')) {
                    $("<?php echo $inputSelector; ?>").select2();
                    $("<?php echo $inputSelector; ?>").select2($("<?php echo $inputSelector; ?>").data('select2opts'));
                }

            });

        });

    </script>

    <div class="modal-header">
        <button type="button" class="close" data-toggle="modal" data-target="#<?php echo $formId; ?>-modal">×</button>
        <h3><?php echo Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'File'))); ?></h3>
    </div>
    <div class="modal-body">

        <iframe id="<?php echo $formId; ?>-upload-iframe"
                src="<?php echo Yii::app()->request->baseUrl; ?>/p3media/import/uploadPopup?parent_form=<?php echo $formId; ?>"
                width="100%" height="300" style="border: 0;"></iframe>

    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-toggle="modal"
           data-target="#<?php echo $formId; ?>-modal"><?php print Yii::t('app', 'Close'); ?></a>
    </div>

<?php
$this->endWidget(); // form
$this->endWidget(); // modal
*/