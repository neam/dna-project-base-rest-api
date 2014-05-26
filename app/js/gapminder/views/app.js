define([
    'jquery',
    'gapminder/core/view'
], function($, View) {
    'use strict';

    /**
     * @class gapminder.views.AppView
     * @extends gapminder.core.View
     */
    var AppView = View.extend({
        /**
         * @inheritDoc
         */
        events: {
        },
        initialize: function () {
            console.info('App view initialized');
        }
    });

    return AppView;
});