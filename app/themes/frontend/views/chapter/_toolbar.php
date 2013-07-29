<div class="btn-toolbar">
    <div class="btn-group">
        <?php  ?><?php
        switch ($this->action->id) {
            case "index":
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("crud", "Manage"),
                    "icon" => "icon-list-alt",
                    "url" => array("chapter/admin")
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("crud", "Create"),
                    "icon" => "icon-plus",
                    "url" => array("chapter/create")
                ));
                break;
        }
        ?>
    </div>
</div>