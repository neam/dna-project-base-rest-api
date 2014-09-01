<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('add related items to a video.');

$I->login('max', 'testtest');

// Create some videos to add as related items
for ($count = 1; $count <= 3; $count++) {

    $I->createVideoFile(
        array(
            'info' => array(
                VideoFileEditPage::$titleField => 'Related video #' . $count,
            ),
        )
    );
}


// Add related items
$I->editVideoFile(
    'Max video',
    array(
        'related' => array(
            VideoFileEditPage::$relatedField => function () use ($I) {
                $I->selectRelated(VideoFileEditPage::$relatedField, array('Related video #1', 'Related video #2'));
            }
        ),
    )
);

$I->seeVideoRelatedItems('Max video', array('Related video #1', 'Related video #2'));

// Replace a related item

$I->editVideoFile(
    'Max video',
    array(
        'related' => array(
            VideoFileEditPage::$relatedField => function () use ($I) {
                $I->removeRelated(VideoFileEditPage::$relatedField, array('Related video #2'));
                $I->selectRelated(VideoFileEditPage::$relatedField, array('Related video #3'));
            }
        ),
    )
);

$I->seeVideoRelatedItems('Max video', array('Related video #1', 'Related video #3'));
