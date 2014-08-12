<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

    /**
     * The default layout
     */
    public $layout = WorkflowUi::LAYOUT_REGULAR;

    /**
     * Initializes the controller.
     */
    function init()
    {
        parent::init();
        Yii::app()->homeUrl = $this->createUrl('/');
    }

    /**
     * @inheritDoc
     */
    protected function beforeAction($action)
    {
        $traits = class_uses(get_class($this));

        if (in_array('ItemController', $traits)) {
            /** @var self|ItemController $this */
            $this->beforeItemControllerAction($action);
        }

        return parent::beforeAction($action);
    }

    /**
     * Ability to debug redirects
     */
    public function redirect($url, $terminate = true, $statusCode = 302)
    {

        if (DEV && defined("DEBUG_REDIRECTS") && DEBUG_REDIRECTS) {

            if (is_array($url)) {
                $route = isset($url[0]) ? $url[0] : '';
                $url = $this->createUrl($route, array_splice($url, 1));
            }

            Yii::log("Development mode redirect", "flow", "checks");
            echo CHtml::link("Development mode - Click to continue to automatic redirect: $url (Terminate: $terminate Status-code: $statusCode)", $url);
            Yii::app()->end($status = 0, $terminate);
        } else {
            parent::redirect($url, $terminate, $statusCode);
        }
    }

    /**
     * Adds toggle action for all controllers.
     * The child controller needs to update access filters accordingly.
     * Attributes that can be toggled are specified by "safe" rules on scenario toggle.
     */
    public function actionToggle($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'toggle';

        if (isset($_GET['attribute'])) {
            $attribute = $_GET['attribute'];

            try {
                $before = $model->$attribute;
                $model->attributes = array($attribute => $model->$attribute == 1 ? 0 : 1);
                // check if safe, ie got set
                if ($model->$attribute === $before) {
                    throw new CException('Unsafe attribute');
                }
                if ($model->save()) {
                    // do nothing is fine
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        }
    }

    static public function getLanguageMenuItems()
    {
        $languages = array();
        foreach (LanguageHelper::getLanguageList() AS $code => $name) {
            $languages[] = array(
                'label' => $name,
                'url' => array_merge(array(''), $_GET, array('lang' => $code)),
                'active' => ($code == Yii::app()->language)
            );
        }
        return $languages;
    }

    /**
     * Forces the user to set a profile language, and sets Yii::app()->user->profileReturnUrl.
     * @param string|null $returnUrl the return URL used after saving the profile. Defaults to the current request URL.
     */
    public function requireProfileLanguages($returnUrl = null)
    {
        if (Yii::app()->user->isTranslator && count(Yii::app()->user->translatableLanguages) < 1) {
            Yii::app()->user->profileReturnUrl = isset($returnUrl) ? $returnUrl : request()->url;
            Yii::app()->user->setFlash('warning', Yii::t('app', 'Please set at least one language before translating.'));
            $this->redirect(array('/profile/edit'));
        }
    }

}
