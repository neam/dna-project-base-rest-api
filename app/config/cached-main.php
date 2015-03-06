<?php return array (
  'modules' => 
  array (
    'p3media' => 
    array (
      'params' => 
      array (
        'presets' => 
        array (
          'dashboard-item-task-thumbnail' => 
          array (
            'name' => 'Dashboard Item Task Thumbnail',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 210,
                1 => 120,
                2 => 7,
              ),
              'quality' => '85',
            ),
            'type' => 'jpg',
          ),
          'related-thumb' => 
          array (
            'name' => 'Related Panel Thumbnail',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 200,
                1 => 200,
                2 => 2,
              ),
              'quality' => '100',
            ),
            'type' => 'jpg',
          ),
          'item-list-thumbnail' => 
          array (
            'name' => 'Item Thumbnail',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 110,
                1 => 70,
                2 => 2,
              ),
              'quality' => '85',
            ),
            'type' => 'jpg',
          ),
          'wide-profile-info-picture' => 
          array (
            'name' => 'Wide Profile Info Picture',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 110,
                1 => 110,
                2 => 7,
              ),
              'quality' => 85,
            ),
          ),
          'user-profile-picture' => 
          array (
            'name' => 'User Profile Picture',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 160,
                1 => 160,
                2 => 7,
              ),
              'quality' => '85',
            ),
            'type' => 'jpg',
          ),
          'user-profile-picture-large' => 
          array (
            'name' => 'User Profile Picture Large',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 262,
                1 => 262,
                2 => 7,
              ),
              'quality' => '85',
            ),
            'type' => 'jpg',
          ),
          'user-profile-picture-small' => 
          array (
            'name' => 'User Profile Picture Small',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 70,
                1 => 70,
                2 => 7,
              ),
              'quality' => '85',
            ),
            'type' => 'jpg',
          ),
          'user-profile-picture-mini' => 
          array (
            'name' => 'User Profile Picture Mini',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 25,
                1 => 25,
                2 => 7,
              ),
              'quality' => '85',
            ),
            'type' => 'jpg',
          ),
          'original-public-webm' => 
          array (
            'originalFile' => true,
            'savePublic' => true,
            'type' => 'webm',
          ),
          'original-public-mp4' => 
          array (
            'originalFile' => true,
            'savePublic' => true,
            'type' => 'mp4',
          ),
          'sir-trevor-image-block' => 
          array (
            'name' => 'Sir Trevor Image Block',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 600,
                1 => 600,
                2 => 2,
              ),
              'quality' => '85',
            ),
            'savePublic' => true,
            'type' => 'jpg',
          ),
          'original' => 
          array (
            'originalFile' => true,
          ),
          'original-public' => 
          array (
            'originalFile' => true,
            'savePublic' => true,
          ),
          '735x444' => 
          array (
            'name' => 'Item Thumbnail 735x444',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 735,
                1 => 444,
                2 => 7,
              ),
              'quality' => '85',
            ),
            'type' => 'jpg',
          ),
          '160x96' => 
          array (
            'name' => 'Item Thumbnail 160x96',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 160,
                1 => 96,
                2 => 7,
              ),
              'quality' => '85',
            ),
            'type' => 'jpg',
          ),
          '110x66' => 
          array (
            'name' => 'Item Thumbnail 110x66',
            'commands' => 
            array (
              'resize' => 
              array (
                0 => 110,
                1 => 66,
                2 => 7,
              ),
              'quality' => '85',
            ),
            'type' => 'jpg',
          ),
        ),
        'publicRuntimePath' => '../www/runtime/p3media',
        'publicRuntimeUrl' => '/runtime/p3media',
        'protectedRuntimePath' => 'runtime/p3media',
      ),
      'class' => 'dna-vendor.phundament.p3media.P3MediaModule',
      'dataAlias' => 'dna.db.data.p3media',
      'importAlias' => 'dna.db.data.p3media-import',
    ),
    'restrictedAccess' => 
    array (
      'class' => 'dna-vendor.neam.yii-restricted-access.modules.restrictedAccess.RestrictedAccessModule',
    ),
    'v1' => 
    array (
    ),
    'error' => 
    array (
      'class' => 'vendor.neam.yii-dna-debug-modes-and-error-handling.modules.error.ErrorModule',
    ),
  ),
  'components' => 
  array (
    'db' => 
    array (
      'connectionString' => 'mysql:host=172.17.42.1;port=13306;dbname=db',
      'emulatePrepare' => true,
      'username' => 'root',
      'password' => 'YqWw9M7wdp4FOBm5',
      'charset' => 'utf8',
      'enableParamLogging' => true,
      'schemaCacheID' => 'dbSchemaCache',
      'schemaCachingDuration' => 172800,
    ),
    'dbTest' => 
    array (
      'class' => 'system.db.CDbConnection',
      'connectionString' => 'mysql:host=172.17.42.1;port=13306;dbname=db_test',
      'emulatePrepare' => true,
      'username' => 'root',
      'password' => 'YqWw9M7wdp4FOBm5',
      'charset' => 'utf8',
      'enableParamLogging' => true,
      'autoConnect' => false,
    ),
    'workflowUi' => 
    array (
      'class' => 'dna-vendor.neam.yii-workflow-ui.components.WorkflowUi',
    ),
    'publicFilesResourceManager' => 
    array (
      'class' => 'EAmazonS3ResourceManager',
      'key' => 'AKIAIMQ3C3OHDDUBGGDQ',
      'secret' => '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',
      'bucket' => 'static.gapminderdev.org',
      'region' => 'eu-west-1',
    ),
    'urlManager' => 
    array (
      'class' => 'dna-vendor.phundament.p3extensions.components.P3LangUrlManager',
      'urlFormat' => 'path',
      'showScriptName' => false,
      'appendParams' => false,
      'useStrictParsing' => true,
      'rules' => 
      array (
        0 => 
        array (
          0 => '<version>/item/get',
          'pattern' => '<version:v\\d+>/item/<id:\\d+>/test/<itemType:\\w+>',
          'verb' => 'GET',
        ),
        1 => 
        array (
          0 => '<version>/profile/get',
          'pattern' => '<version:v\\d+>/profile',
          'verb' => 'GET',
        ),
        2 => 
        array (
          0 => '<version>/profile/update',
          'pattern' => '<version:v\\d+>/profile',
          'verb' => 'PUT',
        ),
        3 => 
        array (
          0 => '<version>/user/login',
          'pattern' => '<version:v\\d+>/user/login',
          'verb' => 'POST',
        ),
        4 => 
        array (
          0 => '<version>/profile/get',
          'pattern' => '<version:v\\d+>/user/profile',
          'verb' => 'GET',
        ),
        5 => 
        array (
          0 => '<version>/profile/update',
          'pattern' => '<version:v\\d+>/user/profile',
          'verb' => 'PUT',
        ),
        6 => 
        array (
          0 => '<version>/user/authenticate',
          'pattern' => '<version:v\\d+>/user/authenticate',
          'verb' => 'POST',
        ),
        7 => 
        array (
          0 => '<version>/profile/public',
          'pattern' => '<version:v\\d+>/user/<accountId:\\d+>/profile',
          'verb' => 'GET',
        ),
        8 => 
        array (
          0 => '<version>/item/getByNodeId',
          'pattern' => '<version:v\\d+>/item/<node_id:\\d+>',
          'verb' => 'GET',
        ),
        9 => 
        array (
          0 => '<version>/item/getByRoute',
          'pattern' => '<version:v\\d+>/item/<route:[\\w-\\/]+>',
          'verb' => 'GET',
        ),
        10 => 
        array (
          0 => '<version>/<controller>/list',
          'pattern' => '<version:v\\d+>/<controller:\\w+>',
          'verb' => 'GET',
        ),
        11 => 
        array (
          0 => '<version>/<controller>/create',
          'pattern' => '<version:v\\d+>/<controller:\\w+>',
          'verb' => 'POST',
        ),
        12 => 
        array (
          0 => '<version>/<controller>/get',
          'pattern' => '<version:v\\d+>/<controller:\\w+>/<id:\\d+|\\:[\\w-]+>',
          'verb' => 'GET',
        ),
        13 => 
        array (
          0 => '<version>/<controller>/update',
          'pattern' => '<version:v\\d+>/<controller:\\w+>/<id:\\d+|\\:[\\w-]+>',
          'verb' => 'PUT',
        ),
        14 => 
        array (
          0 => '<version>/<controller>/delete',
          'pattern' => '<version:v\\d+>/<controller:\\w+>/<id:\\d+|\\:[\\w-]+>',
          'verb' => 'DELETE',
        ),
        15 => 
        array (
          0 => '<version>/<controller>/<action>',
          'pattern' => '<version:v\\d+>/<controller:\\w+>/<action:\\w+>/<id:\\d+>',
          'verb' => 'GET',
        ),
        16 => 
        array (
          0 => '<version>/profile/preflight',
          'pattern' => '<version:v\\d+>/user/profile',
          'verb' => 'OPTIONS',
        ),
        17 => 
        array (
          0 => '<version>/profile/preflight',
          'pattern' => '<version:v\\d+>/user/<accountId:\\d+>/profile',
          'verb' => 'OPTIONS',
        ),
        18 => 
        array (
          0 => '<version>/item/preflight',
          'pattern' => '<version:v\\d+>/item/<id:\\d+|[\\w-\\/]+>',
          'verb' => 'OPTIONS',
        ),
        19 => 
        array (
          0 => '<version>/<controller>/preflight',
          'pattern' => '<version:v\\d+>/<controller:\\w+>',
          'verb' => 'OPTIONS',
        ),
        20 => 
        array (
          0 => '<version>/<controller>/preflight',
          'pattern' => '<version:v\\d+>/<controller:\\w+>/<action:\\w+>',
          'verb' => 'OPTIONS',
        ),
        21 => 
        array (
          0 => '<version>/<controller>/preflight',
          'pattern' => '<version:v\\d+>/<controller:\\w+>/<id:\\d+|\\:[\\w-]+>',
          'verb' => 'OPTIONS',
        ),
        22 => 
        array (
          0 => '<version>/<controller>/preflight',
          'pattern' => '<version:v\\d+>/<controller:\\w+>/<action:\\w+>/<id:\\d+>',
          'verb' => 'OPTIONS',
        ),
      ),
    ),
    'langHandler' => 
    array (
      'class' => 'dna-vendor.phundament.p3extensions.components.P3LangHandler',
      'languages' => 
      array (
        0 => 'en',
        1 => 'ar',
        2 => 'bg',
        3 => 'ca',
        4 => 'cs',
        5 => 'da',
        6 => 'de',
        7 => 'en_gb',
        8 => 'en_us',
        9 => 'el',
        10 => 'es',
        11 => 'fa',
        12 => 'fi',
        13 => 'fil',
        14 => 'fr',
        15 => 'he',
        16 => 'hi',
        17 => 'hr',
        18 => 'hu',
        19 => 'id',
        20 => 'it',
        21 => 'ja',
        22 => 'ko',
        23 => 'lt',
        24 => 'lv',
        25 => 'nl',
        26 => 'no',
        27 => 'pl',
        28 => 'pt',
        29 => 'pt_br',
        30 => 'pt_pt',
        31 => 'ro',
        32 => 'ru',
        33 => 'sk',
        34 => 'sl',
        35 => 'sr',
        36 => 'sv',
        37 => 'th',
        38 => 'tr',
        39 => 'uk',
        40 => 'vi',
        41 => 'zh',
        42 => 'zh_cn',
        43 => 'zh_tw',
      ),
    ),
    'messages' => 
    array (
      'class' => 'CPhpMessageSource',
    ),
    'coreMessages' => 
    array (
      'basePath' => NULL,
      'forceTranslation' => true,
    ),
    'displayedMessages' => 
    array (
      'class' => 'CDbMessageSource',
      'onMissingTranslation' => 
      array (
        0 => 'MissingTranslationHandler',
        1 => 'returnSourceLanguageContents',
      ),
    ),
    'editedMessages' => 
    array (
      'class' => 'CDbMessageSource',
      'onMissingTranslation' => 
      array (
        0 => 'MissingTranslationHandler',
        1 => 'returnNull',
      ),
    ),
    'authManager' => 
    array (
      'class' => 'dna-vendor.codemix.hybridauthmanager.HybridAuthManager',
      'authFile' => '/app/data/auth-gcms.php',
      'defaultRoles' => 
      array (
        0 => 'Anonymous',
        1 => 'Member',
      ),
    ),
    'user' => 
    array (
      'class' => 'WebUser',
      'loginUrl' => NULL,
      'behaviors' => 
      array (
        0 => 'dna-vendor.neam.yii-restricted-access.behaviors.RestrictedAccessWebUserBehavior',
      ),
      'allowAutoLogin' => false,
    ),
    'oauth2' => 
    array (
      'class' => 'OAuth2Yii\\Component\\ServerComponent',
      'userClass' => 'OAuth2User',
      'clientClass' => 'OAuth2Client',
      'enableAuthorization' => false,
      'enableImplicit' => false,
      'enableUserCredentials' => true,
      'enableClientCredentials' => false,
    ),
    'request' => 
    array (
      'class' => '\\YiiDnaHttpRequest',
    ),
    'session' => 
    array (
      'cookieMode' => 'none',
    ),
    'log' => 
    array (
      'class' => 'CLogRouter',
      'routes' => 
      array (
        0 => 
        array (
          'class' => 'CFileLogRoute',
          'levels' => 'error, warning',
        ),
      ),
    ),
    'dbSchemaCache' => 
    array (
      'class' => 'CApcCache',
    ),
    'sentry' => 
    array (
      'class' => '\\SentryClient',
      'dns' => NULL,
      'enabledEnvironments' => 
      array (
      ),
      'environment' => 'foo',
    ),
    'errorHandler' => 
    array (
      'class' => 'YiiDnaRestErrorHandler',
    ),
  ),
  'import' => 
  array (
    0 => 'dna-vendor.neam.yii-relational-graph-db.behaviors.RelatedNodesBehavior',
    1 => 'dna-vendor.neam.yii-relational-graph-db.behaviors.RelatedNodesSirTrevorUiBehavior',
    2 => 'dna-vendor.neam.yii-relational-graph-db.traits.GraphRelatableItemTrait',
    3 => 'dna-vendor.neam.yii-workflow-core.traits.ItemTrait',
    4 => 'dna-vendor.neam.yii-restricted-access.behaviors.*',
    5 => 'dna-vendor.neam.yii-restricted-access.helpers.*',
    6 => 'dna-vendor.neam.yii-restricted-access.components.*',
    7 => 'dna-vendor.neam.yii-restricted-access.modules.restrictedAccess.widgets.*',
    8 => 'dna-vendor.neam.yii-restricted-access.traits.*',
    9 => 'dna-vendor.phundament.p3media.models.*',
    10 => 'dna-vendor.bwoester.yii-static-events-component.*',
    11 => 'dna-vendor.bwoester.yii-event-interceptor.*',
    12 => 'dna-vendor.sammaye.auditrail2.models.AuditTrail',
    13 => 'dna-vendor.2amigos.resource-manager.*',
    14 => 'i18n-columns.behaviors.I18nColumnsBehavior',
    15 => 'i18n-attribute-messages.behaviors.I18nAttributeMessagesBehavior',
    16 => 'i18n-attribute-messages.components.MissingTranslationHandler',
    17 => 'dna-vendor.motin.yii-owner-behavior.OwnerBehavior',
    18 => 'dna-vendor.schmunk42.relation.behaviors.GtcSaveRelationsBehavior',
    19 => 'qa-state.behaviors.QaStateBehavior',
    20 => 'relational-graph-db.behaviors.RelationalGraphDbBehavior',
    21 => 'dna.components.*',
    22 => 'dna.config.*',
    23 => 'dna.components.validators.*',
    24 => 'dna.behaviors.*',
    25 => 'dna.models.*',
    26 => 'dna.models.base.*',
    27 => 'dna.models.metadata.*',
    28 => 'dna.models.metadata.traits.*',
    29 => 'dna.models.unused.*',
    30 => 'dna.helpers.*',
    31 => 'dna.traits.*',
    32 => 'dna-vendor.neam.yii-i18n-tools.helpers.LanguageHelper',
    33 => 'application.behaviors.*',
    34 => 'application.components.*',
    35 => 'application.controllers.*',
    36 => 'application.interfaces.*',
    37 => 'application.models.*',
    38 => 'application.traits.*',
    39 => 'vendor.weavora.wrest.*',
    40 => 'vendor.weavora.wrest.actions.*',
    41 => 'vendor.weavora.wrest.behaviors.*',
    42 => 'vendor.neam.yii-dna-debug-modes-and-error-handling.components.*',
    43 => 'vendor.neam.yii-dna-debug-modes-and-error-handling.exceptions.*',
    44 => 'vendor.neam.yii-dna-debug-modes-and-error-handling.traits.YiiDnaWebApplicationTrait',
    45 => 'vendor.crisu83.yii-sentry.components.SentryErrorHandler',
    46 => 'vendor.crisu83.yii-sentry.components.SentryClient',
  ),
  'aliases' => 
  array (
    'jquery-file-upload' => 'dna-vendor.phundament.jquery-file-upload',
    'jquery-file-upload-widget' => 'dna-vendor.phundament.p3extensions.widgets.jquery-file-upload',
    'jquery-file-upload-widget.EFileUpload' => 'dna-vendor.phundament.p3extensions.widgets.jquery-file-upload.EFileUpload',
    'root' => '/code/cms/yiiapps/rest-api/app/../../..',
    'dna' => '/code/cms/yiiapps/rest-api/app/../../../dna',
    'i18n-columns' => 'dna-vendor.neam.yii-i18n-columns',
    'i18n-attribute-messages' => 'dna-vendor.neam.yii-i18n-attribute-messages',
    'qa-state' => 'dna-vendor.neam.yii-qa-state',
    'relational-graph-db' => 'dna-vendor.neam.yii-relational-graph-db',
    'phpexcel' => 'dna-vendor.phpoffice.phpexcel.Classes',
    'phpword' => 'dna-vendor.phpoffice.phpword.src',
    'phppowerpoint' => 'dna-vendor.phpoffice.phppowerpoint.Classes',
    'vendor.sammaye.auditrail2.behaviors.LoggableBehavior' => 'dna-vendor.sammaye.auditrail2.behaviors.LoggableBehavior',
    'vendor.yiiext.status-behavior.EStatusBehavior' => 'dna-vendor.yiiext.status-behavior.EStatusBehavior',
    'vendor.mikehaertl.translatable.Translatable' => 'dna-vendor.mikehaertl.translatable.Translatable',
    'YiiPassword' => 'dna-vendor.phpnode.yiipassword.src.YiiPassword',
    '\\YiiPassword\\Behavior' => 'dna-vendor.phpnode.yiipassword.src.YiiPassword.Behavior',
    'app' => '/code/cms/yiiapps/rest-api/app',
    'vendor' => '/code/cms/yiiapps/rest-api/app/../vendor',
    'OAuth2Yii' => 'vendor.codemix.oauth2yii.src.OAuth2Yii',
    'ext.wrest' => 'vendor.weavora.wrest',
    'ext.wrest.WRestController' => 'vendor.weavora.wrest.WRestController',
    'ext.wrest.WHttpRequest' => 'vendor.weavora.wrest.WHttpRequest',
    'ext.wrest.WRestResponse' => 'vendor.weavora.wrest.WRestResponse',
    'ext.wrest.JsonResponse' => 'vendor.weavora.wrest.JsonResponse',
  ),
  'behaviors' => 
  array (
  ),
  'name' => 'Gapminder CMS DNA',
  'language' => 'en',
  'theme' => NULL,
  'sourceLanguage' => 'en',
  'preload' => 
  array (
    0 => 'log',
    1 => 'langHandler',
  ),
  'params' => 
  array (
    'languages' => 
    array (
      'en' => 'English',
      'ar' => 'العربية',
      'bg' => 'Български',
      'ca' => 'Català',
      'cs' => 'Čeština',
      'da' => 'Dansk',
      'de' => 'Deutsch',
      'en_gb' => 'UK English',
      'en_us' => 'US English',
      'el' => 'Ελληνικά',
      'es' => 'Español',
      'fa' => 'فارسی',
      'fi' => 'Suomi',
      'fil' => 'Filipino',
      'fr' => 'Français',
      'he' => 'עברית',
      'hi' => 'हिंदी',
      'hr' => 'Hrvatski',
      'hu' => 'Magyar',
      'id' => 'Bahasa Indonesia',
      'it' => 'Italiano',
      'ja' => '日本語',
      'ko' => '한국어',
      'lt' => 'Lietuvių',
      'lv' => 'Latviešu valoda',
      'nl' => 'Nederlands',
      'no' => 'Norsk',
      'pl' => 'Polski',
      'pt' => 'Português',
      'pt_br' => 'Português (Brasil)',
      'pt_pt' => 'Português (Portugal)',
      'ro' => 'Română',
      'ru' => 'Русский',
      'sk' => 'Slovenský',
      'sl' => 'Slovenščina',
      'sr' => 'Српски',
      'sv' => 'Svenska',
      'th' => 'ไทย',
      'tr' => 'Türkçe',
      'uk' => 'Українська',
      'vi' => 'Tiếng Việt',
      'zh' => '中文',
      'zh_cn' => '中文 (简体)',
      'zh_tw' => '中文 (繁體)',
    ),
    'languageDirections' => 
    array (
      'en' => 'ltr',
      'ar' => 'rtl',
      'bg' => 'ltr',
      'ca' => 'ltr',
      'cs' => 'ltr',
      'da' => 'ltr',
      'de' => 'ltr',
      'en_gb' => 'ltr',
      'en_us' => 'ltr',
      'el' => 'ltr',
      'es' => 'ltr',
      'fa' => 'rtl',
      'fi' => 'ltr',
      'fil' => 'ltr',
      'fr' => 'ltr',
      'he' => 'rtl',
      'hi' => 'ltr',
      'hr' => 'ltr',
      'hu' => 'ltr',
      'id' => 'ltr',
      'it' => 'ltr',
      'ja' => 'ltr',
      'ko' => 'ltr',
      'lt' => 'ltr',
      'lv' => 'ltr',
      'nl' => 'ltr',
      'no' => 'ltr',
      'pl' => 'ltr',
      'pt' => 'ltr',
      'pt_br' => 'ltr',
      'pt_pt' => 'ltr',
      'ro' => 'ltr',
      'ru' => 'ltr',
      'sk' => 'ltr',
      'sl' => 'ltr',
      'sr' => 'ltr',
      'sv' => 'ltr',
      'th' => 'ltr',
      'tr' => 'ltr',
      'uk' => 'ltr',
      'vi' => 'ltr',
      'zh' => 'ltr',
      'zh_cn' => 'ltr',
      'zh_tw' => 'ltr',
    ),
  ),
  'basePath' => '/code/cms/yiiapps/rest-api/app',
);