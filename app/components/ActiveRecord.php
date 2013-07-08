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
			'Section' => array('slug', 'title'),
			'Chapter' => array('slug', 'title'),
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