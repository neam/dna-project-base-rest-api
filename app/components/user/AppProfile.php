<?php

/**
 * AppProfile class.
 */
class AppProfile extends Profile
{
    /**
     * Returns the validation rules.
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('language1, language2, language3, language4, language5', 'safe'),
        ));
    }

    /**
     * Returns the attribute labels.
     * @return array
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'language1' => Yii::t('model', 'Language #1'),
            'language2' => Yii::t('model', 'Language #2'),
            'language3' => Yii::t('model', 'Language #3'),
            'language4' => Yii::t('model', 'Language #4'),
            'language5' => Yii::t('model', 'Language #5'),
        ));
    }
}
