<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('add related items to a video.');

$I->login('max', 'test');

$titles = array();
// Create some videos to add as related items
for ($count = 1; $count <= 3; $count++) {

    $name = 'Related video #' . $count;
    $titles[] = $name;

    $I->createVideoFile(
        array(
            'info' => array(
                VideoFileEditPage::$titleField => $name,
            )
        )
    );

}

$I->editVideoFile(
    'Max video',
    array(
        'related' => array(
            VideoFileEditPage::$relatedField => function () use ($I, $titles) {
                $I->selectRelated(VideoFileEditPage::$relatedField, $titles);
            }
        ),
    )
);
