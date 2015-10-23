<?php

/**
 * Interface for resource nodes represented in related sections.
 * A related section can appear in any response structure that should list related items.
 *
 * Example of a "composition" response structure:
 * {
 *   "heading": "demo heading",
 *   "subheading": "demo subheading",
 *   "about": "demo about",
 *   "item_type": "composition",
 *   "composition_type": "exercise",
 *   "composition": {},
 *   "contributors": [],
 *   "related": [
 *     {
 *       "node_id": 0,
 *       "item_type": "composition",
 *       "id": 0,
 *       "heading": "demo heading",
 *       "subheading": "demo subheading",
 *       "thumb": "http://url_of_thumbnail_image.jpg",
 *       "caption": "demo caption",
 *       "slug": "demo-slug",
 *       "composition_type": "presentation",
 *     }
 *   ]
 * }
 */
interface RelatedResource
{
    /**
     * Returns the attributes for the the resource when included in a related section of a response.
     *
     * @return array the attributes.
     */
    public function getRelatedAttributes();
}
