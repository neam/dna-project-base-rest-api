<?php

// auto-loading
Yii::setPathOfAlias('Changeset', dirname(__FILE__));
Yii::import('Changeset.*');

class Changeset extends BaseChangeset
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

    public function getItemLabel()
    {
        return "Changeset #" . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
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

    protected function afterSave()
    {
        parent::afterSave();

        // if this is a new change set
        if ($this->getIsNewRecord()) {
            // todo: move this to mandrill component once implemented.
            // then find all users who have access to this node and let them know if they are needed to take action.
            // for now, only translators are handled.
            $rows = Yii::app()->getDb()->createCommand()
                ->select('*')
                ->from('account')
                ->join('profile', '`profile`.`user_id` = `account`.`id`')
                ->join('group_has_account', '`group_has_account`.`account_id` = `account`.`id`')
                ->join('group', '`group`.`id` = `group_has_account`.`group_id`')
                ->join('node_has_group', '`node_has_group`.`group_id` = `group`.`id`')
                ->where('`node_has_group`.`node_id` = :nodeId AND (`profile`.`language1` IS NOT NULL OR `profile`.`language2` IS NOT NULL OR `profile`.`language3` IS NOT NULL)')
                ->group('account.id, group.id')
                ->bindValue(':nodeId', $this->node_id)
                ->queryAll();
            if (!empty($rows) && $this->node) {
                $decodedContents = json_decode($this->contents, true);
                if (is_array($decodedContents)) {
                    $emailData = array();
                    foreach ($rows as $row) {
                        if (isset($row['title']) && $row['title'] === Group::TRANSLATORS) {
                            foreach (array($row['language1'], $row['language2'], $row['language3']) as $language) {
                                $languageProgressKey = "translate_into_{$language}_validation_progress";
                                if ($language !== null
                                    && isset($decodedContents['after'][$languageProgressKey])
                                    && (int)$decodedContents['after'][$languageProgressKey] !== 100)
                                {
                                    // todo: this probably needs refactoring after mandrill integration is done
                                    $emailData[Group::TRANSLATORS][] = array(
                                        'email' => $row['email'],
                                        'title' => '', // todo get the translatable items title; $this->node->item()->title
                                        'link' => '', // todo: link to the translatable item workflow in correct language
                                    );
                                }
                            }
                        }
                    }

                    // todo: send stuff to mandrill
                }
            }
        }
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

    /**
     * Returns the ActiveRecord instances of type $activeRecordClass which the user has ownership on.
     *
     * @param $userId the user-id of the user which changesets will be returned
     * @param $activeRecordClass
     * @return array|CActiveRecord[]
     */
    public function getOwn($userId, $activeRecordClass)
    {
        $criteria = $this->getOwnCriteria($userId);
        return ActiveRecord::model($activeRecordClass)->findAll($criteria);
    }

    public function getOwnCriteria($userId)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'node_id IN(SELECT node_id FROM changeset WHERE user_id = :userId)';
        $criteria->params = array(':userId' => $userId);
        return $criteria;
    }

}
