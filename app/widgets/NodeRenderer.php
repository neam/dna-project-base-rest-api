<?php

/**
 * Renders a Node by extracting its actual model using Node::item(), then it creates a controller based on
 * the models class-name and lets the created controller render the defined view. The model is passed to the view.
 */
class NodeRenderer extends CWidget
{

    /**
     * @var Node the node to be rendered
     */
    public $node;
    /**
     * @var string the name of the view to be rendered. Defaults to "_item".
     */
    public $view = '_item';

    public function run()
    {
        // Get the actual model of the node
        $model = $this->node->item();

        // Create the corresponding controller in order to render a view from the correct directory.
        // This also takes care of importing the class.
        /** @var Controller $controller */
        list($controller) = Yii::app()->createController(get_class($model));

        if (!$controller) {
            // TODO: consider throwing an exception
            return;
        }

        // TODO: is this needed?
        $controller->init();

        $controller->renderPartial($this->view, array(
            'model' => $model,
        ));
    }
}
