<?php

// auto-loading
Yii::setPathOfAlias('WordFile', dirname(__FILE__));
Yii::import('WordFile.*');

class WordFile extends BaseWordFile
{

	// Add your model-specific methods here. This file will not be overriden by gtc except you force it.
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function init()
	{
		return parent::init();
	}

	public function get_label()
	{
		return (string) $this->title;
	}

	public function behaviors()
	{
		return array_merge(
		    parent::behaviors(), array(
		));
	}

	public function rules()
	{
		return array_merge(
		    parent::rules()
		    /* , array(
		      array('column1, column2', 'rule1'),
		      array('column3', 'rule2'),
		      ) */
		);
	}

}