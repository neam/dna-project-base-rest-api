<?php
use Codeception\Util\Stub;

class GraphRelationsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \CodeGuy
     */
    protected $codeGuy;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testChapterExercises()
    {

        $chapter = new Chapter();
        $chapter->save();

        $this->assertTrue(!is_null($chapter->node()->id));

        $exercise = new Exercise();
        $exercise->save();

        $this->assertTrue(!is_null($exercise->node()->id));

        $edge = new Edge();
        $edge->from_node_id = $chapter->node()->id;
        $edge->to_node_id = $exercise->node()->id;
        $edge->save();

        $this->assertEquals(1, count($chapter->node()->outEdges));
        $this->assertEquals(1, count($exercise->node()->inEdges));

    }

}