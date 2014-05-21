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

        if (isset($email) && isset($activkey)) {
            $find = User::model()->notsafe()->findByAttributes(array('email' => $email));

            if (isset($find->activkey) && ($find->activkey === $activkey)) {
                $find->activkey = UserModule::encrypting(microtime());
                $find->status = 1;
                $find->save();
                $this->redirect(array('activated'));
            } else {
                throw new CHttpException(401, Yii::t('app', 'Invalid activation key.'));
            }
        } else {
            throw new CHttpException(401, Yii::t('app', 'Invalid activation URL.'));
        }
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
