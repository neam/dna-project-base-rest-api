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

        //$item = new GuiSection();
        //codecept_debug($item->validatorList);
        //return;

        codecept_debug("");
        foreach (DataModel::qaModels() as $model => $table) {
            codecept_debug("== $model == ");

            $item = new $model;
            $scenarios = $item->qaStateBehavior()->scenarios;

            foreach ($scenarios as $scenario) {
                codecept_debug("    Running against scenario '$scenario'");
                $this->assertEquals(0, $item->calculateValidationProgress($scenario));
            }

        }

    }

}