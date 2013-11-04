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
                        "icon" => "icon-pencil" . ($this->action->id == "draft" ? " icon-white" : null),
                        "url" => array("draft", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("crud", "Prepare for preshow"),
                        "type" => $this->action->id == "prepPreshow" ? "inverse" : null,
                        "icon" => "icon-edit" . ($this->action->id == "" ? " icon-white" : null),
                        "url" => array("prepPreshow", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("crud", "Evaluate"),
                        "type" => $this->action->id == "evaluate" ? "inverse" : null,
                        "icon" => "icon-comment" . ($this->action->id == "evaluate" ? " icon-white" : null),
                        "url" => array("evaluate", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("crud", "Prepare for publishing"),
                        "type" => $this->action->id == "prepPublish" ? "inverse" : null,
                        "icon" => "icon-edit" . ($this->action->id == "prepPublish" ? " icon-white" : null),
                        "url" => array("prepPublish", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Review"),
                        "type" => $this->action->id == "review" ? "inverse" : null,
                        "icon" => "icon-check" . ($this->action->id == "review" ? " icon-white" : null),
                        "url" => array("review", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Proofread"),
                        "type" => $this->action->id == "proofRead" ? "inverse" : null,
                        "icon" => "icon-certificate" . ($this->action->id == "proofRead" ? " icon-white" : null),
                        "url" => array("proofRead", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Translate"),
                        "type" => $this->action->id == "translate" ? "inverse" : null,
                        "icon" => "icon-globe" . ($this->action->id == "translate" ? " icon-white" : null),
                        "url" => array("translate", "id" => $model->{$model->tableSchema->primaryKey})
                    ));

                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Publish"),
                        "type" => $this->action->id == "publish" ? "inverse" : null,
                        "icon" => "icon-thumbs-up" . ($this->action->id == "publish" ? " icon-white" : null),
                        "url" => array("publish", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Edit"),
                        "type" => $this->action->id == "edit" ? "inverse" : null,
                        "icon" => "icon-edit" . ($this->action->id == "edit" ? " icon-white" : null),
                        "url" => array("edit", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Clone"),
                        "type" => $this->action->id == "clone" ? "inverse" : null,
                        "icon" => "icon-plus" . ($this->action->id == "clone" ? " icon-white" : null),
                        "url" => array("clone", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Remove"),
                        "type" => $this->action->id == "remove" ? "inverse" : null,
                        "icon" => "icon-eye-close" . ($this->action->id == "remove" ? " icon-white" : null),
                        "url" => array("remove", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Replace"),
                        "type" => $this->action->id == "replace" ? "inverse" : null,
                        "icon" => "icon-random" . ($this->action->id == "replace" ? " icon-white" : null),
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
                        'items' => array(array('label' => 'outEdges - Edge', 'url' => array('//edge/admin')), array('label' => 'outNodes - Node', 'url' => array('//node/admin')), array('label' => 'inEdges - Edge', 'url' => array('//edge/admin')), array('label' => 'inNodes - Node', 'url' => array('//node/admin')), array('label' => 'chapterQaStateIdEn - ChapterQaState', 'url' => array('//chapterQaState/admin')), array('label' => 'chapterQaStateIdCn - ChapterQaState', 'url' => array('//chapterQaState/admin')), array('label' => 'chapterQaStateIdDe - ChapterQaState', 'url' => array('//chapterQaState/admin')), array('label' => 'chapterQaStateIdEs - ChapterQaState', 'url' => array('//chapterQaState/admin')), array('label' => 'chapterQaStateIdFa - ChapterQaState', 'url' => array('//chapterQaState/admin')), array('label' => 'chapterQaStateIdHi - ChapterQaState', 'url' => array('//chapterQaState/admin')), array('label' => 'chapterQaStateIdPt - ChapterQaState', 'url' => array('//chapterQaState/admin')), array('label' => 'chapterQaStateIdSv - ChapterQaState', 'url' => array('//chapterQaState/admin')), array('label' => 'clonedFrom - Chapter', 'url' => array('//chapter/admin')), array('label' => 'chapters - Chapter', 'url' => array('//chapter/admin')), array('label' => 'node - Node', 'url' => array('//node/admin')), array('label' => 'thumbnailMedia - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'videos - VideoFile', 'url' => array('//videoFile/admin')), array('label' => 'exercises - Exercise', 'url' => array('//exercise/admin')), array('label' => 'snapshots - Snapshot', 'url' => array('//snapshot/admin'))
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