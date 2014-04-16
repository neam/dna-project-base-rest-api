<?php

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
            foreach (Yii::app()->params["languages"] as $language => $label) {
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
                'languageSuffixes' => array_keys(Yii::app()->params["languages"]),
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
     * @param array $mimeType
     * @param string $type P3Media.type
     * @param boolean $getOwnedOnly only retrieves records where the user owns the file. Defaults to false.
     * @return P3Media[]
     */
    public function getP3Media(array $mimeType, $type = 'file', $getOwnedOnly = false)
    {
        $criteria = new CDbCriteria();
        $criteria->addInCondition('mime_type', $mimeType);
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

    public function beforeRead()
    {

        // todo: use corr accessRestricted from behavior -> tests

        $user = Yii::app()->user;
        $table = $this->getTableAlias();

        if ($user->isAdmin()) {
            return true; // no restriction for administrators
        } elseif ($user->isGuest) {

            $criteria = new CDbCriteria();
            $criteria->join = "LEFT JOIN `node_has_group` AS `nhg` ON (`t`.`node_id` = `nhg`.`node_id` AND `nhg`.`group_id` = :current_project_group_id)";
            $criteria->addCondition("(`nhg`.`visibility` = :visibility)");
            $criteria->params = array(
                ":current_project_group_id" => Group::GAPMINDER_ORG, // TODO: Base on current domain
                ":visibility" => NodeHasGroup::VISIBILITY_VISIBLE,
            );

            return $criteria;

        } else {

            $criteria = new CDbCriteria();

            // Restrict access based on the account id.
            $criteria->addCondition("`t`.`owner_id` = :account_id");
            $criteria->params[':account_id'] = $user->id;

            return $criteria;

            //
            die("TODO");
            return $this->accessCriteria();

            if ($user->checkAccess('organizationAdmin')) {
                $userRecord = User::model()->findByPk(Yii::app()->user->id);

                // Admins in an organisation are allowed to see all users from that organisation
                return array(
                    'condition' => "$table.organisation_id = :organisation",
                    'params' => array(':organisation' => $userRecord->organisation_id),
                );
            } else {
                // All other users can only query their own user record
                return array(
                    'condition' => "$table.user_id = :id",
                    'params' => array(':id' => Yii::app()->user->id),
                );
            }
        }
    }

}
