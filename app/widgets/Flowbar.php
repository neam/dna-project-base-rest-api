<?php

class Flowbar extends CWidget
{
    /**
     * @var array
     */
    public $htmlOptions = array();

    /**
     *
     */
    public function init()
    {
        TbHtml::addCssClass('flowbar', $this->htmlOptions);
        echo TbHtml::tag('div', $this->htmlOptions);
    }

    /**
     *
     */
    public function run()
    {
        echo '</div>';
    }
}