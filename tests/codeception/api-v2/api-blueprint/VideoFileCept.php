<?php
$scenario->group('data:test-db,coverage:basic');
$I = new \ApiGuy\ApiClientSteps($scenario);

$I->wantTo('list all video files via the REST API as defined in api blueprint');
$I->sendGET('videoFile');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    array(
        "node_id" => 1,
        "item_type" => "video_file",
        "url" => NULL,
        "attributes" => array (
            "title" => "Will saving poor children lead to overpopulation?",
            "about" => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.",
            "caption" => "No. Its the opposite.",
            "slug" => "will-saving-poor-children-lead-to-overpopulation",
            "url_mp4" => "http://web/files-api/p3media/file/image?id=2&preset=original-public-mp4&title=media&extension=.mp4",
            "url_webm" => "http://web/files-api/p3media/file/image?id=1&preset=original-public-webm&title=media&extension=.webm",
            "url_youtube" => NULL,
            "url_subtitles" => "http://web/api/v1/videoFile/subtitles/1?lang=en",
            "thumb" => array (
                "original" => "http://web/files-api/p3media/file/image?id=5&preset=original-public&title=media&extension=.jpeg",
                "735x444"=> "http://web/files-api/p3media/file/image?id=5&preset=735x444&title=media&extension=.jpg",
                "160x96"=> "http://web/files-api/p3media/file/image?id=5&preset=160x96&title=media&extension=.jpg",
                "110x66"=> "http://web/files-api/p3media/file/image?id=5&preset=110x66&title=media&extension=.jpg",
                "130x77"=> "http://web/files-api/p3media/file/image?id=5&preset=130x77&title=media&extension=.jpg",
                "180x108"=> "http://web/files-api/p3media/file/image?id=5&preset=180x108&title=media&extension=.jpg",
                "735x444-retina"=> "http://web/files-api/p3media/file/image?id=5&preset=735x444-retina&title=media&extension=.jpg",
                "160x96-retina"=> "http://web/files-api/p3media/file/image?id=5&preset=160x96-retina&title=media&extension=.jpg",
                "110x66-retina"=> "http://web/files-api/p3media/file/image?id=5&preset=110x66-retina&title=media&extension=.jpg",
                "130x77-retina"=> "http://web/files-api/p3media/file/image?id=5&preset=130x77-retina&title=media&extension=.jpg",
                "180x108-retina"=> "http://web/files-api/p3media/file/image?id=5&preset=180x108-retina&title=media&extension=.jpg"
            ),
        ),
        "related" => array()
    ),
    array (
        "node_id" => 2,
        "item_type" => "video_file",
        "url" => NULL,
        "attributes" => array (
            "title" => "Are income and lifespan related?",
            "about" => "In this video Hans talks about how income and lifespan are related to each other.",
            "caption" => NULL,
            "slug" => "are-income-and-lifespan-related",
            "url_mp4" => "http://web/files-api/p3media/file/image?id=4&preset=original-public-mp4&title=media&extension=.mp4",
            "url_webm" => "http://web/files-api/p3media/file/image?id=3&preset=original-public-webm&title=media&extension=.webm",
            "url_youtube" => NULL,
            "url_subtitles" => "http://web/api/v1/videoFile/subtitles/2?lang=en",
            "thumb" => array (
                "original" => "http://web/files-api/p3media/file/image?id=6&preset=original-public&title=media&extension=.jpeg",
                "735x444"=> "http://web/files-api/p3media/file/image?id=6&preset=735x444&title=media&extension=.jpg",
                "160x96"=> "http://web/files-api/p3media/file/image?id=6&preset=160x96&title=media&extension=.jpg",
                "110x66"=> "http://web/files-api/p3media/file/image?id=6&preset=110x66&title=media&extension=.jpg",
                "130x77"=> "http://web/files-api/p3media/file/image?id=6&preset=130x77&title=media&extension=.jpg",
                "180x108"=> "http://web/files-api/p3media/file/image?id=6&preset=180x108&title=media&extension=.jpg",
                "735x444-retina"=> "http://web/files-api/p3media/file/image?id=6&preset=735x444-retina&title=media&extension=.jpg",
                "160x96-retina"=> "http://web/files-api/p3media/file/image?id=6&preset=160x96-retina&title=media&extension=.jpg",
                "110x66-retina"=> "http://web/files-api/p3media/file/image?id=6&preset=110x66-retina&title=media&extension=.jpg",
                "130x77-retina"=> "http://web/files-api/p3media/file/image?id=6&preset=130x77-retina&title=media&extension=.jpg",
                "180x108-retina"=> "http://web/files-api/p3media/file/image?id=6&preset=180x108-retina&title=media&extension=.jpg"
            ),
        ),
        "related" => array(),
    )
));

$I->wantTo('get video file by id via the REST API as defined in api blueprint');
$I->sendGET('videoFile/1');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    "node_id" => 1,
    "item_type" => "video_file",
    "url" => NULL,
    "attributes" => array (
        "title" => "Will saving poor children lead to overpopulation?",
        "about" => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.",
        "caption" => "No. Its the opposite.",
        "slug" => "will-saving-poor-children-lead-to-overpopulation",
        "url_mp4" => "http://web/files-api/p3media/file/image?id=2&preset=original-public-mp4&title=media&extension=.mp4",
        "url_webm" => "http://web/files-api/p3media/file/image?id=1&preset=original-public-webm&title=media&extension=.webm",
        "url_youtube" => NULL,
        "url_subtitles" => "http://web/api/v1/videoFile/subtitles/1?lang=en",
        "thumb" => array (
            "original" => "http://web/files-api/p3media/file/image?id=5&preset=original-public&title=media&extension=.jpeg",
            "735x444"=> "http://web/files-api/p3media/file/image?id=5&preset=735x444&title=media&extension=.jpg",
            "160x96"=> "http://web/files-api/p3media/file/image?id=5&preset=160x96&title=media&extension=.jpg",
            "110x66"=> "http://web/files-api/p3media/file/image?id=5&preset=110x66&title=media&extension=.jpg",
            "130x77"=> "http://web/files-api/p3media/file/image?id=5&preset=130x77&title=media&extension=.jpg",
            "180x108"=> "http://web/files-api/p3media/file/image?id=5&preset=180x108&title=media&extension=.jpg",
            "735x444-retina"=> "http://web/files-api/p3media/file/image?id=5&preset=735x444-retina&title=media&extension=.jpg",
            "160x96-retina"=> "http://web/files-api/p3media/file/image?id=5&preset=160x96-retina&title=media&extension=.jpg",
            "110x66-retina"=> "http://web/files-api/p3media/file/image?id=5&preset=110x66-retina&title=media&extension=.jpg",
            "130x77-retina"=> "http://web/files-api/p3media/file/image?id=5&preset=130x77-retina&title=media&extension=.jpg",
            "180x108-retina"=> "http://web/files-api/p3media/file/image?id=5&preset=180x108-retina&title=media&extension=.jpg"
        ),
    ),
    "related" => array()
));

$I->wantTo('get video file subtitles by the video id via the REST API as defined in api blueprint');
$I->sendGET('videoFile/subtitles/1');
$I->seeResponseCodeIs(200);
// We use contains instead of equals as text/html responses come with a line break at the end, but in blueprint you cannot define the line break.
$I->seeResponseContains("1
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

5
00:00:22,000 --> 00:00:24,699
Now! Look at the UN numbers.

6
00:00:24,699 --> 00:00:30,199
Poor parents on avarage have five children. And one dies.

7
00:00:30,199 --> 00:00:36,100
Look! Two parents are replaced by four surviving children in the next generation.

8
00:00:36,100 --> 00:00:39,600
This means the population is growing very fast among the poorest.

9
00:00:39,600 --> 00:00:46,200
This is the avarage family in the worst of places like Congo and Afghanistan.

10
00:00:46,200 --> 00:00:55,399
Today, where child mortality is highest, that's where the population is growing faster than anywhere else.

11
00:00:55,399 --> 00:00:57,700
How many people live like this?

12
00:00:57,700 --> 00:01:03,899
There are seven billion people in the world. One block: one billion.

13
00:01:03,899 --> 00:01:07,400
The poorest two billion...

14
00:01:07,400 --> 00:01:08,799
...they live like this.

15
00:01:08,799 --> 00:01:11,500
The other five billion...

16
00:01:13,799 --> 00:01:20,900
...they have this avarage family. Two parents having two children and there are few child deaths.

17
00:01:20,900 --> 00:01:25,000
This is the majority of the world population, not only Europe and the US.

18
00:01:25,000 --> 00:01:32,293
It's throughout religions and cultures: China, Iran, Mexico, large cities in Africa.

19
00:01:32,293 --> 00:01:38,199
Today in most populations children just replace parents.

20
00:01:38,199 --> 00:01:42,099
And the size of generations are no longer increasing.

21
00:01:42,099 --> 00:01:46,700
This means: the population will stop growing.

22
00:01:46,700 --> 00:01:51,500
How did so many people end up with small families?

23
00:01:51,500 --> 00:01:54,700
Well,  their children stopped dying.

24
00:01:54,700 --> 00:02:00,500
As they left extreme poverty and girls got education: parents no longer had to

25
00:02:00,500 --> 00:02:06,500
compensate for child death by having many babies. And a large family stopped being

26
00:02:06,500 --> 00:02:09,199
an economic necessity or a social status symbol.

27
00:02:09,199 --> 00:02:15,000
And with modern contraceptives: parents across the world, the majority

28
00:02:15,000 --> 00:02:18,000
decided to have a small family.

29
00:02:18,000 --> 00:02:26,000
So by saving the lives of poor children and helping the last two billion out of poverty:

30
00:02:26,000 --> 00:02:33,199
These parents will also decide to have fewer children.

31
00:02:33,199 --> 00:02:37,199
And fewer.

32
00:02:37,199 --> 00:02:39,099
Eventually...

33
00:02:39,099 --> 00:02:43,000
...reaching the two child family

34
00:02:43,000 --> 00:02:48,400
That showed the UN family size forcast up to the end of the century.

35
00:02:48,400 --> 00:02:52,900
Then the world population is expected to stop growing.

36
00:02:52,900 --> 00:03:01,599
Before it stops: another four billion people will be added to the world population.

37
00:03:01,599 --> 00:03:06,400
Four billion more. That's a lot of people!

38
00:03:06,400 --> 00:03:15,300
But the longer poor children keeps dying and this change is delayed:

39
00:03:15,300 --> 00:03:20,699
the more billions will be added.

40
00:03:20,699 --> 00:03:28,099
So ending population growth starts by saving the poorest children.
");
