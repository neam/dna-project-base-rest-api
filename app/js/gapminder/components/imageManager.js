define([
    'jquery',
    'underscore',
    'gapminder/core/component'
], function($, _, Component) {
    'use strict';

    /**
     * @class gapminder.components.ImageManager
     * @extends gapminder.core.Component
     */
    var ImageManager = Component.extend({
        /**
         * @type {string}
         */
        baseUrl: '/',

        /**
         * Loads a single image.
         * @param {string} url
         * @returns {promise}
         */
        loadImage: function (url) {
            var defer = $.Deferred(),
                image;

            image = new Image();
            image.src = this.baseUrl + url;
            image.onload = function() {
                defer.resolve(image);
            };

            return defer.promise();
        },

        /**
         * Pre-loads a set of images.
         * @param {Array} urls
         * @returns {promise}
         */
        preloadImages: function (urls) {
            var defer = $.Deferred();

            console.debug('Pre-loading images:', urls);

            for (var i = 0; i < urls.length; i++) {
                defer = defer.then(this.loadImage(urls[i]));
            }

            return defer;
        }
    });

    return ImageManager;
});