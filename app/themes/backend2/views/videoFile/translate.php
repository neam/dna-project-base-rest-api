<pre>

välj språk om inte specat i get

om har språk:

    <?php

    $lang = "es";

    echo "Translate video to " . $lang;

    $definition = new VideoFileTranslationWorkflow();
    $definition->setWorkflow($workflow);

    $this->widget('yii-graphviz.widgets.Graph', array(
        'configuration' => $definition->getGraphvizSyntax(),
        'alt' => "My Alt Text on image",
        'title' => "My Image Title",
        'map' => false,
    ));

    echo $definition->getGraphvizSyntax();

    ?>

    plocka ut rätt workflow, visa status i ena kolumnen

huvudkolumnen: translate steg X view beroende på var i workflowen man är


</pre>
