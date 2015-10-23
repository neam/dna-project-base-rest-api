<?php

class BaseI18nCatalogController extends AppRestController
{
    /**
     * @var string the class name of the model resource.
     */
    protected $_modelName = "I18nCatalog";

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return array(
            'list' => array(
                'class' => 'WRestListAction',
                'limit' => 'limit',
                'page' => 'page',
                'order' => 'order',
            ),
            'get' => 'WRestGetAction',
//            'delete' => 'WRestDeleteAction',
//            'create' => 'WRestCreateAction',
//            'update' => array(
//                'class' => 'WRestUpdateAction',
//                'scenario' => 'update',
//            )
        );
    }

    /**
     * @param string $lang the language in which to fetch the translation strings.
     * @param string $format 'raw' or 'jed'
     * @throws CException
     */
    public function actionPoJson($lang, $format = 'raw')
    {
        /** @var I18nCatalog $model */
        $model = $this->getModel();

        // Parse po contents
        $poParser = new \Sepia\PoParser();
        $translations = $poParser->readVariable($model->po_contents);
        $_headers = \neam\po2json\Po2Json::parseHeaders($poParser->headers());

        // Update plural forms header to reflect plural forms used in translation process
        $locale = CLocale::getInstance($lang);
        $_headers['Plural-Forms'] = "nplurals=" . count($locale->pluralRules);

        switch (count($locale->pluralRules)) {
            case 1:
                $forms = "plural=0;";
                break;
            case 2:
                $forms = "plural=({$locale->pluralRules[0]} ? 0 : 1);";
                break;
            case 3:
                $forms = "plural=({$locale->pluralRules[0]} ? 0 : ({$locale->pluralRules[1]} ? 1 : 2));";
                break;
            case 4:
                $forms = "plural=({$locale->pluralRules[0]} ? 0 : ({$locale->pluralRules[1]} ? 1 : ({$locale->pluralRules[2]} ? 2 : 3)));";
                break;
            default:
                throw new CException("Invalid amount of plural forms. Support needs to be added to app.");
        }

        $_headers['Plural-Forms'] .= "; $forms";

        // Metadata headers
        $_headers['X-Generator'] = "Gapminder CMS";
        $_headers['last-translator'] = "TODO"; // TODO

        // Translate entries
        $result = \neam\po2json\Po2Json::convertToJson($_headers, $translations, null, $format);

        if ($format == "raw") {
            $messages =& $result;
            $messages = $model->translatePoJsonMessages($messages, $lang);
        } else {
            $messages =& $result["locale_data"][$result["domain"]];
            $messages = $model->translatePoJsonMessages($messages, $lang);
        }

        $this->sendResponse(200, $result);
    }
}