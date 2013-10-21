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
                        'items' => array(array('label' => 'changesets - Changeset', 'url' => array('//changeset/admin')), array('label' => 'chapters - Chapter', 'url' => array('//chapter/admin')), array('label' => 'dataChunks - DataChunk', 'url' => array('//dataChunk/admin')), array('label' => 'dataSources - DataSource', 'url' => array('//dataSource/admin')), array('label' => 'downloadLinks - DownloadLink', 'url' => array('//downloadLink/admin')), array('label' => 'edges - Edge', 'url' => array('//edge/admin')), array('label' => 'edges1 - Edge', 'url' => array('//edge/admin')), array('label' => 'examQuestions - ExamQuestion', 'url' => array('//examQuestion/admin')), array('label' => 'examQuestions1 - ExamQuestion', 'url' => array('//examQuestion/admin')), array('label' => 'examQuestionAlternatives - ExamQuestionAlternative', 'url' => array('//examQuestionAlternative/admin')), array('label' => 'exercises - Exercise', 'url' => array('//exercise/admin')), array('label' => 'htmlChunks - HtmlChunk', 'url' => array('//htmlChunk/admin')), array('label' => 'poFiles - PoFile', 'url' => array('//poFile/admin')), array('label' => 'sections - Section', 'url' => array('//section/admin')), array('label' => 'sectionContents - SectionContent', 'url' => array('//sectionContent/admin')), array('label' => 'slideshowFiles - SlideshowFile', 'url' => array('//slideshowFile/admin')), array('label' => 'snapshots - Snapshot', 'url' => array('//snapshot/admin')), array('label' => 'spreadsheetFiles - SpreadsheetFile', 'url' => array('//spreadsheetFile/admin')), array('label' => 'teachersGuides - TeachersGuide', 'url' => array('//teachersGuide/admin')), array('label' => 'textDocs - TextDoc', 'url' => array('//textDoc/admin')), array('label' => 'tools - Tool', 'url' => array('//tool/admin')), array('label' => 'vectorGraphics - VectorGraphic', 'url' => array('//vectorGraphic/admin')), array('label' => 'videoFiles - VideoFile', 'url' => array('//videoFile/admin'))
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