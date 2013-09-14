<?php

class SiteController extends Controller
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $chaptersInProgress = Chapter::model()->findAll();

        $this->render('index', compact("chaptersInProgress"));
    }

    /**
     * Gii script console
     */
    public function actionGiiscript()
    {
        $this->render('giiscript');
    }

    public function actionWorkflowdev()
    {

        require_once Yii::app()->basePath . '/../vendor/ezc/ezcomponents/Base/src/base.php';
        Yii::registerAutoloader(array('ezcBase', 'autoload'), true);

        // Set up database connection.
        $db = ezcDbFactory::create('mysql://' . YII_DB_USER . ':' . YII_DB_PASSWORD . '@' . YII_DB_HOST . '/' . YII_DB_NAME);

        // Set up workflow definition storage (database).
        $definition = new ezcWorkflowDatabaseDefinitionStorage($db);

        try {

            // Load latest version of workflow named "Test".
            $workflow = $definition->loadByName('Foo');

        } catch (ezcWorkflowDefinitionStorageException $e) {

            $this->createWorkflowFoo($definition);

            // Load latest version of workflow named "Test".
            $workflow = $definition->loadByName('Foo');

        }

        //var_dump($workflow);

        // Generate GraphViz/dot markup for workflow "Test".
        $visitor = new ezcWorkflowVisitorVisualization;
        $workflow->accept($visitor);
        $graphVizSyntax = (string) $visitor;

        $this->render('workflowdev', array('graphVizSyntax' => $graphVizSyntax));

    }

    private function createWorkflowFoo($definition)
    {

        // Create new workflow of name "Foo".
        $workflow = new ezcWorkflow('Foo');

        // Create an Input node that expects a boolean workflow variable of name "choice".
        $input = new ezcWorkflowNodeInput(
            array('choice' => new ezcWorkflowConditionIsBool)
        );

        // Add the previously created Input node
        // as an outgoing node to the start node.
        $workflow->startNode->addOutNode($input);

        // Create a new Exclusive Choice node and add it as an
        // outgoing node to the previously created Input node.
        // This node will choose which output to run based on the
        // choice workflow variable.
        $branch = new ezcWorkflowNodeExclusiveChoice;
        $branch->addInNode($input);

        // Either $true or $false will be run depending on
        // the above choice.
        // Note that neither $true nor $false are valid action nodes.
        // see the next example
        $trueNode = new ezcWorkflowNodeAction('PrintTrue');
        $falseNode = new ezcWorkflowNodeAction('PrintFalse');

        // Branch
        // Condition: Variable "choice" has boolean value "true".
        // Action:    PrintTrue service object.
        $branch->addConditionalOutNode(
            new ezcWorkflowConditionVariable('choice', new ezcWorkflowConditionIsTrue),
            $trueNode);

        // Branch
        // Condition: Variable "choice" has boolean value "false".
        // Action:    PrintFalse service object.
        $branch->addConditionalOutNode(
            new ezcWorkflowConditionVariable('choice', new ezcWorkflowConditionIsFalse),
            $falseNode
        );

        // Create SimpleMerge node and add the two possible threads of
        // execution as incoming nodes of the end node.
        $merge = new ezcWorkflowNodeSimpleMerge;
        $merge->addInNode($trueNode);
        $merge->addInNode($falseNode);
        $merge->addOutNode($workflow->endNode);

        // Save workflow definition to database.
        $definition->save($workflow);

    }


    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        } else {
            $error['message'] = "Precondition Failed";
            $error['code'] = 412;
            $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', Yii::t('app', 'Thank you for contacting us. We will respond to you as soon as possible.'));
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Login page handled via vendor module mishamx.yii-user
     */

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}