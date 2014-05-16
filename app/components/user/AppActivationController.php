<?php

Yii::import('vendor.mishamx.yii-user.controllers.ActivationController');

class AppActivationController extends ActivationController
{
    /**
     * Displays the user activation page.
     * @see ActivationController::actionActivation()
     */
    public function actionActivation()
    {
        $email = $_GET['email'];
        $activkey = $_GET['activkey'];

        // Defaulting to error
        $level = TbHtml::ALERT_COLOR_ERROR;
        $flashMsg = Yii::t('accountActivation', 'Incorrect activation URL.');

        if ($email && $activkey) {
            $find = User::model()->notsafe()->findByAttributes(array('email' => $email));

            if (isset($find) && $find->status) {
                $level = TbHtml::ALERT_COLOR_INFO;
                $flashMsg = Yii::t('accountActivation', 'Your account is active.');
            } elseif (isset($find->activkey) && ($find->activkey == $activkey)) {
                $find->activkey = UserModule::encrypting(microtime());
                $find->status = 1;
                $find->save();
                $level = TbHtml::ALERT_COLOR_SUCCESS;
                $this->redirect(array('activated'));
            }
        }

        Yii::app()->user->setFlash($level, $flashMsg);
        $this->redirect(array('/'));
    }

    /**
     * Displays the activation success page.
     */
    public function actionActivated()
    {
        $this->layout = WebApplication::LAYOUT_MINIMAL;
        $this->render('//user/activated');
    }
}
