define([
    'underscore',
    'backbone'
], function(_, Backbone) {
    'use strict';

    /**
     * @class gapminder.views.View
     * @extends Backbone.View
     */
    var View = Backbone.View.extend({
        /**
         * @type {gapminder.components.ViewManager}
         */
        manager: null,
        /**
         * @inheritDoc
         */
        events: {
        },
        /**
         * @inheritDoc
         */
        constructor: function (options) {
            Backbone.View.apply(this, arguments);

            _.extend(this, options);

            if (!this.manager) {
                throw new Error('View.manager must be set.');
            }
        }
    });

    return View;
});