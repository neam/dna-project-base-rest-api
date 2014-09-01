<?php

/**
 * Command for administering application config
 *
 * Class ConfigCommand
 */
class ConfigCommand extends CConsoleCommand
{
    /**
     * @var string database connection component
     */
    public $connectionID = "db";

    /**
     * If we should be verbose
     *
     * @var bool
     */
    private $_verbose = false;

    /**
     * Write a string to standard output if we're verbose
     *
     * @param $string
     */
    protected function d($string)
    {
        if ($this->_verbose) {
            print "\033[37m" . $string . "\033[30m";
        }
    }

    protected function execute($db, $sql)
    {
        $this->d("Executing '" . $sql . "'\n");
        $db->createCommand($sql)->execute();
    }

    /**
     * Used to expose the currently loaded envbootstrap config to the shell
     * Add config vars as necessary for shell scripts to run properly
     * @param bool $verbose
     */
    public function actionExportEnvbootstrapConfig($verbose = false)
    {

        foreach (array(
                     "MAILCATCHER_HOST",
                     "MAILCATCHER_HTTP_PORT",
                     "MAILCATCHER_SMTP_PORT"
                 ) as $var) {
            echo "export $var=" . constant($var) . "\n";
        }

    }

    /**
     * @param bool $verbose
     */
    public function actionExportDbConfig($verbose = false)
    {

        if (!empty($verbose)) {
            $this->_verbose = true;
        }

        $db =& Yii::app()->{$this->connectionID};

        $this->d("Using '" . $db->connectionString . "'\n");

        $parsed = $this->parseConnectionString($db->connectionString);

        echo "export DB_HOST={$parsed["host"]}\n";
        echo "export DB_PORT={$parsed["port"]}\n";
        echo "export DB_USER={$db->username}\n";
        echo "export DB_PASSWORD={$db->password}\n";
        echo "export DB_NAME={$parsed["dbName"]}\n";

    }

    /**
     * Reversing $this->connectionString = $this->driverName.':host='.$this->hostName.';dbname='.$this->dbName;
     * Ugly but will have to do in short of better options (http://www.yiiframework.com/forum/index.php/topic/7984-where-to-get-the-name-of-the-database/)
     * @param $connectionString
     */
    protected function parseConnectionString($connectionString)
    {
        $parsed = array();
        $_ = explode(":", $connectionString, 2);
        $parsed["driverName"] = $_[0];
        $__ = explode(";", $_[1]);
        foreach ($__ as $v) {
            $___ = explode("=", $v);
            $parsed[$___[0]] = $___[1];
        }
        // For staying true to the original variable names
        $parsed["hostName"] = $parsed["host"];
        $parsed["dbName"] = $parsed["dbname"];
        return $parsed;
    }


}
