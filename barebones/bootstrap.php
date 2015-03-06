<?php
/* @var string $approot */
/* @var string $root */
/* @var string $actionroot */

require_once($root . '/dna/components/Barebones.php');
require_once($root . '/dna/vendor/neam/yii-relational-graph-db/traits/GraphRelatableItemTrait.php');
require_once($root . '/dna/models/metadata/traits/CompositionTrait.php');
require_once($root . '/dna/models/metadata/traits/PageTrait.php');

//require_once($root . '/');

class Yii extends \barebones\Yii {

}

class Composition
{
    use CompositionTrait;
}

class Page
{
    use PageTrait;
}

require_once($root . '/yiiapps/rest-api/app/interfaces/RelatedResource.php');
require_once($root . '/yiiapps/rest-api/app/models/RestApiComposition.php');
require_once($root . '/yiiapps/rest-api/app/models/RestApiCustomPage.php');
