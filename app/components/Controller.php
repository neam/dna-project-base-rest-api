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
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    function init(){
        parent::init();
        Yii::app()->homeUrl = $this->createUrl('/');
    }

    /**
     * Ability to debug redirects
     */
    public function redirect($url, $terminate = true, $statusCode = 302)
    {

        if (DEV && defined("DEBUG_REDIRECTS") && DEBUG_REDIRECTS)
        {

            if (is_array($url))
            {
                $route = isset($url[0]) ? $url[0] : '';
                $url = $this->createUrl($route, array_splice($url, 1));
            }

            Yii::log("Development mode redirect", "flow", "checks");
            echo CHtml::link("Development mode - Click to continue to automatic redirect: $url (Terminate: $terminate Status-code: $statusCode)", $url);
            Yii::app()->end($status = 0, $terminate);
        } else
        {
            parent::redirect($url, $terminate, $statusCode);
        }
    }

}