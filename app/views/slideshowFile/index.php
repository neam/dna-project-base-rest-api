<?php
$this->breadcrumbs['Slideshow Files'] = array('index');
$this->breadcrumbs[] = Yii::t('app', 'Index');

if (!isset($this->menu) || $this->menu === array())
	$this->menu = array(
		array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
		array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
	);
?>

<h1>Slideshow Files</h1>

<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
));
?>
