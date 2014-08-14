<?php

use Symfony\Component\CssSelector\CssSelector;

/**
 * Trait for generating actions using a select2 widget
 */
trait Select2Trait
{

    /**
     * Generates the id of a select2 using the id of the underlying data element
     * @param string $selectId the id with a leading hash
     * @return string the id of the select2-widget
     */
    function generateSelect2Selector($selectId)
    {
        // The logic is reverse-engineered by looking at the markup of the widget that select2 creates

        // remove the hash-sign from the select-id to avoid ids of type #foo#bar
        $id = substr($selectId, 1, strlen($selectId) - 1);
        return '#s2id_' . $id;
    }

    /**
     * Generates a selector that can be used to select a item
     *
     * result of generateSelect2Selector + rest, where rest is:
     * if multiple: ul.select2-choices
     * if not multiple: a.select2-choice
     *
     * @param string $selectElementId id of the select-element (not select2)
     * @param bool $multiple whether multiple choices can be selected
     * @return string
     */
    function generateSelect2ChoiceSelector($selectElementId, $multiple = false)
    {
        $append = ($multiple) ? ' .select2-choices' : ' .select2-choice';
        return $this->generateSelect2Selector($selectElementId) . $append;
    }

    /**
     * Generates a selector that is used to read a value from the widget
     *
     * result of generateSelect2ChoiceSelector + rest, where rest is:
     * if multiple: li.select2-search-choice
     * if not multiple: span.select2-chosen (the selection as string can be read from this element)
     *
     * @param string $selectElementId id of the select-element (not select2)
     * @param bool $multiple whether multiple choices can be selected
     * @return string
     */
    function generateSelect2ChosenSelector($selectElementId, $multiple = false)
    {
        $append = ($multiple) ? ' .select2-search-choice' : ' .select2-chosen';
        return $this->generateSelect2ChoiceSelector($selectElementId, $multiple) . $append;
    }

    function unselectSelect2Option($field, $option)
    {
        $I = $this;

        // TODO: select "None" instead
        if (!is_array($option)) {
            $I->unselectOption($field, $option);
            return;
        }

        $css = $I->generateSelect2ChosenSelector($field, $multiple = true);

        $xpath = CssSelector::toXPath($css);

        foreach ($option as $opt) {
            $xpath .= "/div[contains(text(), '$opt')]/../" . CssSelector::toXPath('a.select2-search-choice-close');
            $I->click($xpath);
            $I->waitForElementNotVisible($xpath);
        }

        $I->dontSeeSelect2OptionIsSelected($field, $option);
    }

    /**
     * Checks if the option(s) is selected
     * @param $selectId
     * @param $option
     * @param bool $dont use dontSeeSelect2OptionIsSelected() instead of using this argument
     */
    function seeSelect2OptionIsSelected($selectId, $option, $dont = false)
    {
        $I = $this;

        if ($dont) {
            $I->amGoingTo('see option is not selected');
        } else {
            $I->amGoingTo('see option is selected');
        }

        $isMultiple = is_array($option);

        $selector = $I->generateSelect2ChosenSelector($selectId, $isMultiple);

        if (!$isMultiple) {
            $option = array($option);
        }

        foreach ($option as $opt) {
            ($dont)
                ? $I->dontSee($opt, $selector)
                : $I->see($opt, $selector);
        }
    }

    /**
     * Checks if the option(s) is selected
     * @param $selectId
     * @param $option
     */
    function dontSeeSelect2OptionIsSelected($selectId, $option)
    {
        $this->seeSelect2OptionIsSelected($selectId, $option, true);
    }

    /**
     * Selects a option and then waits that the select2-widget bound to it changes its value (no assertion)
     * @param string $selectId id of the select-element (not select2)
     * @param string|array $option the option to be selected. Can be array of options to select multiple
     */
    function selectSelect2Option($selectId, $option)
    {
        $I = $this;

        $I->amGoingTo('select options using a select2 widget');

        $multiple = is_array($option);

        if (!$multiple ) {
            $option = array($option);
        }

        $select2ClickableSelector = $I->generateSelect2ChoiceSelector($selectId, $multiple);

        foreach ($option as $opt) {
            // Opens options
            $I->click($select2ClickableSelector);

            $css = ".select2-drop-active .select2-results .select2-result";
            $xpath = CssSelector::toXPath($css);
            $xpath .= "/descendant-or-self::*[contains(text(), '$opt')]";

            // Click the result
            $I->click($xpath);
            $I->waitForElementNotVisible($xpath);
        }
    }
}
