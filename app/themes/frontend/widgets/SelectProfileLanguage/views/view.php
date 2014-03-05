<?php
/** @var ActiveRecord $model */
/** @var TbActiveForm $form */
/** @var array $htmlOptions */
?>
<div class="profile-language-fields">
    <?php foreach ($attributes as $attribute): ?>
        <?php echo $this->renderDropdown($attribute); ?>
    <?php endforeach; ?>
</div>
