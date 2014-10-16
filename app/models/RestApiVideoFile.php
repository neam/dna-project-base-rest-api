<?php

/**
 * Video file resource.
 */
class RestApiVideoFile extends VideoFile
{
    /**
     * @inheritdoc
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                'rest-model-behavior' => array(
                    'class' => 'WRestModelBehavior',
                ),
                'RestrictedAccessBehavior' => array(
                    'class' => '\RestrictedAccessBehavior',
                ),
            )
        );
    }

    /**
     * The attributes that is returned by the REST api.
     *
     * @return object the response object as a stdClass.
     */
    public function getAllAttributes()
    {
        $response = new stdClass();

        $response->id = $this->id;
        $response->title = $this->title;
        $response->slug = $this->slug;
        $response->caption = $this->caption;
        $response->about = $this->about;
        //$response->tags = $this->tags;
        $response->subtitles = Yii::app()->createAbsoluteUrl('api/videoFile/subtitles', array('id' => $this->id));
        $response->thumbnail = new stdClass();
        if (!is_null($this->thumbnail_media_id)) {
            $response->thumbnail->original = $this->thumbnailMedia->createUrl('original-public', true);
            $response->thumbnail->thumb = $this->thumbnailMedia->createUrl('related-thumb', true);
        }
        $response->clipWebm = !is_null($this->clip_webm_media_id) ? $this->clipWebmMedia->createUrl('original-public-webm', true) : null;
        $response->clipMp4 = !is_null($this->clip_mp4_media_id) ? $this->clipMp4Media->createUrl('original-public-mp4', true) : null;
        $response->youtube_url = $this->youtube_url;

        if (/*$includeRelated*/true) {
            $response->related = array();
            // TODO: Refactor this and the corresponding logic in Snapshot into a yii-relational-graph-db trait or at least ItemTrait
            foreach ($this->related as $relatedNodes) {
                try {
                    $related = $relatedNodes->item();
                    $response->related[] = $related->getAllAttributes(false);
                } catch (NodeItemExistsButIsRestricted $e) {
                    // Ignore restricted nodes
                }
            }
        }

        //$response->overlays = $this->overlays;
        //$response->dubbing = $this->dubbing;

        return $response;
    }
} 