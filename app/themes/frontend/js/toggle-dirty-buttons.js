(function() {
    var $form = $('form'),
        $buttons = $('.btn-action');

    /**
     * Hides the buttons.
     */
    function hideButtons() {
        $buttons.hide();
    }

    /**
     * Shows the buttons.
     */
    function showButtons() {
        $buttons.show();
    }

    // Check if the form is dirty on change
    $form.on('change', function() {
        if ($(this).isDirty()) {
            showButtons();
        } else {
            hideButtons();
        }
    });

    hideButtons(); // hide buttons by default
})();
