<?php

/**
 * This is the model base class for the table "comment".
 *
 * Columns in table "comment" available as properties of the model:
 * @property string $id
 * @property integer $author_user_id
 * @property string $parent_id
 * @property string $_comment
 * @property string $context_model
 * @property string $context_id
 * @property string $context_attribute
 * @property string $context_translate_into
 * @property string $created
 * @property string $modified
 *
 * Relations of table "comment" available as properties of the model:
 * @property Comment $parent
 * @property Comment[] $comments
 * @property Account $authorUser
 */
abstract class BaseComment extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'comment';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('author_user_id', 'required'),
                array('parent_id, _comment, context_model, context_id, context_attribute, context_translate_into, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('author_user_id', 'numerical', 'integerOnly' => true),
                array('parent_id, context_id', 'length', 'max' => 20),
                array('context_model, context_attribute', 'length', 'max' => 255),
                array('context_translate_into', 'length', 'max' => 10),
                array('_comment, created, modified', 'safe'),
                array('id, author_user_id, parent_id, _comment, context_model, context_id, context_attribute, context_translate_into, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->parent_id;
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
                'parent' => array(self::BELONGS_TO, 'Comment', 'parent_id'),
                'comments' => array(self::HAS_MANY, 'Comment', 'parent_id'),
                'authorUser' => array(self::BELONGS_TO, 'Account', 'author_user_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'author_user_id' => Yii::t('model', 'Author User'),
            'parent_id' => Yii::t('model', 'Parent'),
            '_comment' => Yii::t('model', 'Comment'),
            'context_model' => Yii::t('model', 'Context Model'),
            'context_id' => Yii::t('model', 'Context'),
            'context_attribute' => Yii::t('model', 'Context Attribute'),
            'context_translate_into' => Yii::t('model', 'Context Translate Into'),
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
        $criteria->compare('t.author_user_id', $this->author_user_id);
        $criteria->compare('t.parent_id', $this->parent_id);
        $criteria->compare('t._comment', $this->_comment, true);
        $criteria->compare('t.context_model', $this->context_model, true);
        $criteria->compare('t.context_id', $this->context_id, true);
        $criteria->compare('t.context_attribute', $this->context_attribute, true);
        $criteria->compare('t.context_translate_into', $this->context_translate_into, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);


        return $criteria;

    }

}
