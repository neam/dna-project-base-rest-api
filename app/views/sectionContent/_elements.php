<div class="row">
	<div class="span8"> <!-- main inputs -->


		<?php
		echo $form->relationRow($model, 'section_id', array(
			'model' => $model,
			'relation' => 'section',
			'fields' => 'title',
			'allowEmpty' => false,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Section'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#section-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>


		<?php echo $form->textFieldRow($model, 'ordinal'); ?>

		<?php
		echo $form->relationRow($model, 'html_chunk_id', array(
			'model' => $model,
			'relation' => 'htmlChunk',
			'fields' => 'markup',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Html Chunk'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#html-chunk-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>


		<?php
		echo $form->relationRow($model, 'viz_view_id', array(
			'model' => $model,
			'relation' => 'vizView',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Viz View'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#viz-view-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>


		<?php
		echo $form->relationRow($model, 'video_file_id', array(
			'model' => $model,
			'relation' => 'videoFile',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Video File'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#video-file-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>


		<?php
		echo $form->relationRow($model, 'teachers_guide_id', array(
			'model' => $model,
			'relation' => 'teachersGuide',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Teachers Guide'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#teachers-guide-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>


		<?php
		echo $form->relationRow($model, 'exercise_id', array(
			'model' => $model,
			'relation' => 'exercise',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Exercise'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#exercise-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>


		<?php
		echo $form->relationRow($model, 'presentation_id', array(
			'model' => $model,
			'relation' => 'presentation',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Presentation'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#presentation-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>


		<?php
		echo $form->relationRow($model, 'data_chunk_id', array(
			'model' => $model,
			'relation' => 'dataChunk',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Data Chunk'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#data-chunk-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

	</div> <!-- main inputs -->


	<div class="span4"> <!-- sub inputs -->

	</div> <!-- sub inputs -->
</div>

<?php
$this->appendClip('modal_forms');
$this->renderPartial('/section/_modal_form', array(
	'inputSelector' => '#SectionContent_section_id',
	'model' => new Section,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
<?php
$this->appendClip('modal_forms');
$this->renderPartial('/vizView/_modal_form', array(
	'inputSelector' => '#SectionContent_viz_view_id',
	'model' => new VizView,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
<?php
$this->appendClip('modal_forms');
$this->renderPartial('/videoFile/_modal_form', array(
	'inputSelector' => '#SectionContent_video_file_id',
	'model' => new VideoFile,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
<?php
$this->appendClip('modal_forms');
$this->renderPartial('/teachersGuide/_modal_form', array(
	'inputSelector' => '#SectionContent_teachers_guide_id',
	'model' => new TeachersGuide,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
<?php
$this->appendClip('modal_forms');
$this->renderPartial('/exercise/_modal_form', array(
	'inputSelector' => '#SectionContent_exercise_id',
	'model' => new Exercise,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
<?php
$this->appendClip('modal_forms');
$this->renderPartial('/presentation/_modal_form', array(
	'inputSelector' => '#SectionContent_presentation_id',
	'model' => new Presentation,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
<?php
$this->appendClip('modal_forms');
$this->renderPartial('/dataChunk/_modal_form', array(
	'inputSelector' => '#SectionContent_data_chunk_id',
	'model' => new DataChunk,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
<?php
$this->appendClip('modal_forms');
$this->renderPartial('/htmlChunk/_modal_form', array(
	'inputSelector' => '#SectionContent_html_chunk_id',
	'model' => new HtmlChunk,
	'pk' => 'id',
	'field' => 'markup',
));
$this->endClip();
?>