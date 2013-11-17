<?php

class LocaleData extends CLocale
{

    private $_data;
    private $_id;

    /**
     * Returns the instance of the specified locale.
     * Since the constructor of CLocale is protected, you can only use
     * this method to obtain an instance of the specified locale.
     * @param string $id the locale ID (e.g. en_US)
     * @return CLocale the locale instance
     */
    public static function getInstance($id)
    {
        static $locales = array();
        if (isset($locales[$id])) {
            return $locales[$id];
        } else {
            return $locales[$id] = new LocaleData($id);
        }
    }

    /**
     * Constructor.
     * Since the constructor is protected, please use {@link getInstance}
     * to obtain an instance of the specified locale.
     * @param string $id the locale ID (e.g. en_US)
     * @throws CException if given locale id is not recognized
     */
    protected function __construct($id)
    {
        $this->_id = self::getCanonicalID($id);
        $dataPath = self::$dataPath === null ? Yii::getPathOfAlias('system.i18n.data') : self::$dataPath;
        $dataFile = $dataPath . DIRECTORY_SEPARATOR . $this->_id . '.php';
        var_dump($dataFile);
        if (is_file($dataFile)) {
            $this->_data = require($dataFile);
        } else {
            throw new CException(Yii::t('yii', 'Unrecognized locale "{locale}".', array('{locale}' => $id)));
        }
    }

    public function getData()
    {
        return $this->_data;
    }

} 