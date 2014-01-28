(function() {
    $(document).ready(function() {
        var fieldSelectors = 'textarea.error, input.error, select.error',
            remainingCount = $('.error.required').length,
            $nextBtn = $('#next-required'),
            $form = $('form'),
            $requiredFields = $(fieldSelectors),
            $remainingCount = $('#remaining-count');

        // Focus on the next required field
        $nextBtn.on('click', function(e) {
            e.preventDefault();
            $requiredFields = $(fieldSelectors);
            $requiredFields[0].focus();
        });

        $form.on('change', function() {
            setTimeout(function() {
                // Update the remaining count
                remainingCount = $('.error.required').length;
                $remainingCount.html(remainingCount);
            }, 3000); // TODO: Find a better solution to checking if the number of errors has changed after AJAX validation.
        });
    });
})();
