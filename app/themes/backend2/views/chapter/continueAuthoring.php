<?php
$this->setPageTitle(
    Yii::t('model', 'Chapter')
    . ' - '
    . Yii::t('crud', 'Edit')
);

$this->breadcrumbs[Yii::t('model', 'Chapters')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Edit');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo(empty($model->title) ? Yii::t('model', 'Chapter') . " #" . $model->id : $model->title); ?>
    <small>vX</small>

    <?php
    echo CHtml::submitButton(Yii::t('model', 'Preview'), array(
            'class' => 'btn'
        )
    );
    ?>
</h1>

<br/>

<div class="row">
    <div class="span3 well well-white">

        <div class="span3">

            %

        </div>
        <div class="span9">

            Steps

        </div>
        <?php
        $waitingFor = $execution->getWaitingFor();
        ?>

        <?php //print_r($waitingFor); ?>


        <div class="row">
            <div class="span3">

                <?php
                $this->widget(
                    'bootstrap.widgets.TbProgress',
                    array(
                        'type' => 'success', // 'info', 'success' or 'danger'
                        'percent' => 60,
                    )
                );
                ?>
            </div>
            <div class="span9">

                Foo

            </div>
        </div>
        <div class="row">
            <div class="span3">

                <?php
                $this->widget(
                    'bootstrap.widgets.TbProgress',
                    array(
                        'type' => 'success', // 'info', 'success' or 'danger'
                        'percent' => 60,
                    )
                );
                ?>
            </div>
            <div class="span9">

                Foo

            </div>
        </div>
        <div class="row">
            <div class="span3">

                <?php
                $this->widget(
                    'bootstrap.widgets.TbProgress',
                    array(
                        'type' => 'success', // 'info', 'success' or 'danger'
                        'percent' => 60,
                    )
                );
                ?>
            </div>
            <div class="span9">

                Foo

            </div>
        </div>


        <div class="row">

            <div class="span12">

                <hr>

                X% Completed<br/>
                X required fields missing<br/>

                Status: DRAFT

            </div>
        </div>

    </div>
    <div class="span9 well well-white">

        <div class="row">
            <div class="span9">

                <h3>Step 1: Title & About</h3>

            </div>
            <div class="span3">

                <div class="btn-toolbar pull-right">
                    <div class="btn-group">
                        <?php
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => false,
                            "icon" => "icon-backward",
                            "url" => array("foo")
                        ));
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => false,
                            "icon" => "icon-forward icon-right",
                            "url" => array("bar")
                        ));
                        ?>
                    </div>
                </div>

            </div>
        </div>


        <form>

            <div class="row">
                <div class="span3">

                    Thumbnail
                    <img src="http://placehold.it/400x400">

                </div>
                <div class="span9">

                    Title

                    Tags

                </div>
            </div>

            <div class="row">
                <div class="span12">

                    About

                </div>
            </div>

        </form>

        <div class="alert alert-info">
            Hint: Lorem ipsum
        </div>

    </div>

</div>

