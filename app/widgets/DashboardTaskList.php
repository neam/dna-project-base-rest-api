<?php

class DashboardTaskList extends CWidget
{
    const TYPE_STARTED = 'started';
    const TYPE_NEW = 'new';

    /**
     * @var string|null the type of tasks to show, i.e. "started" or "new".
     */
    public $type;

    /**
     * @var Account|null the user account for which to show the task list.
     */
    public $account;

    /**
     * @var array options for the container div element.
     */
    public $htmlOptions = array();

    /**
     * @var CSqlDataProvider|null the data provider containing the tasks to show.
     */
    protected $dataProvider;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (empty($this->account) || !($this->account instanceof Account)) {
            throw new CException('Property "account" is of invalid type.');
        }
        switch ($this->type) {
            case self::TYPE_STARTED:
                $this->dataProvider = $this->createStartedTaskDataProvider();
                break;

            case self::TYPE_NEW:
                $this->dataProvider = $this->createNewTaskDataProvider();
                break;

            default:
                throw new CException(sprintf('Invalid type "%s".', $this->type));
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::openTag('div', $this->htmlOptions);
        $this->render('_list');
        echo Html::closeTag('div');
    }

    /**
     * Returns the task item model based on class name and id.
     * @param array $data the task data.
     * @return ActiveRecord the model.
     */
    public function getTaskModel($data)
    {
        return ActiveRecord::model($data['model_class'])->findByPk((int)$data['id']);
    }

    /**
     * Creates a controller action URL based on the given action ID, model class, and model ID (optional).
     * @param string $action
     * @param array $data the task data.
     * @return string
     */
    public function createTaskUrl($action, $data)
    {
        $modelClass = lcfirst($data['model_class']);
        $route = "/$modelClass/$action";
        return isset($data['id'])
            ? Yii::app()->createUrl($route, array('id' => (int)$data['id']))
            : Yii::app()->createUrl($route);
    }

    /**
     * Creates and returns a SQL data provider for the accounts started tasks.
     * @return CSqlDataProvider the data provider.
     */
    protected function createStartedTaskDataProvider()
    {
        $queries = $this->buildStartedTranslationTaskQueries();
        return $this->createTaskDataProvider($queries);
    }

    /**
     * Creates and returns a SQL data provider for the accounts new tasks.
     * @return CSqlDataProvider the data provider.
     */
    protected function createNewTaskDataProvider()
    {
        $queries = $this->buildNewTranslationTaskQueries();
        return $this->createTaskDataProvider($queries);
    }

    /**
     * Builds a list of SQL queries to get the "started" translation task queries.
     * @return array the SQL queries.
     */
    protected function buildStartedTranslationTaskQueries()
    {
        $queries = array();
        $lang1 = $this->account->profile->language1;
        $lang2 = $this->account->profile->language2;
        $lang3 = $this->account->profile->language3;
        if ($lang1 !== null) {
            $queries[] = "SELECT
                            i.id as id,
                            i.model_class,
                            i._title,
                            'TranslateIntoPrimaryLanguage' AS action,
                            translate_into_{$lang1}_validation_progress AS progress,
                            '{$lang1}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id = :account_id
                          GROUP BY i.id";
        }
        if ($lang2 !== null) {
            $queries[] = "SELECT
                            i.id as id,
                            i.model_class,
                            i._title,
                            'TranslateIntoSecondaryLanguage' AS action,
                            translate_into_{$lang2}_validation_progress AS progress,
                            '{$lang2}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id = :account_id
                          GROUP BY i.id";
        }
        if ($lang3 !== null) {
            $queries[] = "SELECT
                            i.id as id,
                            i.model_class,
                            i._title,
                            'TranslateIntoTertiaryLanguage' AS action,
                            translate_into_{$lang3}_validation_progress AS progress,
                            '{$lang3}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id = :account_id
                          GROUP BY i.id";
        }
        return $queries;
    }

    /**
     * Builds a list of SQL queries to get the "new" translation task queries.
     * @return array the SQL queries.
     */
    protected function buildNewTranslationTaskQueries()
    {
        $queries = array();
        $lang1 = $this->account->profile->language1;
        $lang2 = $this->account->profile->language2;
        $lang3 = $this->account->profile->language3;
        if ($lang1 !== null) {
            $queries[] = "SELECT
                            i.id AS id,
                            i.model_class,
                            i._title,
                            'TranslateIntoPrimaryLanguage' AS action,
                            translate_into_{$lang1}_validation_progress AS progress,
                            '{$lang1}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item AS i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id != :account_id
                          GROUP BY i.id";
        }
        if ($lang2 !== null) {
            $queries[] = "SELECT
                            i.id AS id,
                            i.model_class,
                            i._title,
                            'TranslateIntoSecondaryLanguage' AS action,
                            translate_into_{$lang2}_validation_progress AS progress,
                            '{$lang2}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item AS i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id != :account_id
                          GROUP BY i.id";
        }
        if ($lang3 !== null) {
            $queries[] = "SELECT
                            i.id AS id,
                            i.model_class,
                            i._title,
                            'TranslateIntoTertiaryLanguage' AS action,
                            translate_into_{$lang3}_validation_progress AS progress,
                            '{$lang3}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item AS i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id != :account_id
                          GROUP BY i.id";
        }
        return $queries;
    }

    /**
     * Creates a SQL data provider out of the given queries.
     * @param array $queries the SQL queries to run.
     * @return CSqlDataProvider
     */
    protected function createTaskDataProvider(array $queries)
    {
        if (!empty($queries)) {
            $sql = implode("\nUNION ALL\n", $queries);
            $mainCommand = Yii::app()->db->createCommand("SELECT * FROM ({$sql}) AS dashboard_task");
            $countCommand = Yii::app()->db->createCommand("SELECT COUNT(*) FROM ({$sql}) AS dashboard_task");
        } else {
            $mainCommand = Yii::app()->db->createCommand('SELECT * FROM account AS dashboard_task WHERE 1 = 0');
            $countCommand = Yii::app()->db->createCommand('SELECT COUNT(*) FROM account AS dashboard_task WHERE 1 = 0');
        }
        $mainCommand->params = $countCommand->params = array(':account_id' => $this->account->id);
        return new CSqlDataProvider($mainCommand, array(
            'totalItemCount' => $countCommand->queryScalar(),
            'sort' => array(
                'attributes' => array(
                    'relevance, progress',
                ),
                'defaultOrder' => array(
                    'relevance, progress ASC',
                ),
            ),
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));
    }
} 