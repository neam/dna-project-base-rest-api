<?php

trait RestApiControllerTrait
{

    /**
     * @var array map of AR classes to REST resource classes.
     */
    protected static $classMap = array(
        'Composition' => 'RestApiComposition',
        'Page' => 'RestApiPage',
    );

    public function actionPreflight()
    {
        $contentType = 'application/json';
        header("Content-Type: $contentType");
        $this->sendHeaders();
    }

    public function sendHeaders()
    {
        $contentLanguage = Yii::app()->language;
        header("Content-Language: $contentLanguage");
        parent::sendHeaders();
        Yii::app()->sendCorsHeaders();

    }

}