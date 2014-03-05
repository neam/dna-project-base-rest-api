<div class="btn-toolbar">
    <div class="btn-group">
        <?php
        switch ($this->action->id) {
        case "view":
            $this->widget("\TbButton", array(
                "label" => Yii::t("model", "Update"),
                "icon" => "glyphicon-edit",
                "url" => array("update", "id" => $model->{$model->tableSchema->primaryKey})
            ));
            $this->widget("\TbButton", array(
                "label" => Yii::t("model", "Delete"),
                "type" => "danger",
                "icon" => "glyphicon-remove icon-white",
                "htmlOptions" => array(
                    "submit" => array("delete", "id" => $model->{$model->tableSchema->primaryKey}, "returnUrl" => (Yii::app()->request->getParam("returnUrl")) ? Yii::app()->request->getParam("returnUrl") : $this->createUrl("admin")),
                    "confirm" => Yii::t("model", "Do you want to delete this item?"))
            ));
            break;
        default:
        if (isset($model)) {
            $this->widget("\TbButton", array(
                "label" => Yii::t("model", "Dashboard"),
                "icon" => "glyphicon-th-large" . ($this->action->id == "dashboard" ? " icon-white" : null),
                //"type" => $this->action->id == "dashboard" ? "inverse" : null,
                "url" => array("dashboard")
            ));
            /*
            $this->widget("\TbButton", array(
                "label" => Yii::t("model", "Translations"),
                "icon" => "glyphicon-globe" . ($this->action->id == "translations" ? " icon-white" : null),
                "type" => $this->action->id == "translations" ? "inverse" : null,
                "url" => array("translations")
            ));
            */
            $this->widget("\TbButton", array(
                "label" => Yii::t("model", "Profile"),
                "icon" => "glyphicon-user" . ($this->action->id == "profile" ? " icon-white" : null),
                //"type" => $this->action->id == "profile" ? "inverse" : null,
                "url" => array("profile")
            ));
            $this->widget("\TbButton", array(
                "label" => Yii::t("model", "History"),
                "icon" => "glyphicon-time" . ($this->action->id == "history" ? " icon-white" : null),
                //"type" => $this->action->id == "history" ? "inverse" : null,
                "url" => array("history")
            ));
        }
        if (Yii::app()->user->checkAccess("Super Administrator")) {
        ?>
    </div>
    <div class="btn-group">
        <?php
        $this->widget("\TbButton", array(
            "label" => Yii::t("model", "Users"),
            "icon" => "glyphicon-th-list" . ($this->action->id == "admin" ? " icon-white" : null),
            //"type" => $this->action->id == "admin" ? "inverse" : null,
            "url" => array("admin")
        ));
        }

        break;
        }
        ?>    </div>
</div>