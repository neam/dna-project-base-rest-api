<div class="btn-toolbar">
    <div class="btn-group">
        <?php

        /*
        if (!$model->qaState()->draft_saved) {
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("crud", "Prepare to save"),
                "type" => $this->action->id == "draft" ? "inverse" : null,
                "icon" => "icon-pencil" . ($this->action->id == "draft" ? " icon-white" : null),
                "url" => array("draft", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model))
            ));
        }
        */
        if (!$model->qaState()->previewing_welcome) {
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("crud", "Prepare for testing"),
                "type" => $this->action->id == "prepPreshow" ? "inverse" : null,
                "icon" => "icon-pencil" . ($this->action->id == "" ? " icon-white" : null),
                "url" => array("prepPreshow", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model)),
                "visible" => Yii::app()->user->checkAccess('Item.PrepPreshow'),
            ));
        }
        if (!$model->qaState()->candidate_for_public_status) {
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("crud", "Prepare for publishing"),
                "type" => $this->action->id == "prepPublish" ? "inverse" : null,
                "icon" => "icon-pencil" . ($this->action->id == "prepPublish" ? " icon-white" : null),
                "url" => array("prepPublish", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model)),
                "visible" => Yii::app()->user->checkAccess('Item.PrepPublish'),
            ));
        }

        ?>
    </div>
    <div class="btn-group">
        <?php

        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("crud", "Evaluate"),
            "type" => $this->action->id == "evaluate" ? "inverse" : null,
            "icon" => "icon-comment" . ($this->action->id == "evaluate" ? " icon-white" : null),
            "url" => array("evaluate", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model)),
            "visible" => Yii::app()->user->checkAccess('Item.Evaluate'),
        ));
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Review"),
            "type" => $this->action->id == "review" ? "inverse" : null,
            "icon" => "icon-check" . ($this->action->id == "review" ? " icon-white" : null),
            "url" => array("review", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Review'),
        ));
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Proofread"),
            "type" => $this->action->id == "proofRead" ? "inverse" : null,
            "icon" => "icon-certificate" . ($this->action->id == "proofRead" ? " icon-white" : null),
            "url" => array("proofRead", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Proofread'),
        ));
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Translate"),
            "type" => $this->action->id == "translationOverview" ? "inverse" : null,
            "icon" => "icon-globe" . ($this->action->id == "translationOverview" ? " icon-white" : null),
            "url" => array("translationOverview", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Translate'),
        ));

        ?>
    </div>
    <div class="btn-group">
        <?php

        if (in_array($model->qaState()->status, array("public"))) {
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Unpublish"),
                "icon" => "icon-thumbs-down",
                "url" => array("unpublish", "id" => $model->{$model->tableSchema->primaryKey}),
                "visible" => Yii::app()->user->checkAccess('Item.Publish'),
            ));
        } elseif ($model->qaStateBehavior()->validStatus('public')) {
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Publish"),
                "icon" => "icon-thumbs-up",
                "url" => array("publish", "id" => $model->{$model->tableSchema->primaryKey}),
                "visible" => Yii::app()->user->checkAccess('Item.Publish'),
            ));
        } else {
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Publish"),
                "disabled" => true,
                "icon" => "icon-thumbs-up",
                "visible" => Yii::app()->user->checkAccess('Item.Publish'),
            ));
        }

        ?>
    </div>
    <div class="btn-group">
        <?php

        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Clone"),
            "type" => $this->action->id == "clone" ? "inverse" : null,
            "icon" => "icon-plus" . ($this->action->id == "clone" ? " icon-white" : null),
            "url" => array("clone", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Clone'),
        ));
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Remove"),
            "type" => $this->action->id == "remove" ? "inverse" : null,
            "icon" => "icon-eye-close" . ($this->action->id == "remove" ? " icon-white" : null),
            "url" => array("remove", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Remove'),
        ));
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Replace"),
            "type" => $this->action->id == "replace" ? "inverse" : null,
            "icon" => "icon-random" . ($this->action->id == "replace" ? " icon-white" : null),
            "url" => array("replace", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Replace'),
        ));

        ?>
    </div>
</div>