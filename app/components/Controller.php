<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    // Item actions
    const ACTION_BROWSE = 'browse';
    const ACTION_VIEW = 'view';
    const ACTION_ADD = 'add';
    const ACTION_EDIT = 'edit';
    const ACTION_CLONE = 'clone';
    const ACTION_REMOVE = 'remove';
    const ACTION_PREVIEW = 'preview';
    const ACTION_TRANSLATE = 'translate';
    const ACTION_TRANSLATION_OVERVIEW = 'translationOverview';
    const ACTION_EVALUATE = 'evaluate';
    const ACTION_PROOFREAD = 'proofread';
    const ACTION_APPROVE = 'approve';
    const ACTION_PUBLISH = 'publish';
    const ACTION_PREPARE_FOR_REVIEW = 'prepareForReview';
    const ACTION_PREPARE_FOR_PUBLISHING = 'prepareForPublishing';
    const ACTION_CANCEL = 'cancel';

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = WebApplication::LAYOUT_REGULAR;
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

    /**
     * Sets the page title.
     * @param string|array $title the full title or an array of title fragments.
     * @param boolean $includeAppName whether to include the app name in the page title. Defaults to false.
     * @param string $separator the separator character (and whitespace) between fragments.
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

    /**
     * Builds and sets the breadcrumbs.
     * @param array $items the list of breadcrumb items as label => URL
     * @param array $rootItem override the root breadcrumb item.
     */
    public function buildBreadcrumbs(array $items, array $rootItem = array())
    {
        $breadcrumbs = array();

        !empty($rootItem)
            ? $breadcrumbs[$rootItem[0]] = $rootItem[1] // override breadcrumb root
            : $breadcrumbs[Yii::app()->breadcrumbRootLabel] = Yii::app()->homeUrl;

        foreach ($items as $label => $url) {
            if (!isset($breadcrumbs[$label])) {
                $breadcrumbs[$label] = $url;
            }
        }

        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Renders the breadcrumbs.
     * The rendering logic is based on TbBreadcrumbs::run().
     */
    public function renderBreadcrumbs()
    {
        $breadcrumbs = $this->breadcrumbs;

        ob_start();

        echo CHtml::openTag('ul', array('class' => 'breadcrumbs hidden-xs'));

		end($breadcrumbs);
		$lastLink = key($breadcrumbs);

		foreach ($breadcrumbs as $label => $url) {
			if (is_string($label) || is_array($url)) {
				echo '<li>';
				echo strtr('<a href="{url}">{label}</a>', array(
					'{url}' => CHtml::normalizeUrl($url),
					'{label}' => CHtml::encode($label),
				));
			} else {
				echo '<li class="active">';
				echo str_replace('{label}', CHtml::encode($url), '{label}');
			}

			if ($lastLink !== $label) {
				echo '';
			}

			echo '</li>';
		}

		echo CHtml::closeTag('ul');

        return ob_get_clean();
    }
}
