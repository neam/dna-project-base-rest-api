<?php

class SiteController extends Controller
{

    public $defaultAction = 'home';

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array(
                    'giiscript',
                    'sandbox',
                ),
                'roles' => array('Developer'),
            ),
            array(
                'allow',
                'actions' => array(
                    'index',
                    'error',
                    'sleeper',
                    'contact',
                    'logout',
                ),
                'users' => array('*'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $this->requireProfileLanguages();
        $this->render('index');
    }

    /**
     * Displays the public landing page.
     */
    public function actionHome()
    {
        $this->layout = WebApplication::LAYOUT_FLUID;
        user()->setReturnUrl(app()->createUrl('/dashboard/index')); // after login
        $this->homeBrandLabel = Yii::t('app', 'Gapminder.org Home');
        $this->render('home');
    }

    /**
     * Gii script console
     */
    public function actionGiiscript()
    {
        $this->render('giiscript');
    }

    /**
     * View used for developers to try out simple things
     */
    public function actionSandbox()
    {
        $this->render('sandbox');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError($code = null)
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        } elseif (!is_null($code)) {
            $error['message'] = "Internal Server Error";
            $error['code'] = $code;
            $error['loggedEventIds'] = isset($_GET['loggedEventIds']) ? $_GET['loggedEventIds'] : array();
            $this->render('error', $error);
        } else {
            $error['message'] = "Precondition Failed";
            $error['code'] = 412;
            $this->render('error', $error);
        }
    }

    public function actionSleeper() {

        sleep(30);
        die("I woke up after 30 seconds");

    }

    public function actionTriggerError()
    {

        /*
        if (!empty($_GET['theme'])) {
            Yii::app()->theme = $_GET['theme'];
        }
        */
        if (!empty($_GET['notice'])) {
            $bar = $foo;
        }
        if (!empty($_GET['warning'])) {
            $content = file_get_contents('foo.txt');
        }
        if (!empty($_GET['fatal'])) {
            $bar = foo();
        }

        echo "Current CONFIG_ENVIRONMENT is " . CONFIG_ENVIRONMENT;
        echo "</br>";
        echo "Current YII_DEBUG value is " . (int) YII_DEBUG;
        echo "</br>";
        echo "Current DEV value is " . (int) DEV;
        echo "</br>";
        echo CHtml::link("notice", array('site/triggerError', 'notice' => 1));
        echo "</br>";
        echo CHtml::link("warning", array('site/triggerError', 'warning' => 1));
        echo "</br>";
        echo CHtml::link("fatal", array('site/triggerError', 'fatal' => 1));

    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', Yii::t('app', 'Thank you for contacting us. We will respond to you as soon as possible.'));
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
