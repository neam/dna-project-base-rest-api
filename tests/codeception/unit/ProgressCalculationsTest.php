<?php

class ProgressCalculationsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \CodeGuy
     */
    protected $guy;

    protected $_snapshot;

    protected function _before()
    {
        // Create an empty Snapshot
        $this->_snapshot = new Snapshot();

    }

    protected function _after()
    {
    }

    // tests
    /**
     * @group data:clean-db
     */
    public function testZeroProgressOnNewItem()
    {

        $scenarios = $this->_snapshot->qaStateBehavior()->scenarios;

        codecept_debug("");
        foreach ($scenarios as $scenario) {
            codecept_debug("Running against scenario '$scenario'");
            $this->assertEquals(0, $this->_snapshot->calculateValidationProgress($scenario));
        }

    }

}