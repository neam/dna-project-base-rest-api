<?php

/**
 * This is the model base class for the table "html_chunk".
 *
 * Columns in table "html_chunk" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $_markup
 * @property string $created
 * @property string $modified
 * @property integer $owner_id
 * @property string $node_id
 * @property string $html_chunk_qa_state_id
 *
 * Relations of table "html_chunk" available as properties of the model:
 * @property HtmlChunk $clonedFrom
 * @property HtmlChunk[] $htmlChunks
 * @property Node $node
 * @property Users $owner
 * @property HtmlChunkQaState $htmlChunkQaState
 * @property SectionContent[] $sectionContents
 */
abstract class BaseHtmlChunk extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'html_chunk';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, _markup, created, modified, owner_id, node_id, html_chunk_qa_state_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, owner_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id, html_chunk_qa_state_id', 'length', 'max' => 20),
                array('_markup, created, modified', 'safe'),
                array('id, version, cloned_from_id, _markup, created, modified, owner_id, node_id, html_chunk_qa_state_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->cloned_from_id;
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
                'clonedFrom' => array(self::BELONGS_TO, 'HtmlChunk', 'cloned_from_id'),
                'htmlChunks' => array(self::HAS_MANY, 'HtmlChunk', 'cloned_from_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
                'htmlChunkQaState' => array(self::BELONGS_TO, 'HtmlChunkQaState', 'html_chunk_qa_state_id'),
                'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'html_chunk_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            '_markup' => Yii::t('model', 'Markup'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'owner_id' => Yii::t('model', 'Owner'),
            'node_id' => Yii::t('model', 'Node'),
            'html_chunk_qa_state_id' => Yii::t('model', 'Html Chunk Qa State'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t._markup', $this->_markup, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.owner_id', $this->owner_id);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.html_chunk_qa_state_id', $this->html_chunk_qa_state_id);


        return $criteria;

    }

}
