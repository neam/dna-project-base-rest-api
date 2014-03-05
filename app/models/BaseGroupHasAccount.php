<?php

/**
 * This is the model base class for the table "group_has_account".
 *
 * Columns in table "group_has_account" available as properties of the model:
 * @property string $id
 * @property integer $account_id
 * @property string $group_id
 * @property string $role_id
 * @property string $created
 * @property string $modified
 *
 * Relations of table "group_has_account" available as properties of the model:
 * @property Account $account
 * @property Group $group
 * @property Role $role
 */
abstract class BaseGroupHasAccount extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'group_has_account';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('account_id, group_id, role_id', 'required'),
                array('created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('account_id', 'numerical', 'integerOnly' => true),
                array('group_id, role_id', 'length', 'max' => 20),
                array('created, modified', 'safe'),
                array('id, account_id, group_id, role_id, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->group_id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(), array(
                'account' => array(self::BELONGS_TO, 'Account', 'account_id'),
                'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
                'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'account_id' => Yii::t('model', 'Account'),
            'group_id' => Yii::t('model', 'Group'),
            'role_id' => Yii::t('model', 'Role'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.account_id', $this->account_id);
        $criteria->compare('t.group_id', $this->group_id);
        $criteria->compare('t.role_id', $this->role_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);


        return $criteria;

    }

}
