<?php
$this->breadcrumbs[Yii::t('crud', 'Pages')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Update');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Page') ?> <small><?php echo Yii::t('crud', 'Update') ?> #<?php echo $model->id ?></small></h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<h2>
	<?php echo Yii::t('crud', 'Editable Detail View') ?></h2>

<?php
$this->widget('EditableDetailView', array(
	'data' => $model,
	'url' => $this->createUrl('editableSaver'),
));
?>

<h2>
	<?php echo Yii::t('crud', 'Related PageAssociations') ?>
</h2>

<div class="btn-group">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons' => array(
			array('label' => Yii::t("crud", "Create"), 'icon' => 'icon-plus', 'url' => array('pageAssociation/create', 'PageAssociation' => array('page_id' => $model->{$model->tableSchema->primaryKey}))),
		),
	));
	?>
</div>

<?php
$new = new PageAssociation();

$this->widget('EditableDetailView', array(
	'data' => $new,
	'url' => $this->createUrl('pageAssociation/editableSaver'),
));
?>

<div id="msg" class="alert hide"></div>
<div style="text-align: center"><button id="save-btn" class="btn btn-primary">Save</button></div>

<?
if ($new->isNewRecord)
{
	Yii::app()->clientScript->registerScript('new-record', '
            $("#save-btn").click(function() {
                $(this).parent().parent().find(".editable").editable("submit", {
                    url: "' . $this->createUrl('pageAssociation/editableCreator') . '",
                    ajaxOptions: { dataType: "json" },
                    success: function(data, config) {
                        if(data && data.id) {
                            $(this).editable("option", "pk", data.id);
                            $(this).removeClass("editable-unsaved");
                            $("#msg").removeClass("alert-error").addClass("alert-success")
                                     .html("PageAssociation created! Now you can update it.").show();
                            $("#save-btn").hide();
                        } else {
                            config.error.call(this, data && data.errors ? data.errors : "Unknown error");
                        }
                    },
                    error: function(errors) {
                        var msg = "";
                        if(errors && errors.responseText) {
                            msg = errors.responseText;
                        } else {
                            $.each(errors, function(k, v) { msg += v+"<br>"; });
                        }
                        $("#msg").removeClass("alert-success").addClass("alert-error")
                                 .html(msg).show();
                     }
                });
            });
        ');
}
?>

<?php
$relatedSearchModel = $model->getRelatedSearchModel('pageAssociations');
$this->widget('TbGridView', array(
	'id' => 'page-association-grid',
	'dataProvider' => $relatedSearchModel->search(),
	'filter' => $relatedSearchModel,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
    /*
      'columns' => array(
      'id',
      array(
      'name' => 'label',
      'type' => 'raw',
      'value' => function($data) {
      return CHtml::link($data->get_label(), array('pageAssociation/update', 'id' => $data->id));
      },
      ),
      array(
      'class' => 'editable.EditableColumn',
      'name' => 'ordinal',
      'editable' => array(
      'url' => $this->createUrl('pageAssociation/editableSaver'),
      'placement' => 'right',
      )
      ),
      /*
      'created',
      'modified',
      array(
      'class' => 'editable.EditableColumn',
      'name' => 'viz_view_id',
      'editable' => array(
      'url' => $this->createUrl('pageAssociation/editableSaver'),
      'placement' => 'right',
      )
      ),
      array(
      'name' => 'viz_view_id',
      'value' => 'CHtml::value($data,\'vizView.title\')',
      'filter' => CHtml::listData(VizView::model()->findAll(), 'id', 'title'),
      ),
      array(
      'name'=>'video_file_id',
      'value'=>'CHtml::value($data,\'videoFile.title\')',
      'filter'=>CHtml::listData(VideoFile::model()->findAll(), 'id', 'title'),
      ),
      array(
      'name'=>'teachers_guide_id',
      'value'=>'CHtml::value($data,\'teachersGuide.title\')',
      'filter'=>CHtml::listData(TeachersGuide::model()->findAll(), 'id', 'title'),
      ),
      array(
      'name'=>'exercise_id',
      'value'=>'CHtml::value($data,\'exercise.title\')',
      'filter'=>CHtml::listData(Exercise::model()->findAll(), 'id', 'title'),
      ),
      array(
      'name'=>'presentation_id',
      'value'=>'CHtml::value($data,\'presentation.title\')',
      'filter'=>CHtml::listData(Presentation::model()->findAll(), 'id', 'title'),
      ),
      array(
      'name'=>'data_chunk_id',
      'value'=>'CHtml::value($data,\'dataChunk.title\')',
      'filter'=>CHtml::listData(DataChunk::model()->findAll(), 'id', 'title'),
      ),
      array(
      'name'=>'header_id',
      'value'=>'CHtml::value($data,\'header.title\')',
      'filter'=>CHtml::listData(Header::model()->findAll(), 'id', 'title'),
      ),
      array(
      'name'=>'p3_widget_id',
      'value'=>'CHtml::value($data,\'p3Widget.alias\')',
      'filter'=>CHtml::listData(P3Widget::model()->findAll(), 'id', 'alias'),
      ),
     * /
      array(
      'class' => 'TbButtonColumn',
      'viewButtonUrl' => "Yii::app()->controller->createUrl('pageAssociation/view', array('id' => \$data->id))",
      'updateButtonUrl' => "Yii::app()->controller->createUrl('pageAssociation/update', array('id' => \$data->id))",
      'deleteButtonUrl' => "Yii::app()->controller->createUrl('pageAssociation/delete', array('id' => \$data->id))",
      ),
      ), */
));
?>

<h2>
	<?php echo Yii::t('crud', 'Update Form') ?></h2>

<?php
$this->renderPartial('_form', array(
	'model' => $model));
?>