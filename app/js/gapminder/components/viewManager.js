define([
    'jquery',
    'underscore',
    'backbone',
    'gapminder/core/component'
], function ($, _, Backbone, Component) {
    'use strict';

    /**
     * @class gapminder.components.ViewManager
     * @extends gapminder.core.Component
     */
    var ViewManager = Component.extend({
        /**
         * @type {gapminder.components.DependencyLoader}
         */
        loader: null,

        /**
         * @type {Object<string, gapminder.core.View>}
         */
        views: {},

        /**
         * Creates a new view.
         * @param {string} name
         * @param {Object} options
         * @returns {promise}
         */
        createView: function (name, options) {
            return this.createViews([{name: name, options: options}]);
        },

        /**
         * Creates multiple views at once.
         * @param {Array<Object>} views
         * @returns {promise}
         */
        createViews: function (views) {
            var self = this,
                defer = $.Deferred(),
                dependencies = [],
                name;

            for (var i = 0; i < views.length; i++) {
                name = views[i].name;
                dependencies.push(name);

                // Undelegate events to prevent them from being registered twice.
                if (this.views[name]) {
                    this.views[name].undelegateEvents();
                }
            }

            // Load the dependencies through the loader.
            this.loader
                .load(dependencies)
                .then(function () {
                    var Constructor, options, view;

                    for (var i = 0; i < arguments.length; i++) {
                        Constructor = arguments[i];
                        options = _.extend({manager: self}, views[i].options);
                        view = new Constructor(options);
                        self.views[views[i].name] = view;
                    }

                    defer.resolve(self.views);
                });

            return defer.promise();
        }
    });

    return ViewManager;
});