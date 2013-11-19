<?php

Yii::import('vendor.mishamx.yii-user.controllers.ActivationController');

class GMActivationController extends ActivationController {
    /**
     * Displays the user activation page.
     * @see ActivationController::actionActivation()
     */
    public function actionActivation ()
    {
        $_GET['email'] = 'eric.nishio@nordsoftware.com';
        $_GET['activkey'] = 'foo';

        $email = $_GET['email'];
        $activkey = $_GET['activkey'];

        if ($email && $activkey) {
            $find = User::model()->notsafe()->findByAttributes(array('email' => $email));

            if (isset($find) && $find->status) {
                $this->render('/user/message', array(
                    'title' => UserModule::t('User activation'),
                    'content' => UserModule::t('You account is active.'),
                    'activated' => false,
                ));
            } elseif (isset($find->activkey) && ($find->activkey == $activkey)) {
                $find->activkey = UserModule::encrypting(microtime());
                $find->status = 1;
                $find->save();
                $this->render('/user/message', array(
                    'title' => UserModule::t('Welcome!'),
                    'content' => UserModule::t('Your account has been activated.'),
                    'activated' => true,
                ));
            } else {
                $this->render('/user/message', array(
                    'title' => UserModule::t('User activation'),
                    'content' => UserModule::t('Incorrect activation URL.'),
                    'activated' => false,
                ));
            }
        } else {
            $this->render('/user/message', array(
                'title' => UserModule::t('User activation'),
                'content' => UserModule::t('Incorrect activation URL.'),
                'activated' => false,
            ));
        }
    }
}
