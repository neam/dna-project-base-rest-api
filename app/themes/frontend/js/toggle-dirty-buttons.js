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

    // Look for dirty CKEditor fields
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.on('instanceReady', function() {
            // Get CKEditors
            Object.keys(CKEDITOR.instances).forEach(function(key) {
                var editor = CKEDITOR.instances[key];

                editor.document.on('keyup', function() {
                    if ($form.isDirty()) {
                        enableButtons();
                    } else {
                        disableButtons();
                    }
                });
            });
        });
    }

    // Prevent disabled link buttons from being clicked
    $linkButtons.on('click', function(e) {
        if ($(this).attr('disabled')) {
            e.preventDefault();
        }
    });

    disableButtons(); // disable buttons by default
})();
