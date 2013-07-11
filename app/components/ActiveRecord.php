<?php

class ActiveRecord extends CActiveRecord
{

	public function behaviors()
	{

		$behaviors = array();

		$behaviors['CTimestampBehavior'] = array(
			'class' => 'zii.behaviors.CTimestampBehavior',
			'createAttribute' => 'created',
			'updateAttribute' => 'modified',
		);

		// List of model attributes to translate
		$translateMap = array(
			'Chapter' => array('slug', 'title'),
			'DataChunk' => array('title'),
			'DataSource' => array('title'),
			'DownloadLink' => array('title'),
			'Exercise' => array('title'),
			'HtmlChunk' => array('markup'),
			'Presentation' => array('title'),
			'Section' => array('slug', 'title', 'menu_label'),
			'SlideshowFile' => array('title'/* , 'processed_media_id' */),
			'SpreadsheetFile' => array('title'/* , 'processed_media_id' */),
			'TeachersGuide' => array('title'),
			'VideoFile' => array('title'/* , 'processed_media_id' */),
			'VizView' => array('title'),
			'WordFile' => array('title'/* , 'processed_media_id' */),
		);

		if (isset($translateMap[get_class($this)]))
		{
			$behaviors['i18n-columns'] = array(
				'class' => 'I18nColumnsBehavior',
				'translationAttributes' => $translateMap[get_class($this)],
			);
		}

		return array_merge(parent::behaviors(), $behaviors);
	}

}