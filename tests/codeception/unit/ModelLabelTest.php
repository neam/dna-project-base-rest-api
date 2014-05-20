<?php
use Codeception\Util\Stub;

class ModelLabelTest extends \Codeception\TestCase\Test
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
        $message = "$expected = $actual";
        return parent::assertEquals($expected, $actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase);
    }

    public function testModelLabels()
    {
        $chapter = new Chapter();
        $this->assertEquals('n==0#Chapter(s)|n==1#Chapter|n>1#Chapters', $chapter->modelLabel);
        $this->assertEquals('n==0#Chapter(s)|n==1#Chapter|n>1#Chapters', Yii::t('model', $chapter->modelLabel));
        $this->assertEquals('Chapter(s)', Yii::t('model', $chapter->modelLabel, 0));
        $this->assertEquals('Chapter', Yii::t('model', $chapter->modelLabel, 1));
        $this->assertEquals('Chapters', Yii::t('model', $chapter->modelLabel, 2));
    }
}
