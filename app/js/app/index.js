/* global jQuery */

'use strict';

// Expose the jQuery that Yii registers to RequireJS.
define('jquery', [], function() {
    return jQuery;
});

require([
    'app/core/App'
], function (App) {
    var app = new App();
    app.initialize();
});