<div class="row">

    <div class="span4">

        <label><?php echo CHtml::encode($model->getAttributeLabel('picture_media_id')); ?></label>

        <img src="http://placehold.it/400x400" style="border: 1px solid black; width: 100%;">

        <a>Change</a>

        <!--
        <?php
        $input = $this->widget(
            '\GtcRelation',
            array(
                'model' => $model,
                'relation' => 'pictureMedia',
                'fields' => 'itemLabel',
                'allowEmpty' => true,
                'style' => 'dropdownlist',
                'htmlOptions' => array(
                    'checkAll' => 'all'
                ),
            )
            , true);
        echo $form->customRow($model, 'picture_media_id', $input);
        ?>

        <?php
        $formId = 'profiles-picture_media_id-' . \uniqid() . '-form';
        ?>

        <div class="control-group">
            <div class="controls">
                <?php
                echo $this->widget('bootstrap.widgets.TbButton', array(
                    'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'P3 Media'))),
                    'icon' => 'icon-plus',
                    'htmlOptions' => array(
                        'data-toggle' => 'modal',
                        'data-target' => '#' . $formId . '-modal',
                    ),
                ), true);
                ?>                </div>
        </div>
        -->

        <?php
        $this->beginClip('modal:' . $formId . '-modal');
        $this->renderPartial('//p3Media/_modal_form', array(
            'formId' => $formId,
            'inputSelector' => '#Profiles_picture_media_id',
            'model' => new P3Media,
            'pk' => 'id',
            'field' => 'itemLabel',
        ));
        $this->endClip();
        ?>

    </div>
    <div class="span4">

        <?php echo $form->textFieldRow($model, 'first_name', array('maxlength' => 255, 'class' => 'span4')); ?>

        <?php echo $form->textFieldRow($model, 'last_name', array('maxlength' => 255, 'class' => 'span4')); ?>

        <?php echo $form->textFieldRow($model->user, 'username', array('maxlength' => 255, 'class' => 'span4')); ?>

        <label><?php echo CHtml::encode($model->user->getAttributeLabel('password')); ?></label>
        <?php print CHtml::link('Change password', array('user/profile/changepassword', 'returnUrl' => Yii::app()->request->url), array('class' => 'btn uneditable-input')); ?>

        <?php echo $form->textFieldRow($model->user, 'email', array('maxlength' => 255, 'class' => 'span4')); ?>

        <?php echo $form->toggleButtonRow($model, 'others_may_contact_me'); ?>
        <?php //echo $form->checkBoxRow($model, 'others_may_contact_me'); ?>

        <?php echo $form->textFieldRow($model, 'website', array('maxlength' => 255, 'class' => 'span4')); ?>

    </div>
</div>
<div class="row">

    <div class="span8">

        <?php echo $form->textAreaRow($model, 'about', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

        <?php echo $form->textFieldRow($model, 'lives_in', array('maxlength' => 255, 'class' => 'span8')); ?>

        <div class="form-actions">
            <?php
            echo CHtml::submitButton(Yii::t('model', 'Save'), array(
                'class' => 'btn btn-primary pull-right'
            ));
            ?>
        </div>
    </div>
</div>

