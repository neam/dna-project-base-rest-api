<?php

Yii::import('vendor.crisu83.yii-sentry.components.SentryErrorHandler');

class AppErrorHandler extends SentryErrorHandler
{

    public function onShutdown()
    {
        parent::onShutdown();

        $error = error_get_last();
        if ($error !== null) {

            // Useful for development purposes
            //var_dump($error, $this->getSentryClient()->getLoggedEventIds());

            // Error has already been reported by sentry - redirect to front-page instead of letting the user stare
            // at a white screen of death
            $ids = http_build_query(
                array(
                    'code' => 500,
                    'loggedEventIds' => $this->getSentryClient()->getLoggedEventIds(),
                )
            );
            header("Location: " . Yii::app()->request->baseUrl . "/site/error?$ids");

        }

    }


} 