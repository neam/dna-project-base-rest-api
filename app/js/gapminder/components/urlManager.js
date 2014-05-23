define([
    'jquery',
    'underscore',
    'gapminder/core/component'
], function($, _, Component) {
    'use strict';

    /**
     * @class gapminder.components.UrlManager
     * @extends gapminder.core.Component
     */
    var UrlManager = Component.extend({
        /**
         * @type {string}
         */
        baseUrl: '/',

        /**
         * Creates an url to a route with the given params.
         * @param {string} route the route.
         * @param {Object} params query params (key => value).
         * @returns string the url.
         */
        createUrl: function(route, params) {
            var query;
            if (params) {
                query = [];
                for (var name in params) {
                    if (params.hasOwnProperty(name)) {
                        query.push(name + '=' + params[name]);
                    }
                }
                query = '?' + query.join('&');
            }
            return this.baseUrl + route.replace(/^\//g, '') + (query || '');
        }
    });

    return UrlManager;
});