<?php echo $form->html5EditorRow($model, 'teachers_guide', array('rows' => 6, 'cols' => 50, 'class' => 'span6', 'options' => array(
    'link' => true,
    'image' => false,
    'color' => false,
    'html' => true,
))); ?>

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
    ?>
</div>

<div class="alert alert-info">
    Hint: Lorem ipsum
</div>