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
    ) {

        $trace = debug_backtrace();
        $message = "assertEquals($expected, $actual) on line {$trace[0]["line"]}:";

        return parent::assertEquals($expected, $actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase);

    }

    // tests
    public function testEdgeOrder()
    {
        $section = new Section();
        if (!$section->save()) {
            var_dump($section->getErrors());
        }
    }


}
