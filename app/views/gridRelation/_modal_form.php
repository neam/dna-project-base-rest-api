<?php
$fromType = get_class($model);
$modalId = "addrelation-" . strtolower($fromType) . "-" . strtolower($toType) . "-modal";
$allItems = ($toType == '') ? true : false;
if ($allItems) {
    $toType = 'chapter';
} // Even if there's no specific type (related items), we need a specified controller to post to
$this->beginWidget('bootstrap.widgets.TbModal', array('id' => $modalId));
?>
    <script>
        var selectedType = null;
        $(document).ready(function () {
            // Enables checkbox click from whole tr row:
            $('#<?php echo $modalId; ?>').on('click', 'td', function(e){
                var cb = $(this).parent().find('input').get(0);
                if(e.target != cb)
                {
                    cb.checked = !cb.checked;
                }
            });
            // Set input value when clicking "Create new" relation, to the corresponding type
            $('.modal .add-allitems ul').on('click', 'a', function (e) {
                e.preventDefault();
                var selectedText = $(this).text();
                selectedType = selectedText;
                $(this).parents('.btn-group').find('.dropdown-toggle').html('New ' + selectedText + ' <span class="caret"></span>');
            });
            $('.modal input[name=newitemtitle]').keypress(function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $('.modal input[name=create-new]').trigger('click');
                    return false;
                }
            });
        });
        function getSelectedType() {
            return selectedType;
        }
        function getMyData() {
            var vals = new Array();
            $.each($("input[name='modalGrid']:checked"), function () {
                vals.push($(this).val());
            });
            var jsondata = ({'<?php echo $fromType; ?>': {'relation': '<?php echo $relation; ?>', 'fromId': '<?php echo $model->id; ?>', 'edges_to_add': vals}});
            return jsondata;
        }
        function relationComplete() {
            location.reload();
        }
    </script>

    <div class="modal-header">
        <button type="button" class="close" data-toggle="modal" data-target="#<?php echo $modalId; ?>">×</button>
        <h3><?php echo Yii::t('crud','{model}',array('{model}' => Yii::t('crud', 'Choose ' . $toLabel . ' to add'))); ?></h3>
    </div>
    <div class="modal-body">
        <?php
        $allRelated = new GoItem('search');
        $allRelated->unsetAttributes();
        if (!$allItems) {
            $allRelated->setAttribute("model_class",$toType);
        }
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
                                echo CHtml::checkBox("modalGrid", null, array("value" => $data->node_id));
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
                    //TODO: Visa bara om $allItems == true
                    array(
                        'name' => 'model_class',
                        'header' => Yii::t('app', 'Model class'),
                    ),
                )
            )
        );
        ?>
    </div>
    <div class="modal-footer">
        <div class="row">
            <?php if ($allItems): ?>
                <div class="btn-group span3">
                    <?php
                    echo CHtml::ajaxSubmitButton(
                        Yii::t('model', 'Add selected'),
                        array("addEdges", "id" => $model->id),
                        array(
                            'data' => 'js:getMyData()',
                            'type' => 'POST',
                            'success' => 'function(html){ relationComplete(); }'
                        ),
                        array(
                            'class' => 'btn btn-primary',
                            'name' => 'add-selected',
                        )
                    );
                    ?>
                </div>

                <div class="btn-group span9" style="float:right;">
                    <div class="input-group">
                        <?php
                        $items = array();
                        foreach (DataModel::qaModels() as $key => $qaModel) {
                            $items[] = array('label' => $key, 'url' => '#');
                        }
                        $this->widget('bootstrap.widgets.TbButtonGroup',
                            array(
                                'htmlOptions' => array(
                                    'class' => 'add-allitems',
                                ),
                                'buttons' => array(
                                    array(
                                        'label' => 'New',
                                        'items' => $items,
                                    )
                                )
                            )
                        );
                        ?>
                        <input type="text" name="newitemtitle" class="span5" placeholder="<?php echo Yii::t(
                            "model",
                            "Optional title"
                        ); ?>">
                        <?php
                        echo CHtml::ajaxButton(
                            Yii::t("model", "Create"),
                            array(
                                "/" . $toType . "/add/",
                            ),
                            array(
                                'data' => 'js:{
                                            "newitemtitle":$("input[name=newitemtitle]").val(),
                                            "relation":"' . $relation . '",
                                            "toType":getSelectedType(),
                                            "from_node_id":"' . $model->node_id . '",
                                            "addEdge":"true",
                                        }',
                                'type' => 'POST',
                                'success' => 'function(html){ relationComplete(); }'
                            ),
                            array(
                                'class' => 'btn btn-primary small',
                                'name' => 'create-new',
                            )
                        );
                        ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="btn-group span3">
                    <?php
                    echo CHtml::ajaxSubmitButton(
                        Yii::t('model', 'Add selected'),
                        array("addEdges", "id" => $model->id),
                        array(
                            'data' => 'js:getMyData()',
                            'type' => 'POST',
                            'success' => 'function(html){ relationComplete(); }'
                        ),
                        array(
                            'class' => 'btn btn-primary',
                            'name' => 'add-selected',
                        )
                    );
                    ?>
                </div>
                <div class="btn-group span8" style="float:right;">
                    <div class="input-group">
                        <?php
                        $this->widget('bootstrap.widgets.TbButtonGroup',
                            array(
                                'htmlOptions' => array(
                                    'class' => 'add-allitems',
                                ),
                                'buttons' => array(
                                    array(
                                        'label' => 'New ' . $toType,
                                        'items' => null,
                                    )
                                )
                            )
                        );
                        ?>
                        <input type="text" name="newitemtitle" class="span5" placeholder="<?php echo Yii::t(
                            "model",
                            "Optional title"
                        ); ?>">
                        <?php
                        echo CHtml::ajaxButton(
                            Yii::t("model", "Create"),
                            array(
                                "/" . $toType . "/add/",
                            ),
                            array(
                                'data' => 'js:{
                                    "newitemtitle":$("input[name=newitemtitle]").val(),
                                    "relation":"' . $relation . '",
                                    "from_node_id":"' . $model->node_id . '",
                                    "addEdge":"true",
                                }',
                                'type' => 'POST',
                                'success' => 'function(html){ relationComplete(); }'
                            ),
                            array(
                                'class' => 'btn btn-primary',
                                'name' => 'create-new',
                            )
                        );
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="btn-group" style="margin-top:8px;">
                <a href="#" class="btn" data-toggle="modal" data-target="#<?php echo $modalId; ?>"><?php print Yii::t(
                        'app',
                        'Close'
                    );
                    ?></a>
            </div>
        </div>
    </div>

<?php
$this->endWidget();
?>