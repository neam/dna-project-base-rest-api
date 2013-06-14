<h2>Chapters in progress:</h2>

<?php if (empty($chaptersInProgress)): ?>
	No chapters in progress
<?php else: ?>
	<ul>
		<?php foreach ($chaptersInProgress as $page): ?>

			<li>
				<?php echo CHtml::link($page->title, array('page/view', 'id' => $page->id), array('class' => '')); ?>
			</li>

		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<h2>Country pages:</h2>

<?php if (empty($countryPages)): ?>
	No country pages
<?php else: ?>
	<ul>
		<?php foreach ($countryPages as $page): ?>

			<li>
				<?php echo CHtml::link($page->title, array('page/view', 'id' => $page->id), array('class' => '')); ?>
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
