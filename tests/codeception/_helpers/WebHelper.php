<?php
namespace Codeception\Module;

// here you can define custom functions for WebGuy 

class WebHelper extends \Codeception\Module
{
    protected $config = array(
        'small-screen' => false,
    );

    public function haveASmallScreen()
    {
        return $this->config['small-screen'];
    }

    public function toggleNavigationOnSmallScreen()
    {
        if ($this->haveASmallScreen()) {
            $this->click(\MobilePage::$navbarToggle);
        }
    }
}
