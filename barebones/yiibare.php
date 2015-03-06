<?php

class Yii
{

    static public $pdoInstance;

    static public function app()
    {
        return (object) [
            'language' => 'en_us'
        ];
    }

    static public function pdo()
    {
        if (empty(static::$pdoInstance)) {
            static::$pdoInstance = new PDO('mysql:host=' . DATABASE_HOST . ';port=' . DATABASE_PORT . ';dbname=' . DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
        }
        return static::$pdoInstance;
    }

}