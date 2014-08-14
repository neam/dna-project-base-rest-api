<?php

class SiteController extends Controller
{

    public $defaultAction = 'index';

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
        user()->setReturnUrl(app()->homeUrl);
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
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
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