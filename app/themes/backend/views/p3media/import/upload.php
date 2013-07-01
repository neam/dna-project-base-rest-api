<?php
if ($this->layout !== "//layouts/popup") {
	$this->renderPartial('vendor.phundament.p3media.views.import.upload');
	return;
}
?>

<ol>
	<li>
		<?php echo Yii::t('app', 'Drag & drop the file you wish to upload or use the select button below'); ?>
	</li>
	<li>
		<?php echo Yii::t('app', 'Click Start upload'); ?>
	</li>
	<li>
		<?php echo Yii::t('app', 'When upload has been completed, click Save to return to the previous form'); ?>
	</li>
</ol>

<style type="text/css">
	/* Some CSS hacks to clarify upload form */
	#fileupload form {
		margin-bottom: 0;
	}
	.fileupload-content {
		min-height: 100px;
	}
	td.progress {
		min-width: 100px;
	}
	.container {
		margin: 0;
		width: 100%;
	}
	body {
		margin: 0;
		padding-top: 0;
		padding-bottom: 60px;
	}
</style>

<?php
$this->widget('jquery-file-upload-widget.EFileUpload');
?>
