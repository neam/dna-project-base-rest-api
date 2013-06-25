<h2>Chapters in progress:</h2>
<div class="admin-container show">
	<?php $this->renderPartial("/chapter/_toolbar", array("model" => new Chapter)); ?>
</div>

<?php if (empty($chaptersInProgress)): ?>
	No chapters in progress
<?php else: ?>
	<ul>
		<?php foreach ($chaptersInProgress as $chapter): ?>

			<li>
				<?php echo CHtml::link($chapter->title, array('chapter/view', 'id' => $chapter->id), array('class' => '')); ?>
			</li>

		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<hr>

<?php
$snippet = Yii::getPathOfAlias('i18n.' . Yii::app()->language) . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "about_gs_" . Yii::app()->language . ".html";
if (is_file($snippet))
{
	include($snippet);
} else
{
	echo "No translation yet for " . Yii::app()->language;
}
?>
