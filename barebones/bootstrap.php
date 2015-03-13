<?php
/* @var string $approot */
/* @var string $root */
/* @var string $actionroot */

//require_once($root . '/dna/components/Barebones.php');
require_once($root . '/dna/config/ItemTypes.php');
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
    "SlideshowFile",
    "Group",
    "GroupHasAccount",
    "Account",
    "SocialLink",
    "Contribution",
    "Profile",
    "NavigationTreeItem",
];
foreach ($itemTypes as $modelClass) {
    require_once($root . '/dna/models/metadata/traits/' . $modelClass . 'Trait.php');
}

//require_once($root . '/');

// Init sentry
$sentryClient = new Raven_Client(SENTRY_DSN);
$errorHandler = new Raven_ErrorHandler($sentryClient);

// Register error handler callbacks
set_error_handler(array($errorHandler, 'handleError'));
set_exception_handler(array($errorHandler, 'handleException'));

// Handle fatal errors
register_shutdown_function(function () {
    $error = error_get_last();
    if ($error !== null) {

        // The information that we show to the end-user
        $publicInfo = array(
            'code' => 500,
        );

        // Set the error as public when in debug mode
        if (YII_DEBUG) {
            $publicInfo["error"] = $error;
        }

        // Error has already been reported by sentry - redirect to error-page instead of letting the user stare
        // at a white screen of death
        $errorQs = http_build_query($publicInfo);

        $isFatal = ($error["type"] == E_ERROR);

        // todo: fix hard-coded path
        if (strpos(Yii::app()->request->requestUri, "api/v1/error") === false) {

            $url = Yii::app()->request->baseUrl . "/api/v1/error?$errorQs";
            if (!headers_sent($filename, $linenum)) {
                header("Location: $url");
                exit;
            } else {
                throw new Exception("Shutdown handler error redirect to $url failed since headers were sent in $filename on line $linenum. Error: " . print_r($error, true));
                exit;
            }

        } else {
            // Error when loading site/error - we can't do much but throw an exception about the error
            throw new Exception("Error when loading site/error: " . print_r($error, true));
        }
    }
});
// Necessary in order for locations to work
ini_set('display_errors', false);

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

    public function relationRestApiCustomPageChildren()
    {
        return $this->attributes["restApiCustomPageChildren"] = RestApiPage::model()->findAll('parent_page_id = ?', $this->id);
    }

    public function relationRestApiCustomPageParent()
    {
        return $this->attributes["restApiCustomPageParent"] = RestApiPage::model()->findByPk($this->parent_page_id);
    }

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

class SlideshowFile extends \barebones\ActiveRecord
{
    use SlideshowFileTrait;

    public $__table = 'slideshow_file';

}

class Group extends \barebones\ActiveRecord
{
    use GroupTrait;

    public $__table = 'group';

}

class GroupHasAccount extends \barebones\ActiveRecord
{
    use GroupHasAccountTrait;

    public $__table = 'group_has_account';

    public function relationGroup()
    {
        return $this->attributes["group"] = Group::model()->findByPk($this->group_id);
    }

}

class Account extends \barebones\ActiveRecord
{
    use AccountTrait;

    public $__table = 'account';

    public function relationGroupHasAccounts()
    {
        return $this->attributes["groupHasAccounts"] = GroupHasAccount::model()->findAll('account_id = ?', $this->id);
    }

}

class SocialLink extends \barebones\ActiveRecord
{
    use SocialLinkTrait;

    public $__table = 'social_link';

}

class Contribution extends \barebones\ActiveRecord
{
    use ContributionTrait;

    public $__table = 'contribution';

}

class Profile extends \barebones\ActiveRecord
{
    use ProfileTrait;

    public $__table = 'profile';

    public function relationAccount()
    {
        return $this->attributes["account"] = Account::model()->findByPk($this->account_id);
    }

    public function relationSocialLinks()
    {
        return $this->attributes["socialLinks"] = SocialLink::model()->findAll('profile_id = ?', $this->id);
    }

    public function relationContributions()
    {
        return $this->attributes["contributions"] = Contribution::model()->findAll('profile_id = ?', $this->id);
    }

}

class NavigationTreeItem extends \barebones\ActiveRecord
{
    use NavigationTreeItemTrait;

    public $__table = 'navigation_tree_item';

    public $hasManyRoots=true;
    public $rootAttribute='root';
    public $leftAttribute='lft';
    public $rightAttribute='rgt';
    public $levelAttribute='level';

    /**
     * @return NavigationTreeItem
     */
    public function children()
    {
        return $this->descendants(1);
    }

    /**
     * @param null|int $depth
     * @return NavigationTreeItem
     */
    public function descendants($depth = null)
    {
        $leftAttr = $this->leftAttribute;
        $leftValue = (int)$this->{$leftAttr};
        $rightAttr = $this->rightAttribute;
        $rightValue = (int)$this->{$rightAttr};

        $this->criteria['orderBy'] = "ORDER BY {$leftAttr} ASC";
        $this->criteria['condition'] = "{$leftAttr}>{$leftValue} AND {$rightAttr}<{$rightValue}";

        if (!is_null($depth)) {
            $lvlAttr = $this->levelAttribute;
            $lvlValue = (int)($this->{$lvlAttr} + (int)$depth);
            $this->criteria['condition'] .= " AND {$lvlAttr}<={$lvlValue}";
        }

        if ($this->hasManyRoots) {
            $rootAttr = $this->rootAttribute;
            $rootValue = (int)$this->{$rootAttr};
            $this->criteria['condition'] .= " AND {$rootAttr}={$rootValue}";
        }

        return $this;
    }
}

require_once($root . '/yiiapps/rest-api/app/interfaces/RelatedResource.php');
require_once($root . '/yiiapps/rest-api/app/interfaces/SirTrevorBlock.php');

$restApiItemTypes = [
    "Composition",
    "Page",
    "DownloadLink",
    "ItemListConfig",
    "Visualization",
    "SlideshowFile",
    "Profile",
    "NavigationTreeItem",
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
