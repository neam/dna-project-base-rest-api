<?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255, 'hintOptions' => array('class' => 'alert alert-info'), 'hint' => $model->getAttributeHint('title_en'))); ?>

<?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255, 'hintOptions' => array('class' => 'alert alert-info'), 'hint' => $model->getAttributeHint('slug_en'))); ?>


<div class="form-actions">
    <?php
    echo CHtml::Button(Yii::t('model', 'Cancel'), array(
            'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('chapter/admin'),
            'class' => 'btn'
        )
    );
    echo ' ';
    echo CHtml::submitButton(Yii::t('model', 'Save'), array(
            'class' => 'btn btn-primary'
        )
    );
    ?>    </div>

<div class="alert alert-info">
    Hint: Lorem ipsum
</div>
