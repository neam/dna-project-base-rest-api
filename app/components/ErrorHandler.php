<?php

/**
 * ErrorHandler class for the REST application.
 * Overrides error and exception handling methods so that a proper REST response is always returned by the API.
 * Relies on that the WebApplication implements methods for sending the response.
 */
class ErrorHandler extends CErrorHandler
{
    /**
     * @inheritdoc
     */
    protected function handleError($event)
    {
        Yii::app()->displayError($event->code, $event->message, $event->file, $event->line);
    }

    /**
     * @inheritdoc
     */
    protected function handleException($exception)
    {
        Yii::app()->displayException($exception);
    }
}