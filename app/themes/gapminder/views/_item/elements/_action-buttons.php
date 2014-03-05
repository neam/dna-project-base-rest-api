<div class="action-buttons">
    <div class="btn-group">
        <?php

        /*
        if (!$model->qaState()->draft_saved) {
            $this->widget("\TbButton", array(
                "label" => Yii::t("crud", "Prepare to save"),
                'color' => $this->action->id == "draft" ? "inverse" : null,
                "icon" => "glyphicon-pencil" . ($this->action->id == "draft" ? " icon-white" : null),
                "url" => array("draft", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model))
            ));
        }
        */
        if (!$model->qaState()->previewing_welcome) {
            $this->widget("\TbButton", array(
                "label" => Yii::t("crud", "Prepare for testing"),
                'color' => $this->action->id == "prepPreshow" ? "inverse" : null,
                "icon" => "glyphicon-pencil" . ($this->action->id == "" ? " icon-white" : null),
                "url" => array("prepPreshow", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model)),
                "visible" => Yii::app()->user->checkAccess('Item.PrepPreshow'),
            ));
        }
        if (!$model->qaState()->allow_publish) {
            $this->widget("\TbButton", array(
                "label" => Yii::t("crud", "Prepare for publishing"),
                'color' => $this->action->id == "prepPublish" ? "inverse" : null,
                "icon" => "glyphicon-pencil" . ($this->action->id == "prepPublish" ? " icon-white" : null),
                "url" => array("prepPublish", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model)),
                "visible" => Yii::app()->user->checkAccess('Item.PrepPublish'),
            ));
        }

        ?>
    </div>
    <div class="btn-group">
        <?php

        $this->widget("\TbButton", array(
            "label" => Yii::t("crud", "Evaluate"),
            'color' => $this->action->id == "evaluate" ? "inverse" : null,
            "icon" => "glyphicon-comment" . ($this->action->id == "evaluate" ? " icon-white" : null),
            "url" => array("evaluate", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model)),
            "visible" => Yii::app()->user->checkAccess('Item.Evaluate'),
        ));
        $this->widget("\TbButton", array(
            "label" => Yii::t("model", "Review"),
            'color' => $this->action->id == "review" ? "inverse" : null,
            "icon" => "glyphicon-check" . ($this->action->id == "review" ? " icon-white" : null),
            "url" => array("review", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Review'),
        ));
        $this->widget("\TbButton", array(
            "label" => Yii::t("model", "Proofread"),
            'color' => $this->action->id == "proofRead" ? "inverse" : null,
            "icon" => "glyphicon-certificate" . ($this->action->id == "proofRead" ? " icon-white" : null),
            "url" => array("proofRead", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Proofread'),
        ));
        $this->widget("\TbButton", array(
            "label" => Yii::t("model", "Translate"),
            'color' => $this->action->id == "translationOverview" ? "inverse" : null,
            "icon" => "glyphicon-globe" . ($this->action->id == "translationOverview" ? " icon-white" : null),
            "url" => array("translationOverview", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Translate'),
        ));

        ?>
    </div>
    <div class="btn-group">
        <?php

        // TODO: Make Group-dependent
        if (false) {
            $this->widget("\TbButton", array(
                "label" => Yii::t("model", "Unpublish"),
                "icon" => "glyphicon-thumbs-down",
                "url" => array("unpublish", "id" => $model->{$model->tableSchema->primaryKey}),
                "visible" => Yii::app()->user->checkAccess('Item.Publish'),
            ));
        } elseif ($model->qaStateBehavior()->validStatus('publishable')) {
            $this->widget("\TbButton", array(
                "label" => Yii::t("model", "Publish"),
                "icon" => "glyphicon-thumbs-up",
                "url" => array("publish", "id" => $model->{$model->tableSchema->primaryKey}),
                "visible" => Yii::app()->user->checkAccess('Item.Publish'),
            ));
        } else {
            $this->widget("\TbButton", array(
                "label" => Yii::t("model", "Publish"),
                "disabled" => true,
                "icon" => "glyphicon-thumbs-up",
                "visible" => Yii::app()->user->checkAccess('Item.Publish'),
            ));
        }

        ?>
    </div>
    <div class="btn-group">
        <?php

        $this->widget("\TbButton", array(
            "label" => Yii::t("model", "Clone"),
            'color' => $this->action->id == "clone" ? "inverse" : null,
            "icon" => "glyphicon-plus" . ($this->action->id == "clone" ? " icon-white" : null),
            "url" => array("clone", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Clone'),
        ));
        $this->widget("\TbButton", array(
            "label" => Yii::t("model", "Remove"),
            'color' => $this->action->id == "remove" ? "inverse" : null,
            "icon" => "glyphicon-eye-close" . ($this->action->id == "remove" ? " icon-white" : null),
            "url" => array("remove", "id" => $model->{$model->tableSchema->primaryKey}),
            "visible" => Yii::app()->user->checkAccess('Item.Remove'),
        ));

        ?>
    </div>
</div>