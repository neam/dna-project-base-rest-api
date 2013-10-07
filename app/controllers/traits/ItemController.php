<?php

trait ItemController
{

    public function itemAccessRules()
    {
        return array(
            array('allow',
                'actions' => array(
                    'continueAuthoring',
                ),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array(
                    'add',
                ),
                'roles' => array(
                    'GS.item.add'
                ),
            ),
        );
    }

    public function actionContinueAuthoring($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $db =& Yii::app()->ezc->db;
        $execution = new ezcWorkflowDatabaseExecution($db, (int) $model->authoring_workflow_execution_id);

        var_dump($execution);
    }

    public function actionAdd()
    {
        $item = new $this->modelClass();
        if (!$item->save()) {
            throw new SaveException();
        }

        Yii::app()->user->setFlash('success', "{$this->modelClass} Added");

        $this->redirect(array('continueAuthoring', 'id' => $item->id));
    }

}