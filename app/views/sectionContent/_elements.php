<div class="row">
	<div class="span8"> <!-- main inputs -->


		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'section',
			'fields' => 'title_en',
			'allowEmpty' => false,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'processed_media_id', $input);
		?>

		<?php
		$formId = 'section-content-section_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Section'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/section/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SectionContent_section_id',
			'model' => new Section,
			'pk' => 'id',
			'field' => 'title_en',
		));
		$this->endClip();
		?>


		<?php echo $form->textFieldRow($model, 'ordinal'); ?>

		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'htmlChunk',
			'fields' => 'markup_en',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'processed_media_id', $input);
		?>

		<?php
		$formId = 'section-content-html_chunk_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Html Chunk'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/htmlChunk/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SectionContent_html_chunk_id',
			'model' => new HtmlChunk,
			'pk' => 'id',
			'field' => 'markup_en',
		));
		$this->endClip();
		?>


		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'vizView',
			'fields' => 'title_en',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'processed_media_id', $input);
		?>

		<?php
		$formId = 'section-content-viz_view_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Viz View'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/vizView/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SectionContent_viz_view_id',
			'model' => new VizView,
			'pk' => 'id',
			'field' => 'title_en',
		));
		$this->endClip();
		?>


		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'videoFile',
			'fields' => 'title_en',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'processed_media_id', $input);
		?>

		<?php
		$formId = 'section-content-video_file_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Video File'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/videoFile/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SectionContent_video_file_id',
			'model' => new VideoFile,
			'pk' => 'id',
			'field' => 'title_en',
		));
		$this->endClip();
		?>


		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'teachersGuide',
			'fields' => 'title_en',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'processed_media_id', $input);
		?>

		<?php
		$formId = 'section-content-teachers_guide_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Teachers Guide'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/teachersGuide/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SectionContent_teachers_guide_id',
			'model' => new TeachersGuide,
			'pk' => 'id',
			'field' => 'title_en',
		));
		$this->endClip();
		?>


		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'exercise',
			'fields' => 'title_en',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'processed_media_id', $input);
		?>

		<?php
		$formId = 'section-content-exercise_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Exercise'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/exercise/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SectionContent_exercise_id',
			'model' => new Exercise,
			'pk' => 'id',
			'field' => 'title_en',
		));
		$this->endClip();
		?>


		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'presentation',
			'fields' => 'title_en',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'processed_media_id', $input);
		?>

		<?php
		$formId = 'section-content-presentation_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Presentation'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/presentation/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SectionContent_presentation_id',
			'model' => new Presentation,
			'pk' => 'id',
			'field' => 'title_en',
		));
		$this->endClip();
		?>


		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'dataChunk',
			'fields' => 'title_en',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'processed_media_id', $input);
		?>

		<?php
		$formId = 'section-content-data_chunk_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Data Chunk'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/dataChunk/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SectionContent_data_chunk_id',
			'model' => new DataChunk,
			'pk' => 'id',
			'field' => 'title_en',
		));
		$this->endClip();
		?>


		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'downloadLink',
			'fields' => 'title_en',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'processed_media_id', $input);
		?>

		<?php
		$formId = 'section-content-download_link_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Download Link'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/downloadLink/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SectionContent_download_link_id',
			'model' => new DownloadLink,
			'pk' => 'id',
			'field' => 'title_en',
		));
		$this->endClip();
		?>

	</div> <!-- main inputs -->


	<div class="span4"> <!-- sub inputs -->

	</div> <!-- sub inputs -->
</div>
