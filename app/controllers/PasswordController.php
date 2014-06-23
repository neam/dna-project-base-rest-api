<?php

class PasswordController extends \nordsoftware\yii_account\controllers\PasswordController
{
    /**
     * Renders the forgot password confirmation page (email sent).
     */
    public function actionSent()
    {
        $this->layout = WebApplication::LAYOUT_NARROW;
        $this->render('theme.views.password.sent');
    }
}
