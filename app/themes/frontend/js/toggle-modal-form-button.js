(function() {
    var $form = $('#item-form'),
        $checkboxes = $('input[type="checkbox"]'),
        $addSelectedBtn = $('input#add-selected');

    $addSelectedBtn.attr('disabled', 'disabled');

    $form.on('change', function() {
        if ($form.hasClass('dirty')) {
            $addSelectedBtn.removeAttr('disabled');
        }
    });
})();
