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


		return array_merge(parent::behaviors(), $behaviors);
	}

}