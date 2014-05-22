define([
    'jquery',
    'underscore',
    'gapminder/core/Component'
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
         * Loads multiple images at once.
         * @param {Array} urls
         * @returns {promise}
         */
        loadImages: function (urls) {
            var defer = $.Deferred(),
                chain = defer.pipe(null, function () {});

            console.debug('Loading images:', urls);

            for (var i = 0; i < urls.length; i++) {
                chain = chain.pipe(this.loadImage(urls[i]));
            }

            return defer;
        }
    });

    return ImageManager;
});