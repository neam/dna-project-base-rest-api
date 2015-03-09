<?php
/* @var string $approot */
/* @var string $root */
/* @var string $actionroot */

//require_once($root . '/dna/components/Barebones.php');
require_once($root . '/dna/vendor/neam/yii-relational-graph-db/traits/GraphRelatableItemTrait.php');
// TODO: use ItemTypes::where('generate_yii_rest_api_crud') or similar when in use
$itemTypes = [
    "Composition",
    "Page",
    "DownloadLink",
    "ItemListConfig",
    "I18nCatalog",
    "Tool",
    "Visualization",
    "Profile",
];
foreach ($itemTypes as $modelClass) {
    require_once($root . '/dna/models/metadata/traits/' . $modelClass . 'Trait.php');
}

//require_once($root . '/');

class Yii extends \barebones\Yii
{

}

class Composition extends \barebones\ActiveRecord
{
    use CompositionTrait;

    public $__table = 'composition';
}

class Page extends \barebones\ActiveRecord
{
    use PageTrait;

    public $__table = 'page';
}

class DownloadLink extends \barebones\ActiveRecord
{
    use DownloadLinkTrait;

    public $__table = 'download_link';
}

class ItemListConfig extends \barebones\ActiveRecord
{
    use ItemListConfigTrait;

    public $__table = 'item_list_config';
}

class I18nCatalog extends \barebones\ActiveRecord
{
    use I18nCatalogTrait;

    public $__table = 'i18n_catalog';
}

class Tool extends \barebones\ActiveRecord
{
    use ToolTrait;

    public $__table = 'tool';

    public function relationI18nCatalog()
    {
        return $this->attributes["i18nCatalog"] = I18nCatalog::model()->findByPk($this->i18n_catalog_id);
    }

}

class Visualization extends \barebones\ActiveRecord
{
    use ItemListConfigTrait;

    public $__table = 'visualization';

    public function relationTool()
    {
        return $this->attributes["tool"] = Tool::model()->findByPk($this->tool_id);
    }

}

class Profile extends \barebones\ActiveRecord
{
    use ItemListConfigTrait;

    public $__table = 'profile';
}

require_once($root . '/yiiapps/rest-api/app/interfaces/RelatedResource.php');
require_once($root . '/yiiapps/rest-api/app/interfaces/SirTrevorBlock.php');

$restApiItemTypes = [
    "Composition",
    "Page",
    "DownloadLink",
    "ItemListConfig",
    "Visualization",
    "Profile",
];
foreach ($restApiItemTypes as $modelClass) {
    require_once($root . '/yiiapps/rest-api/app/models/RestApi' . $modelClass . '.php');
}

require_once($root . '/yiiapps/rest-api/app/components/ContributorItems.php');
require_once($root . '/yiiapps/rest-api/app/components/RelatedItems.php');
require_once($root . '/yiiapps/rest-api/app/components/SirTrevorParser.php');

// Load p3media presets config
$config = ["modules" => ["p3media" => ["params" => ["presets" => []]]]];
require("$root/dna/config/includes/p3media-presets.php");
