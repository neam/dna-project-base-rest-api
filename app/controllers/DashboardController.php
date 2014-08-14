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
     * Renders the main dashboard.
     */
    public function actionIndex()
    {
        $this->layout = WebApplication::LAYOUT_FLUID;
        $this->render('index');
    }

    /**
     * Renders the tasks page.
     */
    public function actionTasks()
    {
        $this->requireProfileLanguages();

        $model = Account::model()->findByPk(user()->id);

        $this->buildBreadcrumbs(array(
            Yii::t('app', 'Dashboard'),
        ));

        $this->render(
            'index',
            array(
                'model' => $model,
            )
        );
    }

    /**
     * Creates a dropdown button for the given controller action.
     * @param string $label
     * @param string $controllerAction
     * @param bool $modelLabelPlural whether the model label is pluralized (e.g. Videos). Defaults to false (singular).
     * @param array $htmlOptions
     * @return string
     */
    public function renderItemActionDropdown($label, $controllerAction, $modelLabelPlural = false, $htmlOptions = array())
    {
        if (!isset($htmlOptions['size'])) {
            $htmlOptions['size'] = TbHtml::BUTTON_SIZE_SM; // default button size
        }

        $links = array();

        $modelLabelPluralNumber = $modelLabelPlural ? 2 : 1;

        foreach (DataModel::qaModels() as $modelClass => $tableName) {
            $links[] = array(
                'label' => Yii::t('app', DataModel::modelLabels()[$modelClass], $modelLabelPluralNumber),
                'url' => $this->createUrl('/' . lcfirst($modelClass) . '/' . $controllerAction)
            );
        }

        return TbHtml::buttonDropdown(
            $label,
            $links,
            $htmlOptions
        );
    }
}
