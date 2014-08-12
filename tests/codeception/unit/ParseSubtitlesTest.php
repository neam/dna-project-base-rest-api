<?php

class ParseSubtitlesTest extends \Codeception\TestCase\Test
{
    /**
     * @var \CodeGuy
     */
    protected $guy;

    protected $_snapshot;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    /**
     * @group data:clean-db
     * @group data:user-generated
     * @group now
     */
    public function testSimpleSubtitles()
    {

        // The last blank line in subtitles is significant
        $subtitles = <<<EOD
1
00:00:03,399 --> 00:00:10,800
A common misunderstanding is that if we save all the poor children: the world will become overpopulated.

2
00:00:10,800 --> 00:00:13,599
This may sound logical, but it's wrong.

3
00:00:13,599 --> 00:00:16,199
Its the other way around!

4
00:00:16,199 --> 00:00:22,000
Saving the poor childrens lives is required to end population growth.

EOD;

        $videoFile = new VideoFile();
        $videoFile->subtitles = $subtitles;

        $expectedSerialized = <<<EOE
a:4:{i:0;O:8:"stdClass":3:{s:2:"id";s:1:"1";s:9:"timestamp";s:29:"00:00:03,399 --> 00:00:10,800";s:13:"sourceMessage";s:104:"A common misunderstanding is that if we save all the poor children: the world will become overpopulated.";}i:1;O:8:"stdClass":3:{s:2:"id";s:1:"2";s:9:"timestamp";s:29:"00:00:10,800 --> 00:00:13,599";s:13:"sourceMessage";s:39:"This may sound logical, but it's wrong.";}i:2;O:8:"stdClass":3:{s:2:"id";s:1:"3";s:9:"timestamp";s:29:"00:00:13,599 --> 00:00:16,199";s:13:"sourceMessage";s:25:"Its the other way around!";}i:3;O:8:"stdClass":3:{s:2:"id";s:1:"4";s:9:"timestamp";s:29:"00:00:16,199 --> 00:00:22,000";s:13:"sourceMessage";s:69:"Saving the poor childrens lives is required to end population growth.";}}
EOE;

        $expected = unserialize($expectedSerialized);

        $actual = $videoFile->getParsedSubtitles();

        codecept_debug(var_export($expected, true));
        codecept_debug(var_export($actual, true));
        codecept_debug(serialize($actual));

        $this->assertEquals(count($expected), count($actual));

        $this->assertEquals($expected, $actual);

    }

}