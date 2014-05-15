<?php

/**
 * RelationCountValidator class.
 */
class RelationCountValidator extends CValidator
{
    /**
     * @var integer exact count. Defaults to null, meaning no exact count.
     */
    public $is;
    /**
     * @var integer minimum count. Defaults to null, meaning no minimum count.
     */
    public $min;
    /**
     * @var integer maximum count. Defaults to null, meaning no maximum count.
     */
    public $max;
    /**
     * @var string user-defined error message used when the count is too small.
     */
    public $tooFew;
    /**
     * @var string user-defined error message used when the count is too large.
     */
    public $tooMany;

    /**
     * @inheritDoc
     */
    public function validateAttribute($object, $attribute)
    {
        $count = count($object->{$attribute});

        if (isset($this->min) && $count < $this->min) {
            $message = !empty($this->tooFew) ? $this->tooFew : Yii::t('app', 'The relation {relation} contains an insufficient number of models (minimum is {min}).');
            $this->addError($object, $attribute, $message, array('{min}' => $this->min));
        }

        if (isset($this->max) && $count > $this->max) {
            $message = !empty($this->tooMany) ? $this->tooMany : Yii::t('app', 'The relation {relation} contains an excess number of models (maximum is {max}).');
            $this->addError($object, $attribute, $message, array('{max}' => $this->max));
        }

        if (isset($this->is) && (int) $count !== (int) $this->is) {
            $message = Yii::t('app', 'The relation {relation} contains an illegal number of models (it should contain exactly {is}).');
            $this->addError($object, $attribute, $message, array('{is}' => $this->is));
        }
    }
}
