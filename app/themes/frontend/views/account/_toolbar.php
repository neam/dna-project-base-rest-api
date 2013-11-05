<div class="btn-toolbar">
    <div class="btn-group">
        <?php
        switch ($this->action->id) {
            case "view":
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Update"),
                    "icon" => "icon-edit",
                    "url" => array("update", "id" => $model->{$model->tableSchema->primaryKey})
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
                        "label" => Yii::t("model", "Dashboard"),
                        "icon" => "icon-th-large" . ($this->action->id == "dashboard" ? " icon-white" : null),
                        "type" => $this->action->id == "dashboard" ? "inverse" : null,
                        "url" => array("dashboard")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Translations"),
                        "icon" => "icon-globe" . ($this->action->id == "translations" ? " icon-white" : null),
                        "type" => $this->action->id == "translations" ? "inverse" : null,
                        "url" => array("translations")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Profile"),
                        "icon" => "icon-user" . ($this->action->id == "profile" ? " icon-white" : null),
                        "type" => $this->action->id == "profile" ? "inverse" : null,
                        "url" => array("profile")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "History"),
                        "icon" => "icon-time" . ($this->action->id == "history" ? " icon-white" : null),
                        "type" => $this->action->id == "history" ? "inverse" : null,
                        "url" => array("history")
                    ));
                }
                break;
        }
        ?>    </div>
</div>