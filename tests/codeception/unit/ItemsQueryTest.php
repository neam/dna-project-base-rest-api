<?php
use Codeception\Util\Stub;

class ItemsQueryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \CodeGuy
     */
    protected $codeGuy;

    protected function _before()
    {

        $chapter = new Chapter();
        if (!$chapter->save()) {
            throw new SaveException($chapter);
        }

        $exercise = new Exercise();
        $exercise->_title = "An exercise title";
        if (!$exercise->save()) {
            throw new SaveException($exercise);
        }

        $snapshot = new Snapshot();
        $snapshot->_title = "A snapshot title";
        if (!$snapshot->save()) {
            throw new SaveException($snapshot);
        }

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
     * @group data:clean-db,coverage:minimal
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
     * @group data:clean-db,coverage:minimal
     */
    public function testFindItemsThroughDatabaseView()
    {
        $items = Item::model()->findAll();
        $this->assertNotEmpty(count($items));
    }

}
