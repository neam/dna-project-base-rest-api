<?php

class I18nCatalogController extends AppRestController
{

    protected $_modelName = "I18nCatalog"; //model to be used as resource

    public function actions() //determine which of the standard actions will support the controller
    {
        return array(
            'list' => array( //use for get list of objects
                'class' => 'WRestListAction',
                'filterBy' => array( //this param user in `where` expression when forming an db query
                    'name_in_table' => 'request_param_name', // 'name_in_table' => 'request_param_name'
                ),
                'limit' => 'limit', //request parameter name, which will contain limit of object
                'page' => 'page', //request parameter name, which will contain requested page num
                'order' => 'order', //request parameter name, which will contain ordering for sort
            ),
            'delete' => 'WRestDeleteAction',
            'get' => 'WRestGetAction',
            'create' => 'WRestCreateAction', //provide 'scenario' param
            'update' => array(
                'class' => 'WRestUpdateAction',
                'scenario' => 'update', //as well as in WRestCreateAction optional param
            )
        );
    }

    /**
     * @param string $format 'raw' or 'jed'
     */
    public function actionPoJson($lang, $format = 'raw')
    {
        $model = $this->getModel();

        // Parse po contents
        $poparser = new \Sepia\PoParser();
        $translations = $poparser->readVariable($model->po_contents);
        $_headers = \neam\po2json\Po2Json::parseHeaders($poparser->headers());

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
            case 5:
                throw new CException("Too many plural forms. Support needs to be added to app.");
                break;
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