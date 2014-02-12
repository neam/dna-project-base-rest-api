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

        $this->assertEquals(1, count($chapter->outEdges));
        $this->assertEquals(1, count($exercise->inEdges));

        $this->assertEquals(1, count($chapter->outNodes));
        $this->assertEquals(1, count($exercise->inNodes));

        $this->assertEquals(1, count($chapter->exercises));

        $this->assertEquals($exercise->id, $chapter->exercises[0]->id);
        $this->assertEquals($chapter->id, $exercise->parentChapters[0]->id);

        $snapshot = new Snapshot();
        $snapshot->save();

        $this->assertTrue(!is_null($snapshot->node()->id));

        $edge = new Edge();
        $edge->from_node_id = $chapter->node()->id;
        $edge->to_node_id = $snapshot->node()->id;
        $edge->save();

        $chapter->node()->refresh();
        $chapter->refresh();

        $this->assertEquals(2, count($chapter->node()->outEdges));
        $this->assertEquals(1, count($snapshot->node()->inEdges));

        $this->assertEquals(2, count($chapter->outEdges));
        $this->assertEquals(1, count($snapshot->inEdges));

        $this->assertEquals(2, count($chapter->outNodes));
        $this->assertEquals(1, count($snapshot->inNodes));

        $this->assertEquals(1, count($chapter->exercises));
        $this->assertEquals(1, count($chapter->snapshots));

        $this->assertEquals($snapshot->id, $chapter->snapshots[0]->id);
        $this->assertEquals($chapter->id, $snapshot->parentChapters[0]->id);

    }

}