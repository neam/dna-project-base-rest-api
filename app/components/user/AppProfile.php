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
            'language1' => Yii::t('model', 'First Language'),
            'language2' => Yii::t('model', 'Second Language'),
            'language3' => Yii::t('model', 'Third Language'),
            'language4' => Yii::t('model', 'Fourth Language'),
            'language5' => Yii::t('model', 'Fifth Language'),
        ));
    }
}
