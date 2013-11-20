<?php echo $form->textAreaRow($model, 'subtitles_' . $model->source_language, array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php if ($model->getAttributeHint("subtitles")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("subtitles"); ?>
    </p>
<?php endif; ?>