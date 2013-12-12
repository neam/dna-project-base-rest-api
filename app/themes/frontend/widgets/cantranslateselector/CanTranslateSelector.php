<?php

class CanTranslateSelector extends CWidget
{
    /**
     * @var integer the user ID.
     */
    public $userId;

    /**
     * @var Account the user account.
     */
    private $_account;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        $this->_account = Account::model()->findByPk($this->userId);
    }

    /**
     * Runs the widget.
     */
    public function run()
    {
        $this->render('view', array(
            'model' => $this->_account,
        ));
    }

    /**
     * Returns the languages available in the application.
     * @return array the languages.
     */
    public function getLanguages()
    {
        return Yii::app()->langHandler->languages;
    }

    /**
     * Creates the TbToggleColumn columns.
     * @return array
     */
    public function createToggleColumns()
    {
        $columns = array();

        foreach ($this->getLanguages() as $language) {
            if ($language === 'en') {
                continue;
            }

            $columns[] = array(
                'class' => 'TbToggleColumn',
                'checkedButtonLabel' => 'Yes',
                'uncheckedButtonLabel' => 'No',
                'displayText' => false,
                'name' => 'can_translate_to_' . $language,
                'header' => ucfirst($language),
                'value' => 'CHtml::value($data,\'can_translate_to_' . $language . '\')',
                'filter' => false,
                'toggleAction' => 'profiles/toggleOwn',
            );
        }

        return $columns;
    }
}
