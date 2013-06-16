<?php

// auto-loading
Yii::setPathOfAlias('PageAssociation', dirname(__FILE__));
Yii::import('PageAssociation.*');

class PageAssociation extends BasePageAssociation
{

	public $label;

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
		if (!is_null($this->header_id))
		{
			return $this->header->title;
		}

		return (string) "Empty Association #".$this->ordinal;
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
