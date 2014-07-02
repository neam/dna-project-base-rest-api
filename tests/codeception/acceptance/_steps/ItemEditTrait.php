<?php

use Symfony\Component\CssSelector\CssSelector;

/**
 * Various actions for item-editing common for all item-types
 */
trait ItemEditTrait
{

    /**
     * Fills attributes on the item editing pages.
     * I must be on the first page of editing/creating item before calling this method!
     * @param $steps
     * @param $stepAttributes
     */
    function fillItemStepPages($steps, $stepAttributes)
    {
        $I = $this;
        foreach ($steps as $step) {
            $attributes = isset($stepAttributes[$step]) ? $stepAttributes[$step] : array();
            $I->fillFieldsOnPageAndSubmit($attributes);
        }

        $I->seeInCurrentUrl('dashboard');
    }

    /**
     * Fills fields on the current page and submits
     *
     * @param $attributes array associative array with structure: field-selector => value.
     * Value can be a anonymous function, or a scalar. If not a callable then fillField will be used
     *
     * @param $submit (optional) defaults to \ItemEditPage::$submitButton
     */
    function fillFieldsOnPageAndSubmit(array $attributes, $submit = null)
    {
        $I = $this;

        if (empty($submit)) {
            $submit = ItemEditPage::$submitButton;
        }

        foreach ($attributes as $id => $value) {

            // Support for anonymous functions when needed more than just fillField, eg multiple steps in file upload
            is_callable($value)
                ? $value()
                : $I->fillField($id, $value);
        }

        $I->click($submit);
    }

    function addItemToGroup($group, $itemContext)
    {
        $I = $this;
        $I->seeItemIsNotInGroup($group, $itemContext);
        $I->toggleItemGroup($group, $itemContext);
        $I->seeItemIsInGroup($group, $itemContext);
    }

    function removeItemFromGroup($group, $itemContext)
    {
        $I = $this;
        $I->seeItemIsInGroup($group, $itemContext);
        $I->toggleItemGroup($group, $itemContext);
        $I->seeItemIsNotInGroup($group, $itemContext);
    }

    function toggleItemGroup($group, $context)
    {
        $this->click($group, $context);
    }

    function seeItemIsInGroup($group, $itemContext)
    {
        $xpath = "//a[contains(text(), '$group')]/../" . CssSelector::toXPath(\ItemBrowsePage::$isInGroupIdentifier);
        $this->seeElement(CssSelector::toXPath($itemContext) . $xpath);
    }

    function seeItemIsNotInGroup($group, $itemContext)
    {
        $xpath = "//a[contains(text(), '$group')]/../" . CssSelector::toXPath(\ItemBrowsePage::$isNotInGroupIdentifier);
        $this->seeElement(CssSelector::toXPath($itemContext) . $xpath);
    }

    function selectRelated($field, array $items)
    {
        $I = $this;
        $I->amGoingTo('select related items');
        $I->selectSelect2Option($field, $items);
        $I->seeSelect2OptionIsSelected($field, $items);
    }

    function gotoStep($step, $steps, $submit = null)
    {
        $I = $this;

        if (empty($submit)) {
            $submit = ItemEditPage::$submitButton;
        }

        // times to submit to get to step
        $times = array_search($step, $steps);

        for ($index = 0; $index < $times; $index++) {
            $I->click($submit);
        }
    }

    function removeRelated($field, array $items)
    {
        $I = $this;
        $I->amGoingTo('remove related items');
        $I->unselectSelect2Option($field, $items);
    }

}
