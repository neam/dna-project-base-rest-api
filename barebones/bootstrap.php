<?php
/* @var string $approot */
/* @var string $root */
/* @var string $actionroot */

//require_once($root . '/dna/components/Barebones.php');
require_once($root . '/dna/vendor/neam/yii-relational-graph-db/traits/GraphRelatableItemTrait.php');
require_once($root . '/dna/models/metadata/traits/CompositionTrait.php');
require_once($root . '/dna/models/metadata/traits/PageTrait.php');
require_once($root . '/dna/models/metadata/traits/DownloadLinkTrait.php');

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

require_once($root . '/yiiapps/rest-api/app/interfaces/RelatedResource.php');
require_once($root . '/yiiapps/rest-api/app/interfaces/SirTrevorBlock.php');
require_once($root . '/yiiapps/rest-api/app/models/RestApiComposition.php');
require_once($root . '/yiiapps/rest-api/app/models/RestApiCustomPage.php');
require_once($root . '/yiiapps/rest-api/app/models/RestApiDownloadLink.php');

require_once($root . '/yiiapps/rest-api/app/components/SirTrevorParser.php');
require_once($root . '/yiiapps/rest-api/app/components/ContributorItems.php');
require_once($root . '/yiiapps/rest-api/app/components/RelatedItems.php');