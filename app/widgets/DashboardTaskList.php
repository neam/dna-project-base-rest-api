<?php

/**
 * Widget for showing "tasks" on the dashboard.
 * There are two types of tasks, "started" and "new". The "started" tasks are ones that the logged in user has edited
 * in some way, e.g. has created a video file. The "new" tasks are ones that the logged user as access to view, but has
 * not edited, e.g. another user with the same role as the logged in user has created a new video file.
 *
 * Usage in view file:
 *
 * $this->widget(
 *     'app.widgets.DashboardTaskList',
 *     array(
 *         'type' => DashboardTaskList::TYPE_STARTED, // the type of tasks to show.
 *         'account' => $model, // the account model for the logged in user.
 *     )
 * );
 */
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
     * @var array map of all available task query builder component class names.
     */
    static protected $queryBuilderComponents = array(
        'DashboardGroupTranslatorTaskQueryBuilder'
    );

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (empty($this->account) || !($this->account instanceof Account)) {
            throw new CException('Property "account" is of invalid type.');
        }
        if ($this->type !== self::TYPE_STARTED && $this->type !== self::TYPE_NEW) {
            throw new CException(sprintf('Invalid type "%s".', $this->type));
        }
        $this->dataProvider = $this->createDataProvider();
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
     *
     * @param array $data the task data.
     *
     * @return ActiveRecord the model.
     */
    public function getTaskModel($data)
    {
        return ActiveRecord::model($data['model_class'])->findByPk((int)$data['id']);
    }

    /**
     * Creates a controller action URL based on the given action ID, model class, and model ID (optional).
     *
     * @param string $action
     * @param array $data the task data.
     *
     * @return string
     */
    public function createTaskUrl($action, $data)
    {
        $modelClass = lcfirst($data['model_class']);

        $params = array();

        if (isset($data['id'])) {
            $params['id'] = (int)$data['id'];
        }

        if ($action === 'translate') {
            $params = $this->translationParams($data);
        }

        $route = "/$modelClass/$action";

        return Yii::app()->createUrl($route, $params);
    }

    /**
     * @param array $data
     * @return string
     */
    protected function translationParams($data)
    {
        return array(
            'id' => $data['id'],
            'step' => $this->getTaskModel($data)->firstTranslationFlowStep(),
            'translateInto' => $data['language'],
        );
    }

    /**
     * Creates the SQL data provider the accounts task list.
     *
     * @return CSqlDataProvider the data provider.
     */
    protected function createDataProvider()
    {
        $queries = array();
        $roles = PermissionHelper::getRolesForAccount($this->account->id);
        $type = ucfirst($this->type);
        $queryGetter = "get{$type}TaskQueries";
        foreach ($roles as $roleTitle) {
            if (($queryBuilder = $this->createQueryBuilder($roleTitle)) !== null) {
                $queries = array_merge($queries, $queryBuilder->$queryGetter($this->account));
            }
        }

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

    /**
     * Creates the query builder component for the given role.
     *
     * @param string $roleTitle the role model title.
     *
     * @return DashboardTaskQueryBuilder|null the component or null if none is found for the role.
     */
    protected function createQueryBuilder($roleTitle)
    {
        $className = "Dashboard{$roleTitle}TaskQueryBuilder";
        if (in_array($className, self::$queryBuilderComponents)) {
            return Yii::createComponent(array('class' => $className));
        }
        return null;
    }

    public function createTaskId($data)
    {
        if ($data['task'] === 'translation') {
            return $this->createTranslationId($data);
        }
        return '';
    }

    private function createTranslationId($data)
    {
        $activeId = Html::generateActiveId($this->getTaskModel($data), 'title');
        return "{$data['task']}_{$data['language']}_{$activeId}";
    }
} 
