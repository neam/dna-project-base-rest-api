<?php

class SirTrevorBlockFactory extends \CApplicationComponent
{
    /**
     * @var array map of models that represent a Sir Trevor block.
     * Must extend RestApiSirTrevorBlock base class.
     */
    protected static $blocks = array(
        'text' => 'RestApiSirTrevorBlockText',
        'heading' => 'RestApiSirTrevorBlockHeading',
        'quote' => 'RestApiSirTrevorBlockQuote',
        'list' => 'RestApiSirTrevorBlockList',
        'linked_image' => 'RestApiSirTrevorBlockLinkedImage',
        'html_chunk' => 'RestApiSirTrevorBlockHtmlChunk',
        'download_link' => 'RestApiSirTrevorBlockDownloadLink',
    );

    /**
     * Forges a new block model for the given data.
     * The data must include at least an `id` and a `type`.
     *
     * @param array $data the data for the block model.
     * @return RestApiSirTrevorBlock the block model.
     * @throws \CException if model cannot be created.
     */
    public function forgeBlock(array $data)
    {
        if (!isset($data['type'], $data['id'])) {
            throw new \CException('Block data is missing either `type` or `id`.');
        }
        if (!isset(self::$blocks[$data['type']])) {
            throw new \CException(sprintf('No block model found for `%s`.', $data['type']));
        }
        /** @var RestApiSirTrevorBlock $model */
        $model = new self::$blocks[$data['type']]();
        $model->id = $data['id'];
        $model->type = $data['type'];
        return $model;
    }
}
