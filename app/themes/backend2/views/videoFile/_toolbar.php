<div class="btn-toolbar">
    <div class="btn-group">
        <?php
        switch ($this->action->id) {
            case "create":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "icon-list-alt",
                    "url" => array("admin")
                ));
                break;
            case "admin":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Add"),
                    "icon" => "icon-plus",
                    "url" => array("add")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Create"),
                    "icon" => "icon-plus",
                    "url" => array("create")
                ));
                break;
            case "view":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "icon-list-alt",
                    "url" => array("admin")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Edit"),
                    "icon" => "icon-edit",
                    "url" => array("continueAuthoring", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Update"),
                    "icon" => "icon-edit",
                    "url" => array("update", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Create"),
                    "icon" => "icon-plus",
                    "url" => array("create")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Delete"),
                    "type" => "danger",
                    "icon" => "icon-remove icon-white",
                    "htmlOptions" => array(
                        "submit" => array("delete", "id" => $model->{$model->tableSchema->primaryKey}, "returnUrl" => (Yii::app()->request->getParam("returnUrl")) ? Yii::app()->request->getParam("returnUrl") : $this->createUrl("admin")),
                        "confirm" => Yii::t("model", "Do you want to delete this item?"))
                ));
                break;
            case "update":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "icon-list-alt",
                    "url" => array("admin")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "View"),
                    "icon" => "icon-eye-open",
                    "url" => array("view", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Delete"),
                    "type" => "danger",
                    "icon" => "icon-remove icon-white",
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
                'icon' => 'icon-search',
                'htmlOptions' => array('class' => 'search-button')
            ));?>
        </div>


        <div class="btn-group">
            <?php
            $this->widget('\TbButtonGroup', array(
                'buttons' => array(
                    array(
                        'label' => Yii::t('model', 'Relations'),
                        'icon' => 'icon-search',
                        'items' => array(array('label' => 'outEdges - Edge', 'url' => array('//edge/admin')), array('label' => 'outNodes - Node', 'url' => array('//node/admin')), array('label' => 'inEdges - Edge', 'url' => array('//edge/admin')), array('label' => 'inNodes - Node', 'url' => array('//node/admin')), array('label' => 'sectionContents - SectionContent', 'url' => array('//sectionContent/admin')), array('label' => 'node - Node', 'url' => array('//node/admin')), array('label' => 'originalMedia - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdEn - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdAr - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdBg - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdCa - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdCs - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdDa - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdDe - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdEl - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdEnGb - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdEnUs - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdEs - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdFi - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdFil - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdFr - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdHi - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdHr - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdHu - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaId - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdIt - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdIw - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdJa - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdKo - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdLt - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdLv - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdNl - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdNo - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdPl - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdPt - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdPtBr - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdPtPt - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdRo - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdRu - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdSk - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdSl - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdSr - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdSv - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdTh - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdTr - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdUk - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdVi - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdZh - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdZhCn - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdZhTw - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'thumbnailMedia - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'subtitlesImportMedia - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'owner - Users', 'url' => array('//users/admin')), array('label' => 'clonedFrom - VideoFile', 'url' => array('//videoFile/admin')), array('label' => 'videoFiles - VideoFile', 'url' => array('//videoFile/admin')), array('label' => 'videoFileQaState - VideoFileQaState', 'url' => array('//videoFileQaState/admin')), array('label' => 'related - Node', 'url' => array('//node/admin'))
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