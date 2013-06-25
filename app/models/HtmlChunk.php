<?php

// auto-loading
Yii::setPathOfAlias('HtmlChunk', dirname(__FILE__));
Yii::import('HtmlChunk.*');

class HtmlChunk extends BaseHtmlChunk
{

	public $markup_en;
	public $markup_de;
	public $markup_foo;

	// Add your model-specific methods here. This file will not be overriden by gtc except you force it.
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function init()
	{
		return parent::init();
	}

	public function get_label() {
		return (string) $this->markup;

	}

	public function behaviors()
	{
		return array_merge(
			parent::behaviors(),
			array(
            ));
	}


	public function rules()
	{
		return array_merge(
		    parent::rules()
            /*, array(
			array('column1, column2', 'rule1'),
			array('column3', 'rule2'),
		    )*/
		);
	}

}