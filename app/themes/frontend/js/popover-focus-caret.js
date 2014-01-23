(function() {
    /**
     * Focuses the caret on the input field and scrolls it to end.
     */
    $(window).blur(function() {
        var $popover = $('.popover.in');
        var $popoverTextField = $popover.find('input[type="text"]', 'textarea');
        var originalInput = $popoverTextField.val();
        var originalInputLength = originalInput.length;

        $popoverTextField[0].setSelectionRange(originalInputLength, originalInputLength);
        $popoverTextField[0].scrollLeft = $popoverTextField[0].scrollWidth;
    });
})();
