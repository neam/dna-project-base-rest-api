<div class="btn-toolbar">
    <div class="btn-group">
        <?php
        switch ($this->action->id) {
            case "create":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "glyphicon-list-alt",
                    "url" => array("admin")
                ));
                break;
            case "admin":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Add"),
                    "icon" => "glyphicon-plus",
                    "url" => array("add")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Create"),
                    "icon" => "glyphicon-plus",
                    "url" => array("create")
                ));
                break;
            case "view":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "glyphicon-list-alt",
                    "url" => array("admin")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Edit"),
                    "icon" => "glyphicon-edit",
                    "url" => array("continueAuthoring", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Update"),
                    "icon" => "glyphicon-edit",
                    "url" => array("update", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Create"),
                    "icon" => "glyphicon-plus",
                    "url" => array("create")
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
            case "update":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "glyphicon-list-alt",
                    "url" => array("admin")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "View"),
                    "icon" => "glyphicon-eye-open",
                    "url" => array("view", "id" => $model->{$model->tableSchema->primaryKey})
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
        }
        ?>    </div>
    <?php if ($this->action->id == 'admin'): ?>
        <div class="btn-group">
            <?php
            $this->widget('\TbButton', array(
                'label' => Yii::t('model', 'Search'),
                'icon' => 'glyphicon-search',
                'htmlOptions' => array('class' => 'search-button')
            ));?>
        </div>


        <div class="btn-group">
            <?php
            $this->widget('\TbButtonGroup', array(
                'buttons' => array(
                    array(
                        'label' => Yii::t('model', 'Relations'),
                        'icon' => 'glyphicon-search',
                        'items' => array(array('label' => 'outEdges - Edge', 'url' => array('//edge/admin')), array('label' => 'outNodes - Node', 'url' => array('//node/admin')), array('label' => 'inEdges - Edge', 'url' => array('//edge/admin')), array('label' => 'inNodes - Node', 'url' => array('//node/admin')), array('label' => 'waffleQaState - WaffleQaState', 'url' => array('//waffleQaState/admin')), array('label' => 'clonedFrom - Waffle', 'url' => array('//waffle/admin')), array('label' => 'waffles - Waffle', 'url' => array('//waffle/admin')), array('label' => 'owner - Account', 'url' => array('//account/admin')), array('label' => 'node - Node', 'url' => array('//node/admin')), array('label' => 'jsonImportMedia - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'imageSmallMedia - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'imageLargeMedia - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'wafflePublisher - WafflePublisher', 'url' => array('//wafflePublisher/admin')), array('label' => 'waffleCategories - WaffleCategory', 'url' => array('//waffleCategory/admin')), array('label' => 'waffleDataSources - WaffleDataSource', 'url' => array('//waffleDataSource/admin')), array('label' => 'waffleIndicators - WaffleIndicator', 'url' => array('//waffleIndicator/admin')), array('label' => 'waffleTags - WaffleTag', 'url' => array('//waffleTag/admin')), array('label' => 'waffleUnits - WaffleUnit', 'url' => array('//waffleUnit/admin'))
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