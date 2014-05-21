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

    public static function assertEquals(
        $expected,
        $actual,
        $message = '',
        $delta = 0,
        $maxDepth = 10,
        $canonicalize = false,
        $ignoreCase = false
    )
    {
        $trace = debug_backtrace();
        $message = "assertEquals($expected, $actual) on line {$trace[0]["line"]}:";
        parent::assertEquals($expected, $actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase);
    }

    /**
     * @group data:clean-db
     * @group data:user-generated
     */
    public function testChapterExercisesAndSnapshots()
    {
        $chapter = new Chapter();
        $chapter->enableRestriction = false; // Turn off access restrictions
        if (!$chapter->save()) {
            throw new SaveException($chapter);
        }
        // Turn off access restrictions for the generic model used internally to load relations.
        Chapter::model()->enableRestriction = false;

        $this->assertTrue(!is_null($chapter->node()->id));

        $exercise = new Exercise();
        $exercise->enableRestriction = false; // Turn off access restrictions for this test
        $exercise->_title = "An exercise title";
        if (!$exercise->save()) {
            throw new SaveException($exercise);
        }
        // Turn off access restrictions for the generic model used internally to load relations.
        Exercise::model()->enableRestriction = false;

        $this->assertTrue(!is_null($exercise->node()->id));

        $edge = new Edge();
        $edge->from_node_id = $chapter->node()->id;
        $edge->to_node_id = $exercise->node()->id;
        $edge->relation = 'exercises';
        if (!$edge->save()) {
            throw new SaveException($edge);
        }

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
        $snapshot->enableRestriction = false; // Turn off access restrictions for this test
        $snapshot->_title = "A snapshot title";
        if (!$snapshot->save()) {
            throw new SaveException($snapshot);
        }
        // Turn off access restrictions for the generic model used internally to load relations.
        Snapshot::model()->enableRestriction = false;

        $this->assertTrue(!is_null($snapshot->node()->id));

        $edge = new Edge();
        $edge->from_node_id = $chapter->node()->id;
        $edge->to_node_id = $snapshot->node()->id;
        $edge->relation = 'snapshots';
        if (!$edge->save()) {
            throw new SaveException($edge);
        }

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

    /**
     * @group data:user-generated
     */
    public function testQueryNodesWithItemAttributes()
    {
        $sql = "
SELECT
    node.id,
    exercise.id AS exercise_id,
    exercise._title AS exercise_title,
    snapshot.id AS snapshot_id,
    snapshot._title AS snapshot_title,
    CASE
        WHEN snapshot.id IS NOT NULL THEN snapshot._title
        WHEN exercise.id IS NOT NULL THEN exercise._title
        ELSE NULL
    END AS _title
FROM
    node
        LEFT JOIN
    exercise ON exercise.node_id = node.id
        LEFT JOIN
    snapshot ON snapshot.node_id = node.id
WHERE
    1
        AND (exercise.id IS NOT NULL OR snapshot.id IS NOT NULL)
        AND (
                (exercise.id IS NOT NULL AND exercise._title IS NOT NULL)
                OR
                (snapshot.id IS NOT NULL AND snapshot._title IS NOT NULL)
            )
LIMIT 3
        ";

        $result = Yii::app()->db->createCommand($sql)->queryAll();
        $this->assertNotEmpty($result);
    }

    /**
     * @group data:user-generated
     */
    public function testFindItemsThroughDatabaseView()
    {
        $items = Item::model()->findAll();
        $this->assertNotEmpty(count($items));
    }
}
