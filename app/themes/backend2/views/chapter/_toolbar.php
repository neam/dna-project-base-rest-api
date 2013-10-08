<div class="btn-toolbar">
    <div class="btn-group">
        <?php
        switch ($this->action->id) {
            case "create":
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "icon-list-alt",
                    "url" => array("admin")
                ));
                break;
            case "admin":
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Add"),
                    "icon" => "icon-plus",
                    "url" => array("add")
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Create"),
                    "icon" => "icon-plus",
                    "url" => array("create")
                ));
                break;
            case "view":
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "icon-list-alt",
                    "url" => array("admin")
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Edit"),
                    "icon" => "icon-edit",
                    "url" => array("continueAuthoring", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Update"),
                    "icon" => "icon-edit",
                    "url" => array("update", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Create"),
                    "icon" => "icon-plus",
                    "url" => array("create")
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Delete"),
                    "type" => "danger",
                    "icon" => "icon-remove icon-white",
                    "htmlOptions" => array(
                        "submit" => array("delete", "id" => $model->{$model->tableSchema->primaryKey}, "returnUrl" => (Yii::app()->request->getParam("returnUrl")) ? Yii::app()->request->getParam("returnUrl") : $this->createUrl("admin")),
                        "confirm" => Yii::t("model", "Do you want to delete this item?"))
                ));
                break;
            case "update":
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "icon-list-alt",
                    "url" => array("admin")
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "View"),
                    "icon" => "icon-eye-open",
                    "url" => array("view", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Delete"),
                    "type" => "danger",
                    "icon" => "icon-remove icon-white",
                    "htmlOptions" => array(
                        "submit" => array("delete", "id" => $model->{$model->tableSchema->primaryKey}, "returnUrl" => (Yii::app()->request->getParam("returnUrl")) ? Yii::app()->request->getParam("returnUrl") : $this->createUrl("admin")),
                        "confirm" => Yii::t("model", "Do you want to delete this item?"))
                ));
                break;
            default:
                if (isset($model)) {
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("crud", "Draft"),
                        "type" => $this->action->id == "draft" ? "inverse" : null,
                        "icon" => "icon-pencil",
                        "url" => array("draft", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("crud", "Prepare for preshow"),
                        "type" => $this->action->id == "prepPreshow" ? "inverse" : null,
                        "icon" => "icon-edit",
                        "url" => array("prepPreshow", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("crud", "Evaluate"),
                        "type" => $this->action->id == "evaluate" ? "inverse" : null,
                        "icon" => "icon-comment",
                        "url" => array("evaluate", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("crud", "Prepare for publishing"),
                        "type" => $this->action->id == "prepPublish" ? "inverse" : null,
                        "icon" => "icon-edit",
                        "url" => array("prepPublish", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Review"),
                        "type" => $this->action->id == "review" ? "inverse" : null,
                        "icon" => "icon-check",
                        "url" => array("review", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Proofread"),
                        "type" => $this->action->id == "proofRead" ? "inverse" : null,
                        "icon" => "icon-certificate",
                        "url" => array("proofRead", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Translate"),
                        "type" => $this->action->id == "translate" ? "inverse" : null,
                        "icon" => "icon-globe",
                        "url" => array("translate", "id" => $model->{$model->tableSchema->primaryKey})
                    ));

                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Publish"),
                        "type" => $this->action->id == "publish" ? "inverse" : null,
                        "icon" => "icon-thumbs-up",
                        "url" => array("publish", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Edit"),
                        "type" => $this->action->id == "edit" ? "inverse" : null,
                        "icon" => "icon-edit",
                        "url" => array("edit", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Clone"),
                        "type" => $this->action->id == "clone" ? "inverse" : null,
                        "icon" => "icon-plus",
                        "url" => array("clone", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Remove"),
                        "type" => $this->action->id == "remove" ? "inverse" : null,
                        "icon" => "icon-eye-close",
                        "url" => array("remove", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Replace"),
                        "type" => $this->action->id == "replace" ? "inverse" : null,
                        "icon" => "icon-random",
                        "url" => array("replace", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                }
        }
        ?>    </div>
    <?php if ($this->action->id == 'admin'): ?>
        <div class="btn-group">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Yii::t('model', 'Search'),
                'icon' => 'icon-search',
                'htmlOptions' => array('class' => 'search-button')
            ));?>
        </div>


        <div class="btn-group">
            <?php
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                'buttons' => array(
                    array(
                        'label' => Yii::t('model', 'Relations'),
                        'icon' => 'icon-search',
                        'items' => array(array('label' => 'clonedFrom - Chapter', 'url' => array('//chapter/admin')), array('label' => 'chapters - Chapter', 'url' => array('//chapter/admin')), array('label' => 'authoringWorkflowExecutionIdEn - Execution', 'url' => array('//execution/admin')), array('label' => 'authoringWorkflowExecutionIdCn - Execution', 'url' => array('//execution/admin')), array('label' => 'authoringWorkflowExecutionIdDe - Execution', 'url' => array('//execution/admin')), array('label' => 'authoringWorkflowExecutionIdEs - Execution', 'url' => array('//execution/admin')), array('label' => 'authoringWorkflowExecutionIdFa - Execution', 'url' => array('//execution/admin')), array('label' => 'authoringWorkflowExecutionIdHi - Execution', 'url' => array('//execution/admin')), array('label' => 'authoringWorkflowExecutionIdPt - Execution', 'url' => array('//execution/admin')), array('label' => 'authoringWorkflowExecutionIdSv - Execution', 'url' => array('//execution/admin')), array('label' => 'thumbnailMedia - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'sections - Section', 'url' => array('//section/admin'))
                        )
                    ),
                ),
            ));
            ?>        </div>


    <?php endif; ?></div>

<?php if ($this->action->id == 'admin'): ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
<?php endif; ?>