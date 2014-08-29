<?php

// auto-loading
Yii::setPathOfAlias('Group', dirname(__FILE__));
Yii::import('Group.*');

class Group extends BaseGroup
{
    // System groups
    const SYSTEM = 'System';

    // Project groups
    const GAPMINDER_ORG = 'GapminderOrg';
    const SCHOOL = 'School';
    const DOLLAR_STREET = 'DollarStreet';
    const HUMAN_NUMBERS = 'HumanNumbers';
    const IGNORANCE_PROJECT = 'IgnoranceProject';

    // Topic groups
    const GAPMINDER_INTERNAL = 'GapminderInternal';
    const GAPMINDER_GLOBAL = 'GapminderGlobal';
    const GAPMINDER_SVERIGE = 'GapminderSverige';
    const GAPMINDER_ESPANA_SALUD = 'GapminderEspanaSalud';
    const GAPMINDER_ESPANA_BARCELONA = 'GapminderEspanaBarcelona';
    const GAPMINDER_UNITED_KINGDOM = 'GapminderUnitedKingdom';
    const GAPMINDER_RUSSIA = 'GapminderRussia';
    const GAPMINDER_STATEMINDER = 'GapminderStateminder';
    const GAPMINDER_NORGE = 'GapminderNorge';
    const SNEAK_PEEKS = 'SneakPeeks';

    // Skill groups
    const TRANSLATORS = 'Translators';
    const REVIEWERS = 'Reviewers';
    const PROOFREADERS = 'Proofreaders';
    const DEVELOPERS = 'Developers';

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
        return parent::getItemLabel();
    }

    public function relations()
    {
        return array_merge(
            array(
                'memberCount' => array(
                    self::STAT,
                    'GroupHasAccount',
                    'group_id',
                    'select' => 'COUNT( DISTINCT t.account_id )', // In case account has many roles in group
                ),
            ),
            parent::relations()
        );
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

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

}
