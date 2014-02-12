<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255)); ?>

            <?php echo $form->textAreaRow($model, 'about_en', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textAreaRow($model, 'embed_template', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'poFile',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'po_file_id', $input);
            ?>

        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
