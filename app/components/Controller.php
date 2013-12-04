<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     * Initializes the controller.
     */
    function init()
    {
        parent::init();
        Yii::app()->homeUrl = $this->createUrl('/');
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

    static public function getLanguageMenuItems(){
        $languages = array();
        foreach(Yii::app()->params['languages'] AS $code => $name) {
            $languages[] = array(
                'label' => $name,
                'url'   => array_merge(array(''), $_GET, array('lang' => $code)),
                'active' => ($code == Yii::app()->language)
            );
        }
        return $languages;
    }

    /**
     * Sets the page title.
     * @param string|array $title the full title or an array of title fragments.
     * @param boolean $includeAppName whether to include the app name in the page title. Defaults to false.
     * @param string $separator the separator character (and whitespace) between items.
     * @override CController::setPageTitle()
     */
    public function setPageTitle($title, $includeAppName = false, $separator = ' - ')
    {
        if (is_array($title)) {
            $value = implode($separator, $title);
        } else {
            $value = $title;
        }

        if ($includeAppName) {
            $value .= $separator . Yii::app()->name;
        }

        parent::setPageTitle($value);
    }
}
