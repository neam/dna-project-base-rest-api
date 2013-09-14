<?php

echo $graphVizSyntax;

Yii::import('vendor.ascendro.yii-graphviz.components.Graphviz');

$this->widget('vendor.ascendro.yii-graphviz.widgets.Graph', array(
    'configuration' => $graphVizSyntax,
    'alt' => "My Alt Text on image",
    'title' => "My Image Title",
    'map' => false, //True if my graphviz syntax features links and i want to have them clickable
));
?>