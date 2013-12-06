<?php
$fromType = get_class($model);
$modalId = "addrelation-" . strtolower($fromType) . "-" . strtolower($toType) . "-modal";
$allItems = ($toType == '') ? true : false;
$this->beginWidget('bootstrap.widgets.TbModal', array('id' => $modalId));
?>
    <script>
        $(document).ready(function () {
            // Enables checkbox click from whole tr row:
            $('#<?php echo $modalId; ?>').on('click', 'td', function(e){
                var cb = $(this).parent().find('input').get(0);
                if(e.target != cb)
                {
                    $('.modal input[type=checkbox]').attr('checked', false);
                    cb.checked = !cb.checked;
                }
            });
            // Handle enter press for "create new":
            $('.modal input[name=newitemtitle]').keypress(function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $('.modal input[name=create-new]').trigger('click');
                    return false;
                }
            });
            // Function for making sure only 1 checkbox is marked:
            $('.modal input[type=checkbox]').change(function () {
                $('.modal input[type=checkbox]').attr('checked', false);
                this.checked = true;
            });
        });
        function getMyData() {
            setInput($("input[name='modalGrid']:checked").val());
        }
        function setInput(v) {
            if (typeof v == 'object') {
                //1. Append new <option>
                $("select[name='<?php echo $fromType; ?>[<?php echo $inputId; ?>]']").append("<option value='" + v.id + "' selected='selected'>" + v.title + "</option>");
            }
            else {
                // Select <option> that has the same value as the checkbox
                $("input[name='<?php echo $fromType; ?>[<?php echo $inputId; ?>]'], select[name='<?php echo $fromType; ?>[<?php echo $inputId; ?>]']").val(v);
            }
            relationComplete();
        }
        function relationComplete() {
            $('.modal button.close').trigger('click');
        }
    </script>

    <div class="modal-header">
        <button type="button" class="close" data-toggle="modal" data-target="#<?php echo $modalId; ?>">×</button>
        <h3><?php echo Yii::t(
                'crud',
                '{model}',
                array('{model}' => Yii::t('crud', 'Choose ' . $toLabel . ' to add'))
            ); ?></h3>
    </div>
    <div class="modal-body">
        <?php
        $allRelated = new GoItem('search');
        $allRelated->unsetAttributes();
        $allRelated->setAttribute("model_class",$toType);
        if (isset($_GET["GoItem"])) {
            $allRelated->attributes = $_GET["GoItem"];
        }
        $dataProvider = $allRelated->search();
        $this->widget(
            'bootstrap.widgets.TbExtendedGridView',
            array(
                'filter' => $allRelated,
                'id' => strtolower($toType) . 's_to_add',
                'type' => 'striped bordered',
                'dataProvider' => $dataProvider,
                'pager' => array(
                    'class' => 'TbPager',
                    'displayFirstAndLast' => true,
                ),
                'columns' => array(
                    array(
                        'header' => Yii::t('app', 'Select'),
                        'filter' => false,
                        'value' => function ($data) {
                                echo CHtml::checkBox("modalGrid", null, array("value" => $data->id));
                            }
                    ),
                    'id',
                    array(
                        'name' => 'itemLabel',
                        'filter' => false,
                    ),
                    array(
                        'name' => '_title',
                        'header' => Yii::t('app', 'Title in source language'),
                    ),
                )
            )
        );
        ?>
    </div>
    <div class="modal-footer">
        <div class="btn-group">
            <?php
            echo CHtml::ajaxSubmitButton(
                Yii::t('model', 'Choose selected'),
                array("addEdges", "id" => $model->id),
                array(
                    'data' => 'js:getMyData()',
                    'type' => 'POST',
                    'success' => 'function(html){ }'
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
            echo CHtml::ajaxButton(
                Yii::t("model", "Create new " . $toLabel),
                array(
                    "/" . $toType . "/add/",
                ),
                array(
                    'data' => 'js:{
                                "newitemtitle":$("input[name=newitemtitle]").val(),
                                "from_node_id":"' . $model->node_id . '",
                            }',
                    'type' => 'POST',
                    'success' => 'function(data) { setInput(data); }',
                ),
                array(
                    'class' => 'btn btn-primary',
                    'name' => 'create-new',
                )
            );
            ?>
            <input type="text" name="newitemtitle" class="span6" placeholder="<?php echo Yii::t(
                "model",
                "Optional title"
            ); ?>">

        </div>
        <div class="btn-group">
            <a href="#" class="btn" data - toggle = "modal" data - target = "#<?php echo $modalId; ?>"
            ><?php print Yii::t(
                'app',
                'Close'
            );
            ?></a>
        </div>
    </div>

<?php
$this->endWidget();
?>