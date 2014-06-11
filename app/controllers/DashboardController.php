<?php

class DashboardController extends Controller
{
    /**
     * @return array
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /**
     * @return array
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array(
                    'index',
                ),
                'users' => array('@'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Renders the dashboard.
     */
    public function actionIndex()
    {
        $model = Account::model()->findByPk(user()->id);

        $this->render(
            'index',
            array(
                'model' => $model,
            )
        );
    }
}
