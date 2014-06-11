<?php

/**
 * This is the model base class for the table "account".
 *
 * Columns in table "account" available as properties of the model:
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property integer $superuser
 * @property integer $status
 * @property string $create_at
 * @property string $lastvisit_at
 *
 * Relations of table "account" available as properties of the model:
 * @property Changeset[] $changesets
 * @property Chapter[] $chapters
 * @property Comment[] $comments
 * @property DataArticle[] $dataArticles
 * @property DataSource[] $dataSources
 * @property DownloadLink[] $downloadLinks
 * @property ExamQuestion[] $examQuestions
 * @property ExamQuestionAlternative[] $examQuestionAlternatives
 * @property Exercise[] $exercises
 * @property GroupHasAccount[] $groupHasAccounts
 * @property GuiSection[] $guiSections
 * @property HtmlChunk[] $htmlChunks
 * @property I18nCatalog[] $i18nCatalogs
 * @property Menu[] $menus
 * @property Page[] $pages
 * @property Profile $profile
 * @property Section[] $sections
 * @property SlideshowFile[] $slideshowFiles
 * @property Snapshot[] $snapshots
 * @property SpreadsheetFile[] $spreadsheetFiles
 * @property TextDoc[] $textDocs
 * @property Tool[] $tools
 * @property VectorGraphic[] $vectorGraphics
 * @property VideoFile[] $videoFiles
 * @property Waffle[] $waffles
 * @property WaffleCategory[] $waffleCategories
 * @property WaffleCategoryThing[] $waffleCategoryThings
 * @property WaffleDataSource[] $waffleDataSources
 * @property WaffleIndicator[] $waffleIndicators
 * @property WafflePublisher[] $wafflePublishers
 * @property WaffleTag[] $waffleTags
 * @property WaffleUnit[] $waffleUnits
 */
abstract class BaseAccount extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'account';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('username, password, email, activkey, superuser, status, lastvisit_at', 'default', 'setOnEmpty' => true, 'value' => null),
                array('superuser, status', 'numerical', 'integerOnly' => true),
                array('username', 'length', 'max' => 20),
                array('password, email, activkey', 'length', 'max' => 128),
                array('lastvisit_at', 'safe'),
                array('id, username, password, email, activkey, superuser, status, create_at, lastvisit_at', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->username;
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
                'changesets' => array(self::HAS_MANY, 'Changeset', 'user_id'),
                'chapters' => array(self::HAS_MANY, 'Chapter', 'owner_id'),
                'comments' => array(self::HAS_MANY, 'Comment', 'author_user_id'),
                'dataArticles' => array(self::HAS_MANY, 'DataArticle', 'owner_id'),
                'dataSources' => array(self::HAS_MANY, 'DataSource', 'owner_id'),
                'downloadLinks' => array(self::HAS_MANY, 'DownloadLink', 'owner_id'),
                'examQuestions' => array(self::HAS_MANY, 'ExamQuestion', 'owner_id'),
                'examQuestionAlternatives' => array(self::HAS_MANY, 'ExamQuestionAlternative', 'owner_id'),
                'exercises' => array(self::HAS_MANY, 'Exercise', 'owner_id'),
                'groupHasAccounts' => array(self::HAS_MANY, 'GroupHasAccount', 'account_id'),
                'guiSections' => array(self::HAS_MANY, 'GuiSection', 'owner_id'),
                'htmlChunks' => array(self::HAS_MANY, 'HtmlChunk', 'owner_id'),
                'i18nCatalogs' => array(self::HAS_MANY, 'I18nCatalog', 'owner_id'),
                'menus' => array(self::HAS_MANY, 'Menu', 'owner_id'),
                'pages' => array(self::HAS_MANY, 'Page', 'owner_id'),
                'profile' => array(self::HAS_ONE, 'Profile', 'user_id'),
                'sections' => array(self::HAS_MANY, 'Section', 'owner_id'),
                'slideshowFiles' => array(self::HAS_MANY, 'SlideshowFile', 'owner_id'),
                'snapshots' => array(self::HAS_MANY, 'Snapshot', 'owner_id'),
                'spreadsheetFiles' => array(self::HAS_MANY, 'SpreadsheetFile', 'owner_id'),
                'textDocs' => array(self::HAS_MANY, 'TextDoc', 'owner_id'),
                'tools' => array(self::HAS_MANY, 'Tool', 'owner_id'),
                'vectorGraphics' => array(self::HAS_MANY, 'VectorGraphic', 'owner_id'),
                'videoFiles' => array(self::HAS_MANY, 'VideoFile', 'owner_id'),
                'waffles' => array(self::HAS_MANY, 'Waffle', 'owner_id'),
                'waffleCategories' => array(self::HAS_MANY, 'WaffleCategory', 'owner_id'),
                'waffleCategoryThings' => array(self::HAS_MANY, 'WaffleCategoryThing', 'owner_id'),
                'waffleDataSources' => array(self::HAS_MANY, 'WaffleDataSource', 'owner_id'),
                'waffleIndicators' => array(self::HAS_MANY, 'WaffleIndicator', 'owner_id'),
                'wafflePublishers' => array(self::HAS_MANY, 'WafflePublisher', 'owner_id'),
                'waffleTags' => array(self::HAS_MANY, 'WaffleTag', 'owner_id'),
                'waffleUnits' => array(self::HAS_MANY, 'WaffleUnit', 'owner_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'username' => Yii::t('model', 'Username'),
            'password' => Yii::t('model', 'Password'),
            'email' => Yii::t('model', 'Email'),
            'activkey' => Yii::t('model', 'Activkey'),
            'superuser' => Yii::t('model', 'Superuser'),
            'status' => Yii::t('model', 'Status'),
            'create_at' => Yii::t('model', 'Create At'),
            'lastvisit_at' => Yii::t('model', 'Lastvisit At'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.username', $this->username, true);
        $criteria->compare('t.password', $this->password, true);
        $criteria->compare('t.email', $this->email, true);
        $criteria->compare('t.activkey', $this->activkey, true);
        $criteria->compare('t.superuser', $this->superuser);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('t.create_at', $this->create_at, true);
        $criteria->compare('t.lastvisit_at', $this->lastvisit_at, true);


        return $criteria;

    }

}
