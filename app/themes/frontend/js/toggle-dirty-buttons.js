(function() {
    var $form = $('form'),
        $buttons = $('.btn-dirtyforms'),
        $linkButtons = $('a.btn-dirtyforms');

    /**
     * Hides the buttons.
     */
    function disableButtons() {
        $buttons.attr('disabled', '');
    }

    /**
     * Shows the buttons.
     */
    function enableButtons() {
        $buttons.removeAttr('disabled');
    }

    // Check if the form is dirty on change
    $form.on('keyup change', function() {
        if ($(this).isDirty()) {
            enableButtons();
        } else {
            disableButtons();
        }
    });

    // Prevent disabled link buttons from being clicked
    $linkButtons.on('click', function(e) {
        if ($(this).attr('disabled')) {
            e.preventDefault();
        }
    });

    disableButtons(); // disable buttons by default
})();
