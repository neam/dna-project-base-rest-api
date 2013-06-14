<?php

/**
 * This is the model base class for the table "migration".
 *
 * Columns in table "migration" available as properties of the model:
 * @property string $version
 * @property integer $apply_time
 * @property string $module
 *
 * There are no model relations.
 */
abstract class BaseMigration extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'migration';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('version', 'required'),
			array('apply_time, module', 'default', 'setOnEmpty' => true, 'value' => null),
			array('apply_time', 'numerical', 'integerOnly'=>true),
			array('version', 'length', 'max'=>255),
			array('module', 'length', 'max'=>32),
			array('version, apply_time, module', 'safe', 'on'=>'search'),
		    )
		);
	}

	public function behaviors()
	{
		return array_merge(
		    parent::behaviors(), array(
			'savedRelated' => array(
				'class' => 'gii-template-collection.components.CSaveRelationsBehavior'
			)
		    )
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'version' => Yii::t('crud', 'Version'),
			'apply_time' => Yii::t('crud', 'Apply Time'),
			'module' => Yii::t('crud', 'Module'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.version', $this->version, true);
		$criteria->compare('t.apply_time', $this->apply_time);
		$criteria->compare('t.module', $this->module, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
