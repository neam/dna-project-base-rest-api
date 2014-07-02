<?php

/**
 * The followings are the available model relations:
 * @property Edge[] $outEdges
 * @property Node[] $outNodes
 * @property Edge[] $inEdges
 * @property Node[] $inNodes
 */
class ActiveRecord extends CActiveRecord
{

    // Hard code source language to en for now. TODO: Be able to choose and store source language
    public $source_language = 'en';

    public function behaviors()
    {
        $behaviors = array();

        if (!in_array(get_class($this), array("Workflow", "Profile", "Account", "AppRegistrationForm", "Message", "SourceMessage")) && strpos(get_class($this), "QaState") === false) {
            $behaviors['CTimestampBehavior'] = array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'modified',
            );
        }

        $qaModels = DataModel::qaModels();
        if (isset($qaModels[get_class($this)])) {
            $behaviors['qa-state'] = array(
                'class' => 'QaStateBehavior',
                'scenarios' => array(
                    'draft',
                    'reviewable',
                    'publishable',
                ),
            );
            foreach (LanguageHelper::getCodes() as $language) {
                $behaviors['qa-state']['scenarios'][] = 'translate_into_' . $language;
            }
            $behaviors['owner-behavior'] = array(
                'class' => 'OwnerBehavior',
            );
            $behaviors['RestrictedAccessBehavior'] = array(
                'class' => 'RestrictedAccessBehavior',
            );
        }

        $graphModels = DataModel::graphModels();
        if (isset($graphModels[get_class($this)])) {
            $behaviors['relational-graph-db'] = array(
                'class' => 'RelationalGraphDbBehavior',
            );
            $behaviors['relatedNodesBehavior'] = array(
                'class' => 'app.behaviors.RelatedNodesBehavior',
            );
        }

        $restModels = DataModel::restModels();
        if (isset($restModels[get_class($this)])) {
            $behaviors['rest-model-behavior'] = array(
                'class' => 'WRestModelBehavior',
            );
        }

        // List of model attributes to translate using yii-i18n-attribute-messages
        $i18nAttributeMessages = DataModel::i18nAttributeMessages();
        $i18nAttributeMessagesMap = $i18nAttributeMessages['attributes'];

        if (isset($i18nAttributeMessagesMap[get_class($this)])) {
            $behaviors['i18n-attribute-messages'] = array(
                'class' => 'I18nAttributeMessagesBehavior',
                'translationAttributes' => $i18nAttributeMessagesMap[get_class($this)],
                'languageSuffixes' => LanguageHelper::getCodes(),
                'behaviorKey' => 'i18n-attribute-messages',
                'displayedMessageSourceComponent' => 'displayedMessages',
                'editedMessageSourceComponent' => 'editedMessages',
            );
        }

        // List of model attributes and relations to make multilingual using yii-i18n-columns
        $i18nColumns = DataModel::i18nColumns();

        $i18nColumnsMap = $i18nColumns['attributes'];
        $i18nColumnsMultilingualRelationsMap = $i18nColumns['relations'];

        if (isset($i18nColumnsMap[get_class($this)])) {
            $behaviors['i18n-columns'] = array(
                'class' => 'I18nColumnsBehavior',
                'translationAttributes' => $i18nColumnsMap[get_class($this)],
            );
        }

        if (isset($i18nColumnsMultilingualRelationsMap[get_class($this)])) {
            $behaviors['i18n-columns']['multilingualRelations'] = $i18nColumnsMultilingualRelationsMap[get_class($this)];
        }

        return array_merge(parent::behaviors(), $behaviors);
    }

    /**
     * Ensures node relation
     * @return Node
     */
    public function node()
    {

        if (is_null($this->node_id)) {
            $node = new Node();
            $node->save();
            $this->node_id = $node->id;
            $this->save();
            $this->refresh();
        }

        return $this->node;

    }

    public function relations()
    {
        $relations = array();

        $graphModels = DataModel::graphModels();
        if (isset($graphModels[get_class($this)])) {
            $relations = array(
                'outEdges' => array(self::HAS_MANY, 'Edge', array('id' => 'from_node_id'), 'through' => 'node'),
                'outNodes' => array(self::HAS_MANY, 'Node', array('to_node_id' => 'id'), 'through' => 'outEdges'),
                'inEdges' => array(self::HAS_MANY, 'Edge', array('id' => 'to_node_id'), 'through' => 'node'),
                'inNodes' => array(self::HAS_MANY, 'Node', array('from_node_id' => 'id'), 'through' => 'inEdges'),
            );
        }

        return array_merge(
            parent::relations(),
            $relations
        );
    }

    public function attributeLabels()
    {
        return array();
    }

    public function attributeHints()
    {
        return array();
    }

    public function getAttributeHint($key)
    {
        $a = $this->attributeHints();
        if (isset($a[$key])) {
            return $a[$key];
        }
    }

    public function getModelLabel()
    {
        $labels = DataModel::modelLabels();
        return $labels[get_class($this)];
    }

    /**
     * Returns related P3Media records.
     * @param array|string|null $mimeType. null to skip mime-type check
     * @param string $type P3Media.type
     * @param boolean $getOwnedOnly only retrieves records where the user owns the file. Defaults to false.
     * @return P3Media[]
     */
    public function getP3Media($mimeType, $type = 'file', $getOwnedOnly = false)
    {
        $criteria = new CDbCriteria();

        if (is_array($mimeType)) {
            $criteria->addInCondition('mime_type', $mimeType);
        } elseif (is_string($mimeType)) {
            $criteria->addCondition('mime_type = :mimeType');
            $criteria->params[':mimeType'] = $mimeType;
        }

        $criteria->addCondition('t.type = :type');
        $criteria->limit = 100;
        $criteria->order = 't.created_at DESC';
        $criteria->params[':type'] = $type;
        if ($getOwnedOnly) {
            $criteria->addCondition('t.access_owner = :userId');
            $criteria->params[':userId'] = Yii::app()->user->id;
        }
        return P3Media::model()->findAll($criteria);
    }

    /**
     * Returns related P3Media options.
     * @param P3Media[] $data
     * @return array
     */
    public function getOptions($data)
    {
        return TbHtml::listData(
            $data,
            'id',
            'original_name'
        );
    }

    /**
     * Returns related thumbnail P3Media.
     * @return P3Media[]
     */
    public function getThumbnails()
    {
        return $this->getP3Media(array(
            'image/jpeg',
            'image/png',
        ));
    }

    /**
     * Returns related thumbnail options.
     * @return array
     */
    public function getThumbnailOptions()
    {
        return $this->getOptions($this->getThumbnails());
    }

    public function beforeRead()
    {
        // todo: use corr accessRestricted from behavior -> tests

        $tableAlias = $this->getTableAlias(false, false);

        $publicCriteria = new CDbCriteria();
        $publicCriteria->join = "LEFT JOIN `node_has_group` AS `nhg_public` ON (`$tableAlias`.`node_id` = `nhg_public`.`node_id` AND `nhg_public`.`group_id` = :current_project_group_id AND `nhg_public`.`visibility` = :visibility)";
        $publicCriteria->addCondition("(`nhg_public`.`id` IS NOT NULL)");
        $publicCriteria->params = array(
            ":current_project_group_id" => PermissionHelper::groupNameToId(Group::GAPMINDER_ORG), // TODO: Base on current domain
            ":visibility" => NodeHasGroup::VISIBILITY_VISIBLE,
        );

        $user = Yii::app()->user;

        if ($user->isAdmin()) {

            // All items
            return true;

        } elseif ($user->isGuest) {

            // Only public items
            return $publicCriteria;

        } else {

            $criteria = new CDbCriteria();

            $criteria->params[':account_id'] = $user->id;

            // Public items ...
            $criteria->mergeWith($publicCriteria, 'OR');

            // ... and own items
            $criteria->addCondition("`$tableAlias`.`owner_id` = :account_id", "OR");

            // ... and items within groups that the user is a member of
            $criteria->join .= "\n" . "LEFT JOIN (`node_has_group` AS `nhg` INNER JOIN `group_has_account` AS `gha` ON (`gha`.`group_id` = `nhg`.`group_id` AND `gha`.`account_id` = :account_id)) ON (`$tableAlias`.`node_id` = `nhg`.`node_id`) ";
            $criteria->addCondition("`nhg`.id IS NOT NULL AND (`nhg`.`visibility` = 'visible' OR `nhg`.`visibility` IS NULL)", "OR");

            return $criteria;
        }
    }
}
